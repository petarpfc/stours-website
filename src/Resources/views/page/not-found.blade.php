@extends('site::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-md-offset-2" style=" text-align: center;">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div style="margin-top: 50px;">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div style="margin-top: 100px; margin-bottom: 50px;">
                    <a href="<?php echo url('/');?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a href="<?php echo url('/');?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection