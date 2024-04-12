<?php

namespace App\Services;

use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlService 
{
    public function createShortUrl(array $shortUrlData): ShortUrl
    {
        $shortUrl = ShortUrl::query()->create([
            "original_url" => $shortUrlData["url"],
            "short_url" => $this->generateRandomUniqueShortUrl(8)
        ]);

        return $shortUrl;
    }

    public function generateRandomUniqueShortUrl(int $countSymbols): string
    {
        do {
            $url = Str::random($countSymbols);
            $existingUrl = ShortUrl::query()
                                    ->where("short_url", $url)
                                    ->exists();
            
        } while ($existingUrl);

        return $url;
    }
}