<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Provider
 *
 * @property int $id
 * @property string $name
 * @property string $service
 * @property string|null $logo
 * @property string|null $description
 * @property string|null $homepage
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereHomepage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Provider extends Model
{
    use HasFactory;
}
