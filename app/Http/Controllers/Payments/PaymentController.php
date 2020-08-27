<?php

namespace App\Http\Controllers\Payments;

use App\Company;
use App\Http\Controllers\Controller;
use App\Order;
use App\Payment;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout($id){
        $order = Order::find($id);
        if(auth()->user()->is_company == 1){
            $company = Company::find(auth()->user()->company_id);
            return view('frontend.checkout-company',compact('order','company'));
        }else{
            return view('frontend.checkout-user',compact('order'));
        }

    }
    public function getCheckoutId(Request $request){
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=". $request->price.
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);

        $view = view('ajax.form')->with(['responseData' => $res , 'id' => $request->offer_id])
            ->renderSections();

        return response()->json([
            'status' => true,
            'content' => $view['main']
        ]);
    }
    public function status($id){
        $offer = Order::find($id);
        if (request('id') && request('resourcePath')) {
            $payment_status = $this->getPaymentStatus(request('id'), request('resourcePath'));
            if (isset($payment_status['id'])) { //success payment id -> transaction bank id
                $showSuccessPaymentMessage = true;
                if(auth()->user()->is_company == 0){
                    Payment::create([
                        'user_id'     => auth()->user()->id,
                        'order_id'    => $offer->id,
                        'amount'      => $offer->amount,
                        'bank_transaction_id' => $payment_status['id'],
                    ]);
                }else{
                    $users = User::where('company_id',auth()->user()->company_id)->where('id','<>',auth()->user()->id)->get();
                    foreach ($users as $user){
                        Payment::create([
                            'user_id'     => $user->id,
                            'order_id'    => $offer->id,
                            'amount'      => $offer->amount,
                            'bank_transaction_id' => $payment_status['id'],
                        ]);
                    }
                }

                Order::find($offer->id)->update(['status' => 1]);
                //save order in orders table with transaction id  = $payment_status['id']
                return view('frontend.status-checkout',compact('offer'))->with(['success' =>  'Payment Success']);
            } else {
                $showFailPaymentMessage = true;
                return view('frontend.status-checkout',compact('offer'))->with(['fail'  => 'Payment Failed']);
            }

        }
    }

    private function getPaymentStatus($id, $resourcepath)
    {
        $url = "https://test.oppwa.com/";
        $url .= $resourcepath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return json_decode($responseData, true);

    }

}
