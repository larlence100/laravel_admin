<?php
/**
 * User: Administrator
 */

namespace App\Http\Packages\Base\Services;


use Illuminate\Support\Facades\Log;

class LogService
{
    public static function info($message='info',$data=[])
    {
        Log::info('----------------------------------------');
        Log::info($message,$data);
        Log::info('----------------------------------------');
    }

    public static function debug($message='debug',$data=[])
    {
        Log::debug('----------------------------------------');
        Log::debug($message,$data);
        Log::debug('----------------------------------------');
    }

    public static function error($message='error',$data=[])
    {
        Log::error('----------------------------------------');
        Log::error($message,$data);
        Log::error('----------------------------------------');
    }
}