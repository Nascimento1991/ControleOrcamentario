
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlo Orçamentário</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
</head>
<body>
    <div class="container">
        @include('controleOrcamentario.layout.menuLateral')
        <div class="wrapper">
            @include('controleOrcamentario.layout.topo')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{asset('js/principal.js')}}"></script>
    @yield('javascript')
</body>

</html>