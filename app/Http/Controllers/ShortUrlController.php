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
