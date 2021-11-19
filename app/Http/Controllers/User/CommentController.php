<?php

namespace App\Http\Controllers\User;

use App\Helpers\CommonResponse;
use App\Helpers\HandleException;
use App\Helpers\HttpCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use App\Http\Request\CreateOrUpdateCommentRequest;
use App\Http\Request\CreateOrUpdateUserRequest;
use App\Services\CommentService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CommentController
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index($id): JsonResponse
    {
        return ResponseHelper::send($this->commentService->findByField('product_id', $id));
    }

    public function create(CreateOrUpdateCommentRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $data = [
                'product_id' => $request['product_id'],
                'user_id' => $request['user_id'],
                'star' => $request['star'],
                'content' => $request['content'],
            ];
            $comment = $this->commentService->create($data);
            DB::commit();
            return ResponseHelper::send($comment);
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

//    public function update($id, CreateOrUpdateCommentRequest $request): JsonResponse
//    {
//        try {
//            DB::beginTransaction();
//            $result = $this->commentService->update($request->all(), $id);
//            DB::commit();
//            return ResponseHelper::send($result);
//        } catch (QueryException $e) {
//            DB::rollBack();
//            Log::error($e);
//            return HandleException::catchQueryException($e);
//        }  catch (Exception $e) {
//            DB::rollBack();
//            Log::error($e);
//            return CommonResponse::unknownResponse();
//        }
//    }
}
