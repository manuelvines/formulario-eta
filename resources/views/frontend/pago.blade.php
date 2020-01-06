@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Completar pago para eTA</div>

                    <h1 class="card-title pricing-card-title text-center">$1500.00 <small class="text-muted">/ MXN</small></h1>

                    <div class="card-body">
                        <form action="{{ route('pay')  }}" method="POST" id="paymentForm">
                            @csrf

                            <div class="row">
                                <div class="col-auto">
                                    <input
                                        type="hidden"
                                        min="5"
                                        step="0.01"
                                        class="form-control"
                                        name="value"
                                        value="1500.00"
                                        required
                                    >

                                </div>
                                <div class="col-auto">

                                        @foreach ($currencies as $currency)
                                        <input type="hidden" value="{{ strtoupper($currency->iso) }}" name="currency" required>
                                        @endforeach

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col text-center">
                                    <label class="text-center">Seleccione la plataforma de pago deseada:</label>
                                    <div class="form-group text-center" id="toggler">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @foreach ($paymentsPlatforms as $paymentPlatform)
                                                <label
                                                    class="btn btn-outline-secondary rounded m-2 p-1"
                                                    data-target="#{{ $paymentPlatform->name }}Collapse"
                                                    data-toggle="collapse"
                                                >
                                                    <input
                                                        type="radio"
                                                        name="payment_platform"
                                                        value="{{ $paymentPlatform->id }}"
                                                        required
                                                    >
                                                    <img class="img-thumbnail" src="{{ asset($paymentPlatform->image) }}">
                                                </label>
                                            @endforeach
                                        </div>
                                        @foreach ($paymentsPlatforms as $paymentPlatform)
                                            <div
                                                id="{{ $paymentPlatform->name }}Collapse"
                                                class="collapse"
                                                data-parent="#toggler"
                                            >
                                                @includeIf('components.' . strtolower($paymentPlatform->name) . '-collapse')
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" id="payButton" class="btn btn-success btn-lg">PAGAR AHORA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
