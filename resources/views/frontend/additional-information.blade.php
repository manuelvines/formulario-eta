@extends('layouts.frontend')

@section('content')

    <div class="container">

        <div>
            <p class="tittle-checked">Datos Personales <i class="fas fa-check"></i></p>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                 <p>Nombre completo: {{ $personalInfoRegister->name  }} {{ $personalInfoRegister->surnames }}</p>
                 <p>Correo: {{ $personalInfoRegister->email }} </p>
                 <p>Teléfono: {{ $personalInfoRegister->phone  }}</p>
                 <p>Fecha de nacimiento: {{ $personalInfoRegister->birth_date }} </p>

                 @if($personalInfoRegister->gender)
                     <p>Genero: Hombre</p>
                     @else
                    <p>Genero: Mujer</p>
                 @endif
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <p>País de Nacimiento: {{ $country_of_birth->name  }}</p>
                <p>Lugar Nacimiento: {{ $personalInfoRegister->place_of_birth  }}</p>
                <p>Estado Civil: {{ $personalInfoRegister->marital_status  }}</p>
                <p>País de Nacionalidad: {{ $country_of_nationality->name }}</p>
            </div>
        </div>


        <form action="{{ route('datos-adicionales')  }}" method="POST">
           @csrf
            <a name="pasaporte"></a>

        <div>
            <p class="tittle">Datos del pasaporte
        </div>

            <input type="hidden" value="{{ $personalInfoRegister->id  }}" name="persona_information_id" id="persona_information_id">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <small>Proporcione los datos del pasaporte que utilizará para entrar en Canadá. Introduzca estos datos exactamente como aparecen en su pasaporte.
                </small><br>
            </div>
        </div>
            <br>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="country_id">País del Pasaporte*</label>
                <select name="country_id" id="country_id" class="form-control" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id  }}">{{ $country->name  }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label for="passport_id">Número del Pasaporte*</label>
                <input type="text" name="passport_id" id="passport_id" class="form-control" required>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6 form-group">
                <label for="passport_expedition_date">Fecha de expedicion del pasaporte*</label>

                <input type="date" name="passport_expedition_date" id="passport_expedition_date" class="form-control" required  max="<?php echo date('Y-m-d') ?>">
            </div>

            <div class="col-md-6 form-group">
                <label for="passport_expiration">Fecha de vencimiento del pasaporte*</label>
                <input type="date" name="passport_expiration" id="passport_expiration" class="form-control" required min="<?php echo date('Y-m-d') ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">
                <p>¿Es usted ciudadano de cualquier otro país?</p>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="1" id="is_citizen1" onclick="is_citizen(1)" name="is_citizen_other_country">
                    <label class="form-check-label" for="materialInline1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="0" id="is_citizen0" onclick="is_citizen(0)" name="is_citizen_other_country" checked>
                    <label class="form-check-label" for="materialInline2">No</label>
                </div>

            </div>
            <div class="col-md-6 form-group">
              <div id="is_citizen">
                    <label for="citizen_other_country">Si tiene nacionalidad de cualquier país distinto del país que figura en su pasaporte, detállelo *</label>
                    <select name="citizen_other_country" id="citizen_other_country" class="form-control">
                        <option value="">Seleccione una opción</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id  }}">{{ $country->name  }}</option>
                        @endforeach
                    </select>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 form-group">

                <p>¿Ha solicitado anteriormente la entrada o la permanencia en Canadá? *</p>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="1" id="visa_request_before1" name="visa_request_before" onclick="before_request(1)">
                    <label class="form-check-label" for="visa_request_before1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="0" id="visa_request_before0" name="visa_request_before"  onclick="before_request(0)" checked>
                    <label class="form-check-label" for="visa_request_before0">No</label>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <div id="before_request">

                    <label for="identifier_uci">Identificador de Cliente Único (UCI), número de permiso o visado canadienses previos (opcional) </label>
                    <input type="text" name="identifier_uci" id="identifier_uci" class="form-control">

                </div>
            </div>
        </div>

            <div>
                <p class="tittle">Dirección de Residencia</p>
            </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                <label for="street">Nombre de la calle*</label>
                <input type="text" name="street" id="street" required class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                <label for="another_street">Nombre de la calle línea 2 (opcional)*</label>
                <input type="text" name="another_street" id="another_street"  class="form-control">

            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="number">Número de la calle*</label>
                    <input type="text" name="number" id="number" required class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="apartment">Número de apartamento (opcional)*</label>
                    <input type="text" name="apartment" id="apartment"  class="form-control">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="town">Ciudad/Pueblo*</label>
                    <input type="text" name="town" id="town" required class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 form-group">
                    <label for="country_home">País*</label>
                    <select name="country_home" id="country_home" class="form-control" required>
                        <option value="">Seleccione una opción</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id  }}">{{ $country->name  }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div>
                <p class="tittle">
                    Preguntas de antecedentes personales
                </p>
            </div>
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6">
                <label for="access_denied">¿Alguna vez le han denegado un visado o permiso, le han negado la entrada o le han pedido que salga de Canadá? *</label>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="1" id="access_denied1" onclick="check_denied(1)" name="access_denied">
                    <label class="form-check-label" for="materialInline1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="0" id="access_denied0" onclick="check_denied(0)" name="access_denied" checked>
                    <label class="form-check-label" for="materialInline2">No</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div id="check_denied_container">
                 <label for="access_denied_comment">Proporcione todos los datos posibles para ayudar a facilitar el trámite. *</label>
                 <textarea name="access_denied_comment" id="access_denied_comment" cols="30" rows="5" class="form-control"></textarea>
                </div>
            </div>

        </div>
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <label for="have_tuberculosis">En los últimos dos años, ¿le diagnosticaron tuberculosis o estuvo en contacto cercano con una persona con tuberculosis? *</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="1" id="have_tuberculosis1" onclick="check_tuberculosis(1)" name="have_tuberculosis">
                        <label class="form-check-label" for="materialInline1">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" value="0" id="have_tuberculosis0" onclick="check_tuberculosis(0)" name="have_tuberculosis" checked>
                        <label class="form-check-label" for="materialInline2">No</label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div id="check_tuberculosis_container">

                    <label for="access_denied_comment">Proporcione todos los datos posibles para ayudar a facilitar el trámite. *</label>
                    <textarea name="have_tuberculosis_comment" id="have_tuberculosis_comment" cols="30" rows="5" class="form-control"></textarea>

                    </div>
                </div>
            </div>
