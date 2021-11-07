<?php

namespace App\Http\Controllers\User;

use App\Helpers\CommonResponse;
use App\Helpers\HandleException;
use App\Helpers\ResponseHelper;
use App\Http\Request\CreateTransactionRequest;
use App\Services\OrderService;
use App\Services\TransactionService;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController
{
    protected $transactionService;
    protected $orderService;

    public function __construct(
        TransactionService $transactionService,
        OrderService $orderService
    ) {
        $this->transactionService = $transactionService;
        $this->orderService = $orderService;
    }

    public function index($id): JsonResponse
    {
        return ResponseHelper::send($this->transactionService->findByField('user_id', $id, ['orders', 'orders.product']));
    }

    public function create(CreateTransactionRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $data = [
                'user_id' => auth('api')->user()['id'] ?? 1,
                'user_name' => $request['user_name'],
                'user_email' => $request['user_email'],
                'user_address' => $request['user_address'],
                'user_phone' => $request['user_phone'],
                'amount' => $request['amount'],
                'payment' => $request['payment'],
                'shipping' => $request['shipping'],
                'message' => $request['message'] ?? null
            ];
            $transaction = $this->transactionService->create($data);
            $orders = [];
            $products = $request['products'];
            foreach ($products as $product) {
                $order = [
                    'transaction_id' => $transaction->id ?? 4,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity']
                ];
                array_push($orders, $order);
            }
            $orders = $this->orderService->insert($orders);
            DB::commit();
            return ResponseHelper::send($transaction);
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error($e);
            return HandleException::catchQueryException($e);
        }  catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return CommonResponse::unknownResponse();
        }
    }
}
