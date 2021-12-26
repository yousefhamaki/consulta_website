<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;

use App\Order;





class PaymentController extends Controller

{



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        //

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

        

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param \Illuminate\Http\Request $request

     * @return \Illuminate\Http\Response

     */

     

     // save customer`s order in merchant database

    public function store(Request $request)

    {

        //

        $order = new Order();

        $order->orderNo  = Str::random(12);

        $order->amount   =  $request->amount;

        $order->currencyCode       =  $request->currencyCode;

        $order->customerEmail      =  $request->customerEmail;

        $order->customerName       =  $request->customerName;

        $order->customerPhone      =  $request->customerPhone;

        $order->customerCountry    =  $request->customerCountry;

        $order->lang               =  $request->lang;

        $order->status             =  $request->status;

        $order->note               =  $request->note;

        

        $is_saved =  true;// save order in database $order->save();

        

        if ($is_saved){

            return $this->getCheckout($order);

        }

        else 

        {

            $error_msg = "Something went as unexpected !, your order isn`t created.";

            return view("error", compact('error_msg'));

        }

    }

    

    //  view success page if payment 

    public function getSuccessPage($orderId=0, $chkStatus =0)

     {

         return view("success", compact('orderId','chkStatus'));

     }

     

     public function getErrorPage($error_msg)

     {

         return view("error");

     }



    /**

     * Display the specified resource.

     *

     * @param int $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param int $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param \Illuminate\Http\Request $request

     * @param int $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param int $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }

    

     // this function requests checkout page, 

     // If the result of the response was successfully, the function redirect to payment page

     // If the result of the response was failed, the function redirect to error page with message   

     

     private function getCheckout(Order $order)

    {

        

        $url = 'https://maktapp.credit/v3/AddTransaction';



        $data = array(

            'token'    => "3-4qCAi69d5JwFkRCy5tuHSsp4YicZn7xKcRYi9EtGDx2BcmmWgqIrEDJIQq9xRoSC8NwIGd8l2bJMwNmeodsa_0HFnubgQJC7Kccx40UMZTypO6o-fUvnpqO2wfzCuUlqkGDlESp92kyeRP30u5-BdhLCprg4CXqV8yDyv9bRVW18YZKW2XWwrDISHAuGGl4a_0Sc13Q8JdN_G82EDZYhtoz04MW_lIjWxUBUgkSim-1UegRm-nV1MqfZSGedIVCsbAN_b9HigQRSp7JmwsLpdHRWZ7THwTiedNvOrdtzG-_kj00-oJc2PiJ_bnwnyEYh41YZVpU9F6bAW6P0qjNdbyi9Ci85lbvTsfYo31YVaUwO86_KCaEi2_rD5WZl-l4nGUbBEK3HRUQ6csFT5_Bavt7glL6Zx1xxilBbMPJBaJm-K6geJd-3skl7kkIUE09aMY9_8Hgby-XvDr3BXjhI7kMMLjwdF-zJhZ_ETnB4AogB5H444jWucmBqtDrfzPuwt4h4MzRu3vNFKGXmR7RCMGDpGwm4L6s2M8RZvRGfbgLPIuAoSiHLnqO_4aWKordYw_HdvkfDOOEmNwIiZfSAN8PiXkLo6qOkuC0Iwh3nUagP_JVFXzvcOAlIHqgVeJuZZU2Wn-yMXAy6aTqEFd8DyBqYFThpZdSefe972Ig1gn3kvmTV6KYzSedq2JCFrq4ILN-Q",

            'FcmToken' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",

            'currencyCode'    => $order->currencyCode,

            'orderId'         => $order->orderNo,

            'amount'          => $order->amount,

            'customerEmail'   => $order->customerEmail,

            'customerName'    => $order->customerName,

            'customerPhone'   => $order->customerPhone,

            'customerCountry' => $order->customerCountry,

            'lang'            => $order->lang,

            'note'            => $order->note,

        );



        $response =  curl_post($url, $data);

        $data_json_decode = json_decode($response);

        

        /*

         * The above request will returns JSON structured if all parameters are valid like this:

         *  { 

         *       "result": "https://maktapp.credit/pay/MCPaymentPage?paymentID=XXXXXXXXXX" 

         *   }

            

         *   The above request will returns JSON structured if one parameter is null or not valid like this:

         *   { 

         *       "result": x 

         *   } [-1, -2, -3, -6, -8, -10, -20, -21 ] 

         */

        

        $result = $data_json_decode->{'result'};

        

        // check the result of response

        $response = checkResponseStatus($result); // calling from app/Help/PaymentHelper.php

        if ($response == "success")

        { 

          // if response is success then redirect to "https://maktapp.credit/pay/MCPaymentPage?paymentID=XXXXXXXXXX"

          return Redirect::to($result) ;

        }

        else 

        { 

            // if  one parameter is null or not valid then view error page with error_msg

            

           $error_msg = $response;

           return view("error", compact('error_msg'));  

        }

    }



}

