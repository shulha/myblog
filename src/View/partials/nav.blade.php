<?php
use \Shulha\Framework\Security\Security;
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">E-shop</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{route('catalog')}}">Catalog</a></li>
                <li><a href="{{route('admin')}}">Admin</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Security::checkAuth())
                    <li><a href="/user" class="glyphicon glyphicon-user"><?php echo Security::getUser()->login; ?></a></li>
                    <li><a href="/basket" class=" navbar-link navbar-right ">
                        <span class="glyphicon glyphicon-shopping-cart basket" ></span>
                        <span class="badge pull-right count_order">0</span></a>
                    </li>
                @else
                    <li><a href="<?php echo route('registration'); ?>">Registration</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>