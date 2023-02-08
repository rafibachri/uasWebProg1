@extends('temp')

@section('title', 'Amazing E-Grocery')

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
        
    }
    .title p{
        margin-bottom:0;
    }
    .products{
        display:flex;
        padding: 10px;
        margin: 0 100px;
        justify-content: center;
        
    }
    .img{
        width:100px;
    }

    .items{
        display: flex;
        flex-direction:row;
        padding:20px;
        text-align: center;
        justify-content: space-around;
        border: 3px solid #000000;
    }
    
</style>

@section('content')
    @include('navbar')
    
    
    <div class = "products ">
        <div class="items " >
            <?php $num=0?>
        @foreach ($itemlist as $vegetable)
            <div style="width: 100px;">
                <img src= "/storage/image/{{$vegetable->image}}" class= "img" alt="...">
            <div >
                <h5>{{ $vegetable->name }}</h5>
               
                <a href="/vegetabledetail/{{$vegetable->id}}"  style = "text-align: center;">
                Detail
                </a>
            </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection