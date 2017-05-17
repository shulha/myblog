<!DOCTYPE html>
<html>
<head>
    <meta charaset="utf-8"/>
    <title>Админка</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" >
    <link rel="stylesheet" href="/css/admin.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/salvattore.min.js"></script>
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/admin.js"></script>
    <script src="/js/functions.js"></script>
</head>
<body>
    <div id="header">
        <h1><a href="{{route('admin')}}">Админка</a></h1>
    </div>
    <div id="content">
        @yield('content')
    </div>
</body>
</html>