<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $title
 * @property string $address
 * @property string $postal_code
 * @property string|null $phone
 * @property int|null $village_id
 * @property int|null $district_id
 * @property int|null $city_id
 * @property int|null $state_id
 * @property int|null $country_id
 * @property string|null $map_latitude
 * @property string|null $map_longitude
 * @property string $type
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereMapLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereMapLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereVillageId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;
}
