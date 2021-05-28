<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RajaOngkirResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaongkirController extends Controller
{
    private $headerKey = [
        'key' => '5ac5d82f1e27bd954a205a9687e188b0'
    ];

    public function province()
    {

        $data = Http::withHeaders($this->headerKey)
            ->get('https://pro.rajaongkir.com/api/province')
            ->json('rajaongkir.results');

        return RajaOngkirResource::collection($data);
    }

    public function city()
    {
        $data = Http::withHeaders($this->headerKey)
            ->get('https://pro.rajaongkir.com/api/city')
            ->json('rajaongkir.results');

        return RajaOngkirResource::collection($data);

    }

    public function subdistrict(Request $request)
    {
        $this->validate($request, [
            'city' => 'required|integer'
        ]);
        $data = Http::withHeaders($this->headerKey)
            ->get('https://pro.rajaongkir.com/api/subdistrict', [
                'city' => $request->get('city')
            ])
            ->json('rajaongkir.results');

        return RajaOngkirResource::collection($data);
    }

    public function cost(Request $request)
    {
        $this->validate($request, [
            "origin" => 'required|integer',
            "originType" => 'required|string',
            "destination" => 'required|integer',
            "destinationType" => 'required|string',
            "weight" => 'required|integer',
            "courier" => 'required|string'
        ]);
        return Http::withHeaders($this->headerKey)
            ->post('https://pro.rajaongkir.com/api/cost', [
                "origin" => $request->get('origin'),
                "originType" => $request->get('originType'),
                "destination" => $request->get('destination'),
                "destinationType" => $request->get('destinationType'),
                "weight" => $request->get('weight'),
                "courier" => $request->get('courier')
            ])
            ->json();
    }
}
