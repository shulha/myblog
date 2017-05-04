@extends('layout')

@section('content')

<div class="uk-width-1-1 uk-flex-center uk-flex uk-text-center">
    <form method="POST" action="<?php echo route('save_user'); ?>">
        <legend class="uk-legend">Registration</legend>
        <div class="uk-margin">
            <input class="uk-input" type="text" name="login" placeholder="Login" />
        </div>
        <div class="uk-margin">
            <input class="uk-input" type="password" name="password" placeholder="Password" />
        </div>
        <div class="uk-margin">
            <button type="submit" class="uk-button uk-button-primary">Submit</button>
        </div>
    </form>
</div>

@stop
