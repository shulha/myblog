<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple e-shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" >
    <link rel="stylesheet" href="/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/salvattore.min.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/functions.js"></script>
</head>
<body>

@include('partials.navbar')

<div class="container">
    @yield('content')
{{--    @include('catalog')--}}
</div>

@include('partials.modal')

@include('partials.footer')

</body>

</html>