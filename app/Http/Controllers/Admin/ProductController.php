<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CommonResponse;
use App\Helpers\HandleException;
use App\Helpers\ResponseHelper;
use App\Services\ProductService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function create(Request $request): JsonResponse
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

    public function update($id, Request $request): JsonResponse
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

    public function delete($id): JsonResponse
    {
        Storage::disk("public")->deleteDirectory("product/$id");
        return ResponseHelper::send($this->productService->delete($id));
    }
}
