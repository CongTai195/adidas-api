<?php

namespace App\Helpers;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResponseHelper
{
    /**
     * @param array|object|string $result
     * @param string $status
     * @param int $statusCode
     * @param array $errors
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function send(
        $result = [],
        $status = Status::OK,
        $statusCode = HttpCode::OK,
        $errors = [],
        $headers = []
    )
    {
        $data = [];
        $data['status'] = $status;
        if ($result) {
            $data['results'] = $result;
        }
        if ($errors) {
            $data['errors'] = $errors;
        }

        return response()->json(
            $data,
            $statusCode,
            $headers,
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * @param string|\Exception $exception_message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendException($exception_message)
    {
        $statusCode = HttpCode::INTERNAL_SERVER_ERROR;
        if ($exception_message instanceof NotFoundHttpException) {
            $statusCode = HttpCode::NOT_FOUND;
        }
        if (
            $exception_message instanceof HttpException &&
            $exception_message->getStatusCode() === HttpCode::FORBIDDEN
        ) {
            $statusCode = HttpCode::FORBIDDEN;
        }
        if ($exception_message instanceof Exception) {
            $exception_message = $exception_message->getMessage();
        }

        return self::send(
            [],
            Status::NG,
            $statusCode,
            ['server' => $exception_message]
        );
    }
}
