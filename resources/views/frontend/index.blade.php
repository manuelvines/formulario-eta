@extends('layouts.frontend')
@section('content')

    <div class="container">

        <div>
            <p class="tittle">Datos Personales</p>
        </div>

        <form action="{{ route('datos-personales')  }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">


                        <label for="">Apellido(s)*</label>
                        <input type="text" name="surnames" id="surnames" class="form-control" required>
                        <div><p class="m-group-content--help">?</p></div>
                        <small>Escriba sus apellidos tal y como aparecen en su pasaporte</small>


                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="">Nombre(s)*</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    <small>Escriba su nombre tal y como aparece en su pasaporte</small>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="birth_date">Fecha de nacimiento *</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required min="1900-01-01"  max="<?php echo date('Y-m-d') ?>">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="country_of_birth ">País de nacimiento*</label>
                    <select name="country_of_birth" id="country_of_birth" class="form-control" required>
                        <option value=""> Seleccione una opción</option>

                    @foreach($countries as $country)
                            <option value="{{ $country->id  }}">{{ $country->name  }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="place_of_birth ">Lugar de nacimiento*</label>
                    <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <p>Genero*</p>

                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="1" id="gender1" name="gender" required>
                        <label class="form-check-label" for="materialInline1">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="0" id="gender0" name="gender" required>
                        <label class="form-check-label" for="materialInline2">Mujer</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="marital_status">Estado civil*</label>

                    <select name="marital_status" id="marital_status" class="form-control" required>
                        <option value=""> Seleccione una opción</option>

                        <option value="Casado/a">Casado/a</option>
                        <option value="Separado/a legalmente">Separado/a legalmente</option>
                        <option value="Divorciado/a">Divorciado/a</option>
                        <option value="Matrimonio anulado">Matrimonio anulado</option>
                        <option value="Viudo/a">Viudo/a</option>
                        <option value="Unión de hecho">Unión de hecho</option>
                        <option value="No casado/a nunca, soltero/a">No casado/a nunca, soltero/a</option>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="country_of_nationality">País de nacionalidad*</label>

                    <select name="country_of_nationality" id="country_of_nationality" class="form-control">
                        <option value=""> Seleccione una opción</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id  }}">{{ $country->name  }}</option>
                    @endforeach
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="">Email*</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="">Confirmar Email*</label>
                    <input type="text" name="email_confirm" id="email_confirm" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="phone">Teléfono*</label>
                    <input type="text" name="phone" id="phone" value="55904132" class="form-control" required>
                </div>
            </div>

         <div id="is-a-minor">
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <small >
                        Si usted va a presentar una solicitud en nombre de un menor de edad, por favor indique su información personal como representante.
                    </small>
                      </div>
                  </div>
                  <div class="row">


                    <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                        <label for="">Apellidos Representante*</label>
                        <input type="text" name="representative_surnames" id="representative_surnames" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                        <label for="">Nombre Representante*</label>
                        <input type="text" name="representative_name" id="representative_name" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                        <label for="">Dirección Representante*</label>
                        <input type="text" name="representative_address " id="representative_address " class="form-control">
                    </div>

                </div>
         </div>


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-lg btn-success">Siguiente</button>
                </div>
            </div>

        </form>
    </div>

    @push('scripts')

        <script>
            $birth_date = document.getElementById('birth_date');
            $birth_date.addEventListener('change',function () {
                const http = new XMLHttpRequest();
                const url  = "{{ url('get-age/')  }}/" + $birth_date.value;
                http.open("GET", url);
                http.send();
                http.onreadystatechange = function () {
                      if(parseInt(this.responseText) < 18){
                          document.getElementById('is-a-minor').style.display = "block";
                          console.log("es menor");
                      }else{
                          document.getElementById('is-a-minor').style.display = "none";
                          console.log("es mayor");
                    }
                }
            });
        </script>
    @endpush
@endsection
