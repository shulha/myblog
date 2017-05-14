@extends('layout.main')

@section('content')

    <div class="container">
        <form method="POST" action="<?php echo route('save_user'); ?>" class="form-signin" >
            <h2 class="form-signin-heading">Registration</h2>
            <input class="form-control" type="text" name="login" placeholder="Login" />
            <input class="form-control" type="password" name="password" placeholder="Password" />
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        </form>
    </div>

@stop
