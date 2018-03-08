<?php
/**
 * User: Administrator
 */

namespace App\Packages\Auth\Services;


use App\Packages\Exception\Services\ComException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PassportService
{
    const USERNAME = 'phone';

    const PASSWORD = 'password';

    public static function doUserLogin(Request $request)
    {
        try{
            $user = static::checkUser($request->all());
            $tokenData = static::getAccessToken($request->all());
            return array_merge($user->toArray(),$tokenData);
        }catch (ComException $e){
            throw new ComException($e->getMessage(),$e->getCode());
        }
    }

    public static function checkUser(array $data)
    {
        if (!Auth::attempt([static::USERNAME=>$data[static::USERNAME],static::PASSWORD=>$data[static::PASSWORD]])){
            throw new ComException('Account or password error',404);
        }
        return Auth::user();
    }

    public static function doVaildData(array $data)
    {
        $valid =Validator::make($data, [
            static::USERNAME=> 'required|string',
            static::PASSWORD => 'required|string',
        ],[
            static::USERNAME.'required'=>'The '.static::USERNAME.' is not empty',
            static::PASSWORD.'required'=>'The '.static::PASSWORD.' is not empty',
        ]);
        if ($valid->errors()->count() > 0)
        {
            throw new ComException($valid->errors()->first());
        }
        return true;
    }

    /**
     * get Access_token
     * @param array $data
     * @return mixed
     * author Fox
     * @throws ComException
     */
    public static function getAccessToken($data)
    {

        try{
            static::doVaildData($data);

            $client = new Client();
            $config['form_params'] = array_merge([
                'grant_type' => 'password',
                'client_id' => env('PASSPORT_CLIENT_ID'),
                'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            ],  [
                'username' => $data[static::USERNAME],
                'password' => $data[static::PASSWORD]
            ]);

            $response = $client->post(config('app.url') . '/oauth/token', $config);
            return json_decode((string)$response->getBody(),true);
        }catch (ClientException $exception){
            throw new ComException('Get access_token fail ',$exception->getCode());
        }
    }
}