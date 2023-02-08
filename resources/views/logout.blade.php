@extends('temp')

@section('content')
@include('navbar')

<style>
    .kotak{
        /* background: gray;
        color:white; */
        margin: 0 100px;
        margin-top:20px;
        margin-bottom:20px;
    }
    .title{
        padding:10px;
        font-size: 30px;
        display:flex;
        margin: 0 100px;
        justify-content: center;
    }
    .title p{
        margin-top:20;
        margin-bottom:20;
    }
    .body{
        display:flex;
        margin: 0 100px;
        justify-content: center;
        margin-bottom: 40px;
    }
    .body2{
        display:flex;
        margin: 0 100px;
        justify-content: center;
        margin-bottom: 40px;
    }
</style>

<div class = "kotak">
        <div class = "title">
            <p>
                Logout Success
            </p>
        </div>
</div>


@endsection