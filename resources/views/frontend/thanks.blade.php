@extends('layouts.frontend')
@section('content')

    <div class="container">

          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                  <img src="{{ asset('img/payments-methods/payment-success.gif')  }}" alt="Pago satisfactorio">

              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <h2 class="text-center">Hemos procesado su pago de forma satisfactoria.</h2>
                  <p class="text-center">
                      Le contactaremos por correo cuando exista una actualización sobre su eTA, también puede ponerse en contacto en el <a href="tel:5586009665">5586009665</a>
                  </p>

              </div>
           </div>

           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                   <a href="https://canadianvisaeta.mx/" class="btn btn-success">Volver al sitio</a>
               </div>
           </div>
    </div>


@endsection
