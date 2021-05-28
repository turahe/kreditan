<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Http\Resources\RajaOngkirResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SicepatController extends Controller
{
    private $header = [
        'Accept' => 'application/json',
        'api-key' => '8ec4398641ea55f32cb106397fe8f352'
    ];
    public function origin()
    {
        $data= Http::withHeaders($this->header)->get('http://apitrek.sicepat.com/customer/origin')
            ->json('sicepat.results');
        return RajaOngkirResource::collection($data);
    }
    public function destination()
    {
        $data= Http::withHeaders($this->header)->get('http://apitrek.sicepat.com/customer/destination')
            ->json('sicepat.results');
        return RajaOngkirResource::collection($data);
    }
    public function tariff(Request $request)
    {
        $this->validate($request, [
           'origin' => 'string|required',
           'destination' => 'required|string',
           'weight' => 'required|integer'
        ]);
        $data= Http::withHeaders($this->header)->get('http://apitrek.sicepat.com/customer/tariff', [
            'origin' => $request->get('origin'),
            'destination' => $request->get('destination'),
            'weight' => $request->get('weight')
        ])
            ->json('sicepat.results');
        return RajaOngkirResource::collection($data);
    }
    public function waybill(Request $request)
    {
        $this->validate($request, [
            'waybill' => 'string|required',
        ]);
        $data= Http::withHeaders($this->header)->get('http://apitrek.sicepat.com/customer/waybill', [
            'waybill' => $request->get('waybill')
        ])->json('sicepat.result');
        return new RajaOngkirResource($data);
    }
}
