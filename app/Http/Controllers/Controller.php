<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="URL Shorter",
 *     version="1.0",
 * ),
 *  @OA\Server(
 *      description="Server",
 *      url="http://localhost/api"
 *  ),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
