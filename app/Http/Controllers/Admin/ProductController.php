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
                'image' => $request['image'],
                'image_list' => $request['image_list'],
            ];
            $transaction = $this->productService->create($data);
            DB::commit();
            return ResponseHelper::send($transaction);
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

    public function update(Request $request, $id): JsonResponse
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
}
