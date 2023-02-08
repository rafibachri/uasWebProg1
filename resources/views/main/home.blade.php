@extends('temp')

@section('title', 'Home')

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
    
</style>

@section('content')
@include('navbar')


<div class = "kotak">
        <div class = "title">
            <p>
                Find and Buy Your Grocery Here
            </p>
        </div>
    </div>

@endsection