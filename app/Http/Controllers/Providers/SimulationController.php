<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SimulationResource;
use Illuminate\Http\Request;

class SimulationController extends Controller
{
    public function __invoke(Request $request)
    {
        switch ($request->idCreditor) {
            default:
                // menggunakan rumus
                /**
                 * 1. ambil data tenor dari db
                 * 2. calculate
                 */
                $priceSale = $post->price;
                $calculateDp = $post->down_payment;
                $interest = $post->interest;
                $value = $post->value;
                $tenor = $post->tenor;
                $range = range(3, $tenor, 1);
                $result = [];
                foreach ($range as $value) {
                    $result[] = [
                        'down_payment' => 0,
                        'installment' => calculate_monthly_flat_rate_installments($priceSale - $calculateDp, $interest, $value)[1],
                        'period' => $value
                    ];
                }

                return SimulationResource::collection($result);

                break;
            case 1: // Bank Central Asia
                $username = "impiankredit";
                $password = "kredit2020";
                $url = "http://112.78.137.46:7104/SimulasiKredit";
                $postData = array(
                    'UserName' => 'impiankredit',
                    'PassWord' => 'kredit2020',
                    'harga_kendaraan' => $post->price,
                    'tipe_uang_muka' => '1',
                    'uang_muka' => '30',
                    'kondisi' => '6',
                    'tahun' => '2020',
                    'asuransi' => '2005',
                    'zona' => '3011'
                );
                $dataarray = array(
                    'SimulasiKreditRequest' => $postData
                );
                // var_dump(json_encode($dataarray));die;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json;charset=utf-8'));
                curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataarray));
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                $output = curl_exec($ch);
                if (curl_errno($ch)) {
                    $error_msg = curl_error($ch);
                    $this->sendError(400, $error_msg);
                }
                $info = curl_getinfo($ch);
                curl_close($ch);

                $hasilw = json_decode($output);
                $hasildecodedata = $hasilw->SimulasiKreditResponse->ADDMList->ADDM;
                foreach ($hasildecodedata as $ADDM) {
                    $dataoutput[] = array(
                        "period" => $ADDM->tenor,
                        "installment" => $ADDM->ph,
                        "down_payment" => $ADDM->tdp,
                    );
                    // break;
                }

                return SimulationResource::collection($dataoutput);

                break;
            case 2: // Duha
                $data = [
                    'type' => 'SHOPPING',
                    'price' => $post->price
                ];
                return SimulationResource::collection($data);

                break;
        }
    }

}
