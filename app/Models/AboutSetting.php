<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'timeline_items' => 'array',
        'philosophy_items' => 'array',
    ];

    /**
     * Resolve Photo 1 (Transformation) URL.
     */
    public function getOriginPhoto1UrlAttribute(): string
    {
        return uploads_asset($this->origin_photo_1_image, 'alanhumphreys/images/before-after.png') ?? asset('alanhumphreys/images/before-after.png');
    }

    /**
     * Resolve Photo 2 (Portrait) URL.
     */
    public function getOriginPhoto2UrlAttribute(): string
    {
        return uploads_asset($this->origin_photo_2_image, 'alanhumphreys/images/services-portrait.jpg') ?? asset('alanhumphreys/images/services-portrait.jpg');
    }
}
