
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $title??'' }}</title>
    <link rel="stylesheet" href="{{ public_path('css/wkhtml.css') }}" media="all" />
</head>

<body style="border:none">
    <div style=" padding: 15px;">

        <div class="page-break" >
            
            @yield('content')

        </div>
    </div>
</body>

</html>

