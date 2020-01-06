@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tu banco cuendo con: Card authentication and 3D Secure </div>

                    <div class="card-body">
                            <p>Como medida de seguridad tu banco require una confirmación,
                                .</p>

                             {{ $clientSecret  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{  config('services.stripe.key')  }}');

            stripe.handleCardAction("{{ $clientSecret }}")
                  .then(function (result){

                         if(result.error){
                             window.location.replace("{{ route('cancelled')  }}");
                         }else{

                             window.location.replace("{{ route('approval')  }}");

                         }

                  });
        </script>
    @endpush

@endsection
