<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TikiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = json_decode(file_get_contents(storage_path('data/TIKI/tarif.json')), true);
        $file = array_map(function ($arr) {
            return [
//                "id" => $arr['id'],
//                "city_id" => $arr['city_id'] ?? null,
//                "province_id" => $arr['province_id'],
//                "citycounty_id" => $arr['citycounty_id'],
//                "sub_dist" => $arr['sub_dist'],
//                "dist" => $arr['dist'],
//                "city_county_type" => $arr['city_county_type'],
//                "city_county" => $arr['city_county'],
//                "province" => $arr['province'],
//                "zip_code" => $arr['zip_code'],
//                "tariff_code" => $arr['tariff_code'],

                'id_parent' => 0,
                'id_provider' => 7,
                'code_origin' => $arr['tariff_code'],
                'code_destination' => $arr['tariff_code'],
                'name' => $arr['sub_dist'],
                'type' => $arr['city_county_type'] === 'Kota' ? 'CITY' : 'DISTRICT',
                'record_status' => 'PUBLISH',
                'record_create_timestamp' => Carbon::now(),
                'record_update_timestamp' => Carbon::now()
            ];
        }, $data);

        foreach (array_chunk($file, 30) as $data) {
            DB::table('t_geodirectories_shippingcharges')->insert($data);
        }

    }
}
