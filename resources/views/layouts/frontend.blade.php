<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eTA Canada | Online Electronic travel authorization to Canada- @yield('title')</title>
    <meta name="description" content="Complete the eTA application and obtain the Electronic Travel Authorization to Canada. All Visa-exempt foreign nationals must request a Visa eTa Canada.">
    <meta property="og:title" content="Visa eTA Canada Online Application | eTA Canada - Apply Online"/>
    <meta property="og:description" content="Complete the eTA application and obtain the Electronic Travel Authorization to Canada. All Visa-exempt foreign nationals must request a Visa eTa Canada."/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content="https://canadianvisaeta.mx/"  />
    <meta property="og:site_name" content="Canada electronic travel authority"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}" type="image/x-icon">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--ICONS-->
    <script src="https://kit.fontawesome.com/fce69bb25a.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/permisoetacanada.png')  }}" style="max-width: 200px;" class="img-fluid" alt="Permiso eTA para viajar a Canada">
        </a>
    </nav>

    <div class="container">
        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger">

                @foreach($errors->all() as $error )
                    <li>{{ $error  }}</li>
                @endforeach
            </div>
        @endif


        @if (session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    @foreach (session()->get('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
     @yield('content')


    <footer>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="{{ asset('img/payments-methods/eta-pagos-seguros.png')  }}" alt="Pagos seguros" class="img-fluid">
            <small>
                Su información personal es cifrada de forma segura por el Certificado de seguridad (SSL)
            </small>
        </div>

    </div>

</div>
<div class="container">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <ul id="menu-footer">
            <li><a target="_blank" href="https://canadianvisaeta.mx/acerca-de/">|Acerca de Nosotros |</a></li>
            <li><a target="_blank" href="https://canadianvisaeta.mx/requisitos/">|Requisitos para la eTA |</a></li>
            <li><a target="_blank" href="https://canadianvisaeta.mx/politica-de-privacidad/">|Política de Privacidad |</a></li>
            <li><a target="_blank" href="https://canadianvisaeta.mx/politica-de-cookies/">|Política de Cookies |</a></li>
            <li><a target="_blank" href="https://canadianvisaeta.mx/acerca-de/">|Acerca de Nosotros |</a></li>
            <li><a target="_blank" href="https://canadianvisaeta.mx/aviso-legal/">|Aviso Legal |</a></li>
        </ul>

    </div>
</div>



<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <img src="{{ asset('img/payments-methods/eta-metodos-de-pago.png')  }}" alt="Medios de pago para permiso eTA" title="Permiso eTA Canadá" class="img-fluid">
        </div>
    </div>


</div>


    </footer>
    <div class="aviso">
        <small>Aviso legal: canadianvisaeta.mx no está afiliada con el gobierno de Canada.</small><br>
        <small>
            <a href="https://www.proyecciondigital.com.mx/" target="_blank">Diseñado por Proyección Digital 2020.</a>

        </small>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    @stack('scripts')
</body>
</html>
