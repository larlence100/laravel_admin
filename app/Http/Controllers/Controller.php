<?php

namespace App\Http\Controllers;

use App\Packages\Base\Services\StatusCode;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SUCCESS_MESSAGE   = 'success';
    const ERROR_MESSAGE     = 'error';

    public function successResponse($data = null, $message = self::SUCCESS_MESSAGE)
    {
        if (empty($data)) {
            return response([
                'code' => StatusCode::OK,
                'message' => $message
            ]);
        } else {
            return response([
                'code' => StatusCode::OK,
                'message' => $message,
                'data' => $data
            ]);
        }
    }

    public function successResponseCollect($resource,$param=[])
    {
        if(empty($param)) {
            return $resource->additional(['code'=>StatusCode::OK,'message'=>self::SUCCESS_MESSAGE]);
        }
        return $resource->additional($param);
    }

    public function errorResponse($code, $message = self::ERROR_MESSAGE)
    {
        return response([
            'code' => $code,
            'message' => $message
        ]);
    }
}
