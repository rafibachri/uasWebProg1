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
                Success
            </p>
        </div>
</div>

    <div class = "body">
        <h5> We will contact you 1 x 24 hours</h5>
    </div>
    <div class = "body2">
        <a class="link-blue" href="/vegetable"> We will contact you 1 x 24 hours</a>
    </div>


@endsection