<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;

class MercadoPagoService
{
    use ConsumesExternalServices;

    protected  $baseUri;
    protected  $key;
    protected  $secret;
    protected  $baseCurrency;

    public function __construct()
    {
        $this->baseUri = config('services.mercadopago.base_uri');
        $this->key = config('services.mercadopago.key');
        $this->secret = config('services.mercadopago.secret');
        $this->baseCurrency = config('services.mercadopago.base_currency');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $queryParams['access_token'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return $this->secret;
    }

    public function handlePayment(Request $request)
    {

       $request->validate([
           'card_network' => 'required',
           'card_token' => 'required',
           'email' => 'required',
       ]);

       $payment = $this->createPayment(
            $request->value,
            $request->currency,
            $request->card_network,
            $request->card_token,
            $request->email

       );


       if($payment->status === "approved"){


           $name = $payment->payer->first_name;

           return redirect()
               ->route('thanks')
               ->withSuccess(['payment' => "Gracas {$name}. Recibimos su pago"]);

       }

       return redirect()
           ->route('pago')
           ->withErrors('No pudimos confirmar su pago. Por favor, inténtalo de nuevo');


    }

    public function createPayment($value, $currency, $cardNetWork, $cardToken, $email, $installments = 1)
    {

    return $this->makeRequest(
        'POST',
         '/v1/payments',
        [],
        [
            'payer' => [
                'email' => $email,
            ],
            'binary_mode'=> true,
            'transaction_amount' => (float)$value,
            'payment_method_id' => $cardNetWork,
            'token' => $cardToken,
            'installments' => $installments,
            'statement_descriptor' => config('app.name')
        ],
        [],
        $isJsonRequest = true
    );


    }

    public function handleApproval()
    {
    }


    public function resolverFactor($currency)
    {

    }


}
