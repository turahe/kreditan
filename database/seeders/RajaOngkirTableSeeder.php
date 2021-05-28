<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RajaOngkirTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_geodirectories_shippingcharges')->truncate();

        $headerKey = [
            'key' => '5ac5d82f1e27bd954a205a9687e188b0'
        ];
        $data = Http::withHeaders($headerKey)
            ->get('https://pro.rajaongkir.com/api/province')
            ->json('rajaongkir.results');

        $provinces = array_map(function ($arr) {
            return [
                'id_parent' => 0,
                'id_provider' => 1,
                'code_origin' => $arr['province_id'],
                'code_destination' => $arr['province_id'],
                'name' => $arr['province'],
                'type' => 'PROVINCE',
                'record_status' => 'PUBLISH',
                'record_create_timestamp' => Carbon::now(),
                'record_update_timestamp' => Carbon::now()
            ];
        }, $data);

        foreach (array_chunk($provinces, 30) as $province) {
            DB::table('t_geodirectories_shippingcharges')->insert($province);
        }

        $data1 = Http::withHeaders($headerKey)
            ->get('https://pro.rajaongkir.com/api/city')
            ->json('rajaongkir.results');

        $cities = array_map(function ($arr) {
            return [
                'id_parent' => $arr['province_id'],
                'id_provider' => 1,
                'code_origin' => $arr['city_id'],
                'code_destination' => $arr['city_id'],
                'name' => $arr['city_name'],
                'type' => $arr['type'] === 'Kabupaten' ? 'DISTRICT': 'CITY',
                'record_status' => 'PUBLISH',
                'record_create_timestamp' => Carbon::now(),
                'record_update_timestamp' => Carbon::now()
            ];
        }, $data1);

        foreach ($cities as $city) {
            DB::table('t_geodirectories_shippingcharges')->insert($city);

            $data2 = Http::withHeaders($headerKey)
                ->get('https://pro.rajaongkir.com/api/subdistrict', [
                    'city' => $city['code_origin']
                ])
                ->json('rajaongkir.results');

            $subdistricts = array_map(function ($arr) use ($city) {
                return [
                    'id_parent' => $city['code_origin'],
                    'id_provider' => 1,
                    'code_origin' => $arr['subdistrict_id'],
                    'code_destination' => $arr['subdistrict_id'],
                    'name' => $arr['subdistrict_name'],
                    'type' => 'SUBDISTRICT',
                    'record_status' => 'PUBLISH',
                    'record_create_timestamp' => Carbon::now(),
                    'record_update_timestamp' => Carbon::now()
                ];
            }, $data2);

            foreach (array_chunk($subdistricts, 30) as $subdistrict) {
                DB::table('t_geodirectories_shippingcharges')->insert($subdistrict);
            }
        }

    }
}
