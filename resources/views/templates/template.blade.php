<!doctype html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home - ContWEB</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    </head>
    <body>
        <!-- NAVBAR -->
        @component('templates.navbar')
        @endcomponent
        <!-- CONTENT -->
        @yield('content')
        <!-- FOOTER -->
        @component('templates.footer')
        @endcomponent
    </body>
    <script src="{{asset('js/app.js')}}" async></script>
</html>