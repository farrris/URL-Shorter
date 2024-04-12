<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="ShortUrl",
 *     description="Сокращенная ссылка",
 *     @OA\Xml(
 *         name="ShortUrl"
 *     )
 * )
 */
class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        "original_url",
        "short_url"
    ];

    public function getRouteKeyName()
    {
        return 'short_url';
    }

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var bigInteger $id
     */
    private int $id;

    /**
     * @OA\Property(
     *      title="original_url",
     *      description="Оригинальная ссылка",
     *      example="https://google.com"
     * )
     *
     * @var string $original_url
     */
    private string $original_url;

    /**
     * @OA\Property(
     *      title="short_url",
     *      description="Сокращенная ссылка",
     *      example="http://localhost/HvmYmHHH"
     * )
     *
     * @var string $short_url
     */
    private string $short_url;

}
