<?php
/**
 * Created by lyndon@1201.us
 * User: lyndon
 * Date: 12/21 0021
 * Time: 19:57
 * 异常类
 */

namespace App\Packages\Exception\Services;

use App\Http\Packages\Base\Services\LogService;

class ComException extends \Exception
{

    public function __construct($message, $code = 0, Exception $previous=null)
    {
        LogService::error($message,['message'=>$message,'code'=>$code]);
        parent::__construct($message, $code, $previous);
    }

}