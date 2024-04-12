<?php

namespace Tests\Feature;

use App\Models\ShortUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShortUrlTest extends TestCase
{   
    use RefreshDatabase;
    
    private ShortUrl $shortUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->shortUrl = ShortUrl::factory()->create(["original_url" => "https://habr.com/ru/feed"]);
    }

    public function test_create_short_url(): void
    {   
        $data = [
            "url" => "https://youtube.com"
        ];

        $response = $this->post('/api/link', $data);

        $response->assertCreated();
        $this->assertDatabaseHas('short_urls', ["original_url" => $data["url"]]);
    }

    public function test_redirect_by_short_url(): void
    {
        $response = $this->get("/" . $this->shortUrl->short_url);

        $response->assertRedirect($this->shortUrl->original_url);

    }
}
