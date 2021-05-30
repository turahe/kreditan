<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
/**
 * App\Models\Post
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $category_id
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property string|null $subtitle subtitle of title post
 * @property string|null $description description of post
 * @property string $content_raw
 * @property string $content_html
 * @property string $type
 * @property int $is_sticky
 * @property int|null $order_column
 * @property string|null $published_at
 * @property string|null $layout
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereIsSticky($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The "booting" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::updating(function ($instance) {
            Cache::put('product.'.$instance->slug, $instance);
        });
        static::deleting(function ($instance) {
            Cache::delete('product.'.$instance->slug);
        });
    }

    /**
     * @param null|Media $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('xs')
            ->format('webp')
            ->width(90)
            ->height(80)
            ->sharpen(10)
            ->optimize()
            ->quality(70)
            ->fit(Manipulations::FIT_CROP, 90, 80);

        $this->addMediaConversion('sm')
            ->format('webp')
            ->width(690)
            ->height(504)
            ->sharpen(10)
            ->optimize()
            ->quality(70)
            ->fit(Manipulations::FIT_CROP, 690, 504);

        $this->addMediaConversion('md')
            ->format('webp')
            ->width(810)
            ->height(480)
            ->sharpen(10)
            ->optimize()
            ->quality(70)
            ->fit(Manipulations::FIT_CROP, 810, 480);

        $this->addMediaConversion('lg')
            ->format('webp')
            ->width(870)
            ->height(448)
            ->sharpen(10)
            ->optimize()
            ->quality(70)
            ->fit(Manipulations::FIT_CROP, 870, 448);

        $this->addMediaConversion('xl')
            ->format('webp')
            ->width(1170)
            ->height(600)
            ->sharpen(10)
            ->optimize()
            ->quality(70)
            ->fit(Manipulations::FIT_CROP, 1170, 600);
    }
}
