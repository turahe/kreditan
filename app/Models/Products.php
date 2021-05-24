<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Products
 *
 * @property int $id
 * @property int|null $category_id category products
 * @property int|null $parent_id product parents of product
 * @property int $vendor_id owner of product or shop name
 * @property string $slug automatic generate of slug base title
 * @property string $title name of product
 * @property string|null $subtitle subtitle of title post
 * @property string|null $description description of post
 * @property string $content_raw content of product with style markdown
 * @property string $content_html content of product with style html
 * @property int|null $status
 * @property int|null $order_column
 * @property string|null $published_at
 * @property string $type type is enum, digital, physic, ebook
 * @property string|null $layout
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Products newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Products query()
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereContentRaw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Products whereVendorId($value)
 * @mixin \Eloquent
 */
class Products extends Model
{
    use HasFactory;
}