<br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="">¿Tienes alguna de estas condiciones de salud? *</label>
                <select name="health_condition" id="health_condition" required class="form-control">
                    <option value="">Seleccione una opción</option>
                    <option value="Sífilis no tratada">Sífilis no tratada</option>
                    <option value="Adicción a drogas o alcohol no tratada">Adicción a drogas o alcohol no tratada</option>
                    <option value="Condición de salud mental no tratada con psicosis">Condición de salud mental no tratada con psicosis</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
            <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="">¿Alguna vez ha cometido un delito o ha sido arrestado, acusado o condenado por un delito en cualquier país o territorio? *</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="1" id="comitted_crime1" onclick="check_comitted_crime(1)" name="comitted_crime">
                    <label class="form-check-label" for="materialInline1">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" value="0" id="comitted_crime0" onclick="check_comitted_crime(0)" name="comitted_crime" checked>
                    <label class="form-check-label" for="materialInline2">No</label>
                </div>
                <br>
                <small>Tenga en cuenta que las Autoridades de Inmigración podrá revisar la información proporcionada.</small>

                <div id="notice_comitted_crime" class="alert alert-danger">
                    Según la respuesta proporcionada, no podemos procesar su solicitud de visa en línea. Póngase en contacto con la Embajada o el Consulado de Canadá más cercano.
                </div>
            </div>
        </div>
            <br>
            <div>
                <p class="tittle">Consentimiento y declaración</p>
            </div>
            <a name="consentimiento"></a>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <p class="text-justify">
                        La información proporcionada al CIC (Ciudadanía e Inmigración de Canadá) se recopila bajo la autoridad de la Ley de Inmigración y Protección de los Refugiados (IRPA) para determinar la admisibilidad a Canadá. La información proporcionada puede ser compartida con otras instituciones gubernamentales canadienses como por ejemplo, pero no solo, la Agencia de Servicios Fronterizos de Canadá (ASFC), la Real Policía Montada de Canadá (RPMC), el Servicio Canadiense de Inteligencia y Seguridad (CSIS), el Ministerio de Asuntos Exteriores, Comercio y Desarrollo (DFATD), el Departamento de Empleo y Desarrollo Social de Canadá (ESDC), la Agencia Tributaria de Canadá (CRA), gobiernos provinciales y autonómicos y gobiernos extranjeros de acuerdo con el subapartado 8(2) de la Ley de Privacidad<span id="dots">...</span>

                    </p>

                    <div id="more">
                        <p class="text-justify">
                            La información puede ser revelada a gobiernos extranjeros, órganos de seguridad y autoridades penitenciarias respecto a la administración y al cumplimiento de la legislación en materia de inmigración, siempre y cuando el hecho de compartir dicha información no ponga en riesgo a la persona o a su familia. La información también puede ser validada de forma sistemática por otras instituciones gubernamentales canadienses con el fin de validar el estado y la identidad para administrar sus programas.
                        </p>

                        <p class="text-justify">
                            En los casos en que la biometría forma parte del proceso de solicitud, las huellas dactilares tomadas se guardan y comparten con la Real Policía Montada de Canadá (RCMP). El registro de las huellas también puede ser revelado a organismos de seguridad de Canadá de acuerdo con el subapartado 13.11(1) de las Normas de Inmigración y Protección de los Refugiados. La información puede utilizarse para determinar o verificar la identidad de una persona para prevenir, investigar o procesar un delito bajo el marco de cualquier ley de Canadá o de una provincia. Esta información también puede utilizarse para determinar o establecer la identidad de un individuo cuya identidad no pueda determinarse o verificarse satisfactoriamente de otro modo debido a una enfermedad física o mental. Canadá también podrá compartir información de inmigración relacionada con los registros biométricos con gobiernos extranjeros con los cuales Canadá tenga un acuerdo.
                        </p>

                        <p class="text-justify">
                            Según el tipo de solicitud realizada, la información que ha proporcionado será almacenada en uno o más Bancos de Información Personal (PIB) conforme al apartado 10(1) de la Ley de Privacidad de Canadá. Las personas también tienen derecho a la protección y al acceso a sus datos personales almacenados en cada PIB correspondiente de acuerdo a la Ley de Acceso a la Información. Puede obtener más información sobre los PIB referentes a la línea de negocio y los servicios del CIC y sobre el acceso a la información y los programas de privacidad del Gobierno de Canadá en la página web de Infosource (http://infosource.gc.ca) y a través del centro de llamadas del CIC. Infosource también está disponible en bibliotecas públicas de Canadá.
                        </p>
                    </div>

                    <div class="text-right">
                        <a href="#consentimiento" class="btn btn-primary p-2"  class="text-right" onclick="myFunction()" id="myBtn">Leer más</a>
                    </div>
                    <br>

                </div>
            </div>

            <div>
            <p class="tittle">Declaración del solicitante</p>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="terms" required="required">
                    <label class="custom-control-label" for="terms">He leído y entiendo los <a href="https://canadianvisaeta.mx/terminos-y-condiciones/" target="_blank">términos y condiciones</a> y la <a href="https://canadianvisaeta.mx/politica-de-privacidad/" target="_blank">política de privacidad.</a></label>

                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" required="required">
                    <label class="custom-control-label" for="defaultUnchecked">Declaro que la información que he proporcionado en esta solicitud es veraz, completa y correcta</label>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" id="btn-submit" class="btn btn-lg btn-success">Continuar</button>
            </div>
        </div>

        </form>

    </div>

    @push('scripts')
        <script src="{{ asset('js/readmore.js')  }}"></script>
        <script src="{{ asset('js/showandhideinformation.js') }}"></script>
    @endpush
@endsection
