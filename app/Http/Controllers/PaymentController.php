<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Resolvers\PaymentPlatformResolver;


class PaymentController extends Controller
{
    //
    protected $paymentPlatformResolver;

    //el constructor recibe un objeto de PaymentPlatformResolver
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        //$this->middleware('auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function pay(Request $request)
    {
        $rules = [
            'value' => ['required','numeric','min:5'],
            'currency' => ['required','exists:currencies,iso'],
            'payment_platform' => ['required','exists:payment_platforms,id'],
        ];

        $request->validate($rules);

        //Accedemos a PaymentPlatformResolver
        $paymentPlatform = $this->paymentPlatformResolver->resolverService($request->payment_platform);
        //guardamos el id del payment_platform
        session()->put('paymentPlatformId', $request->payment_platform);
        return $paymentPlatform->handlePayment($request);
    }

    public function approval()
    {

        if(session()->has('paymentPlatformId')){
            //Accedemos a PaymentPlatformResolver, pero ya no temos acceso al request, pero guardamos el id
            //en session
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolverService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }

        return redirect()
            ->route('pago')
            ->withErrors('No podemos recuperar su plataforma de pago. Por favor, inténtalo de nuevo');
    }

    public  function cancelled()
    {
        return redirect()
            ->route('pago')
            ->withErrors('Cancelaste el pago');
    }
}
