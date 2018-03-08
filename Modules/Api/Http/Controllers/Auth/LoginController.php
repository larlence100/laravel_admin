<?php
/**
 * User: Administrator
 */

namespace Modules\Api\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Packages\Exception\Services\ComException;
use App\Packages\Auth\Services\PassportService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try{

            $tokenData = PassportService::doUserLogin($request);
            return $this->successResponse($tokenData);
        }catch (ComException $e){
            return $this->errorResponse($e->getCode(),$e->getMessage());
        }

    }
}