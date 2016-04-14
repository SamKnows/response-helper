<?php

namespace Devboxr\ResponseHelper;

use Illuminate\Http\Response;

class ResponseHelper
{
    /**
     * respond()
     * Helper function to return JSONs in a unified format.
     *
     * @param $httpCode
     * @param null|array $data
     * @param null|int $code
     * @param null|string $message
     *
     * @return Response
     */
    public static function respond($httpCode = 200, $data = null, $code = null, $message = null)
    {
        $ret = [];

        if (isset($data)) {
            $ret['data'] = $data;
        }

        if (isset($code)) {
            $ret['code'] = $code;
        }

        if (isset($message)) {
            $ret['message'] = $message;
        }

        return ResponseHelper::toJson($httpCode, $ret);
    }

    /**
     * Alias for a quick empty "All Good"
     *
     * @param int $httpCode
     * @param null $data
     *
     * @return Response
     */
    public static function success($httpCode = 200, $data = null)
    {
        return ResponseHelper::respond($httpCode, $data, 'OK', 'All good.');
    }

    /**
     * Alias for a quick "500 Server Error"
     *
     * @return Response
     */
    public static function serverError()
    {
        return ResponseHelper::respond(500, null, 'SERVER_ERROR',
            'We encountered an issue with our API, please try again.');
    }

    /**
     * Alias for a quick "404 Not Found"
     *
     * @param null $data
     *
     * @return Response
     */
    public static function notFound($data = null)
    {
        return ResponseHelper::respond(404, $data, 'NOT_FOUND', 'The resource at this endpoint could not be found.');
    }

    /**
     * Alias for a quick "Invalid Content Body"
     *
     * @param null $data
     *
     * @return Response
     */
    public static function invalidContentBody($data = null)
    {
        return ResponseHelper::respond(400, [
            'errors' => $data
        ], 'INVALID_BODY', 'The body of this request did not validate well or is missing information.');
    }

    /**
     * toJson()
     *
     * @param $httpCode
     * @param $data
     * @param int $options
     *
     * @return $this
     */
    public static function toJson($httpCode, $data, $options = JSON_PRETTY_PRINT)
    {
        return response(json_encode($data, $options), $httpCode)->header('Content-Type', 'application/json');
    }
}