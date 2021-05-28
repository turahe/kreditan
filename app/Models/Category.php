<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $slug
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $fee
 * @property int $order_column
 * @property string $layout
 * @property string $type by default is product, blog, page
 * @property int|null $record_left
 * @property int|null $record_right
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereRecordLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereRecordRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'parent_id',
        'title',
        'description',
        'layout',
        'type',
    ];

    /**
     * @return string
     */
    public function getLftName()
    {
        return 'record_left';
    }

    /**
     * @return string
     */
    public function getRgtName()
    {
        return 'record_right';
    }

    /**
     * @return string
     */
    public function getParentIdName()
    {
        return 'parent_id';
    }

    /**
     * Get cover image url.
     *
     * @return string
     */
    public function getCoverAttribute(): string
    {
        if ($this->hasMedia('image') && $this->relationLoaded('media') && config('filesystems.default') !== 'public') {
            return $this->getFirstTemporaryUrl(Carbon::now()->addHour(), 'image', 'sm');
        }

        if ($this->getFirstMediaUrl('image', 'sm')) {
            return $this->getFirstMediaUrl('image', 'sm');
        }

        return \Storage::url('images/not-found.jpg');
    }

    /**
     * get Url.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('category.detail', $this->slug);
    }

    /**
     * one to many polymorphic relation category model and other models.
     *
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id')
            ->latest('published_at');
    }

    /**
     * one to many relationship category model and other models.
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id')
            ->latest('published_at');
    }

}
