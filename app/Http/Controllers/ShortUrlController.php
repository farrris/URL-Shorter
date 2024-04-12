<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShortUrlRequest;
use App\Http\Resources\ShortUrlResource;
use App\Models\ShortUrl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Services\ShortUrlService;

class ShortUrlController extends Controller
{   

    public function __construct(private ShortUrlService $shortUrlService)
    {
        
    }

    /**
     * @OA\Post(
     *     path="/link/",
     *     operationId="createShortUrl",
     *     tags={"ShortUrl"},
     *     description="Метод для создания новой сокращенной ссылки",
     *     summary="Метод для создания новой сокращенной ссылки",
     *     @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *              @OA\Property(property="url", type="string", example="https://google.com"),
     *          )
     *      )
     *    ),
     *    @OA\Response(response="200",
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                 @OA\Property(
     *                     property="short_url",
     *                     ref="#/components/schemas/ShortUrl"
     *                 ),
     *              )
     *          )
     *      ),
     * )
     * 
     * @param CreateShortUrlRequest $request
     * @return JsonResponse
     **/
    public function createShortUrl(CreateShortUrlRequest $request): JsonResponse
    {   
        $validated = $request->validated();
        $shortUrl = $this->shortUrlService->createShortUrl($validated);

        return response()->json([
            "msg" => "success",
            "shortUrl" => ShortUrlResource::make($shortUrl)
        ]);
    }


    public function redirectByShortUrl(ShortUrl $shortUrl): RedirectResponse
    {
        return response()->redirectTo($shortUrl->original_url);
    }
}
