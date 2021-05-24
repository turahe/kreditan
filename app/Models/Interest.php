<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Interest
 *
 * @property int $id
 * @property int $vendor_id
 * @property int $category_id
 * @property string $interest
 * @property string $down_payment
 * @property string $tenor
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Vendor $creditor
 * @method static \Illuminate\Database\Eloquent\Builder|Interest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereDownPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereTenor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Interest whereVendorId($value)
 * @mixin \Eloquent
 */
class Interest extends Model
{
    use HasFactory;

    public function creditor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
