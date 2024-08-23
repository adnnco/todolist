<?php

namespace App\Services;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class ApiResponseService
{
    /**
     * Rollback the transaction and throw an exception.
     *
     * @param  \Exception  $e  The exception that was caught.
     * @param  string  $message  The message to return in the response.
     * @return void
     *
     * @throws HttpResponseException
     */
    public static function rollback(\Exception $e, string $message = 'Something went wrong! Process not completed')
    {
        return self::throw($e, $message);
    }

    /**
     * Log the exception and throw an HTTP response exception.
     *
     * @param  \Exception  $e  The exception that was caught.
     * @param  string  $message  The message to return in the response.
     *
     * @throws HttpResponseException
     */
    public static function throw(\Exception $e, string $message = 'Something went wrong! Process not completed')
    {
        Log::info($e);
        throw new HttpResponseException(response()->json(['message' => $message], 500));
    }

    /**
     * Send a JSON response.
     *
     * @param  mixed  $result  The data to include in the response.
     * @param  string  $message  The message to include in the response.
     * @param  int  $code  The HTTP status code for the response.
     */
    public static function sendResponse(mixed $result, string $message, int $code = 200): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
        ];

        if (! empty($message)) {
            $response['message'] = $message;
        }

        return response()->json($response, $code);
    }
}
