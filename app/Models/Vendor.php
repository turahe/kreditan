<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Vendor
 *
 * @property int $id
 * @property string $slug
 * @property int $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $description
 * @property string|null $domain
 * @property string|null $subdomain
 * @property string|null $registered_at
 * @property string $type type of vendor is merchant or creditor
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereRegisteredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereSubdomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUserId($value)
 * @mixin \Eloquent
 */
class Vendor extends Model
{
    use HasFactory;
}
