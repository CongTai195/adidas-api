<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonResponse;
use App\Helpers\HandleException;
use App\Helpers\ResponseHelper;
use App\Http\Request\CreateOrUpdateProductRequest;
use App\Http\Request\DeleteOrUpdateDeletedRequest;
use App\Services\ProductService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        return ResponseHelper::send($this->productService->all());
    }

    public function create(CreateOrUpdateProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request['name'],
                'category_id' => $request['category_id'],
                'price' => $request['price'],
                'description' => $request['description'],
            ];
            $product = $this->productService->create($data);
            $imageMain = $request['image'];
            $imageList = $request['image_list'];
            $imageUrlsArr = [];
            foreach ($imageList as $image) {
                $imageName = $image->getClientOriginalName();
                $pathImage = "product/" . $product->id . "/$imageName";
                Storage::disk("public")->put($pathImage, file_get_contents($image));
                array_push($imageUrlsArr,$pathImage);
            }
            $imageMainName = $imageMain->getClientOriginalName();
            $pathImageMain = "product/" . $product->id . "/$imageMainName";
            Storage::disk("public")->put($pathImageMain, file_get_contents($imageMain));
            $imageUrls = implode(';', $imageUrlsArr);
            $this->productService->update(["image" => $pathImageMain, "image_list" => $imageUrls], $product->id);
            DB::commit();
            return ResponseHelper::send($product);
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error($e);
            return HandleException::catchQueryException($e);
        }  catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return CommonResponse::unknownResponse();
        }
    }

    public function update($id, CreateOrUpdateProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $result = $this->productService->update($request->all(), $id);
            DB::commit();
            return ResponseHelper::send($result);
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error($e);
            return HandleException::catchQueryException($e);
        }  catch (Exception $e) {
            DB::rollBack();
            Log::error($e);
            return CommonResponse::unknownResponse();
        }
    }

    public function deleteProducts(DeleteOrUpdateDeletedRequest $request): JsonResponse
    {
//        foreach ($request['ids'] as $id) {
//            Storage::disk("public")->deleteDirectory("product/$id");
//        }
        return ResponseHelper::send($this->productService->deleteProducts($request['ids']));
    }

    public function getDeletedProducts(): JsonResponse
    {
        return ResponseHelper::send($this->productService->getDeletedProducts());
    }

    public function updateDeletedProducts(DeleteOrUpdateDeletedRequest $request): JsonResponse
    {
        return ResponseHelper::send($this->productService->updateDeletedProducts($request['ids']));
    }
}
