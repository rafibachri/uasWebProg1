@extends('temp')


<style>
  
    .products{
        display:flex;
        padding: 10px;
        margin: 0 100px;
        margin-top: 40px;
        justify-content:center;
    }
</style>

@section('content')
    @include('navbar')
    
    <div class = "products">
        <img src= "/storage/image/{{$vegetabledetail->image}}" style="width: 350px" alt="...">
        <div class="card" style="width: 350px">
            <div class="card-body">
            <h5 class="card-title">{{ $vegetabledetail->name }}</h5>
            <p class="card-text"><?php $num = $vegetabledetail->price; $formatted_num = 'Rp. '.number_format($num,0,',',',');?>
                {{$formatted_num}}</p>
            <p class="card-text">{{$vegetabledetail->description }}</p>
            </div>
            @if(Auth::check() && Auth::user()->role == 1)
            <form action="{{route('addcart',$vegetabledetail->id)}}" method = "post">
                @csrf
                <button class = "alert alert-success" style = "margin: 10px; text-align: center; align-items: center">
                    Buy
                </button>
            </form>
            @elseif (Auth::check() && Auth::user()->role == 2)
            <form action="{{route('addcart',$vegetabledetail->id)}}" method = "post">
                @csrf
                <button class = "alert alert-success" style = "margin: 10px; text-align: center; align-items: center">
                    Buy
                </button>
            </form>
            @elseif (Auth::check() == false)
            <form action="{{route('addcart',$vegetabledetail->id)}}" method = "post">
                @csrf
                <button class = "alert alert-success" style = "margin: 10px; text-align: center; align-items: center">
                    Buy
                </button>
            </form>
            @endif
        </div>
    </div>
@endsection