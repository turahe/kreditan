<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SicepatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = json_decode(file_get_contents(storage_path('data/API SICEPAT/origin.json')), true);
        $origins = array_map(function ($arr) {
            return [
                'id_parent' => 0,
                'id_provider' => 2,
                'code_origin' => $arr['origin_code'],
                'code_destination' => null,
                'name' => $arr['origin_name'],
                'type' => 'CITY',
                'record_status' => 'PUBLISH',
                'record_create_timestamp' => Carbon::now(),
                'record_update_timestamp' => Carbon::now()
            ];
        }, $data1);

        DB::table('t_geodirectories_shippingcharges')->insert($origins);

        $data2 = json_decode(file_get_contents(storage_path('data/API SICEPAT/destination.json')), true);
        $destinations = array_map(function ($arr) {
            return [
                'id_parent' => 0,
                'id_provider' => 2,
                'code_origin' => null,
                'code_destination' => $arr['destination_code'],
                'name' => $arr['subdistrict'],
                'type' => $arr['province'] === 'INT' ? null : 'SUBDISTRICT',
                'record_status' => 'PUBLISH',
                'record_create_timestamp' => Carbon::now(),
                'record_update_timestamp' => Carbon::now()
            ];
        }, $data2);


        foreach ($destinations as $destination) {
            if (!$destination['type'] == null) {
                DB::table('t_geodirectories_shippingcharges')->insert($destination);
            }
        }

    }
}
