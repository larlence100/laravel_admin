<?php
/**
 * User: Administrator
 */

namespace App\Packages\Base\Services;


class StatusCode
{
    const OK                    = 200; //OK - [GET]：服务器成功返回用户请求的数据，该操作是幂等的（Idempotent）。
    const CREATED               = 201; //CREATED - [POST/PUT/PATCH]：用户新建或修改数据成功。
    const ACCEPTED              = 202; //- [*]：表示一个请求已经进入后台排队（异步任务）
    const NO_CONTENT            = 204; //- [DELETE]：用户删除数据成功。
    const INVALID_REQUEST       = 400; //INVALID REQUEST - [POST/PUT/PATCH]：用户发出的请求有错误，服务器没有进行新建或修改数据的操作，该操作是幂等的。
    const UNAUTHORIZED          = 401; //- [*]：表示用户没有权限（令牌、用户名、密码错误）。
    const FORDIDDEN             = 403; // - [*]：用户发出的请求针对的是不存在的记录，服务器没有进行操作，该操作是幂等的。
    const NOT_FOUND             = 404; //- [*]：用户发出的请求针对的是不存在的记录，服务器没有进行操作，该操作是幂等的。
    const NOT_ACCEPTABLE        = 406; //Not Acceptable - [GET]：用户请求的格式不可得（比如用户请求JSON格式，但是只有XML格式）。
    const GONE                  = 410; //Gone -[GET]：用户请求的资源被永久删除，且不会再得到的。
    const UNPROCEABLE_ENTITY    = 422; //Unprocesable entity - [POST/PUT/PATCH] 当创建一个对象时，发生一个验证错误。
    const INTERNAL_SERVER_ERROR = 500; //INTERNAL SERVER ERROR - [*]：服务器发生错误，用户将无法判断发出的请求是否成功。


}