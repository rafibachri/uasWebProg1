@extends('temp')



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
        flex-direction: column;
        justify-content:center;
        align-items: center;
    }
    .total{
        display:flex;
        padding: 10px;
        margin: 0 100px;
        flex-direction: row;
    }
    .card {
        display:flex;
        flex-direction: row;
    }
    .card img {
        width: 150px;
    }
    
</style>

@section('content')
@include('navbar')
<div class = "kotak">
    <div class = "title">
        <p>
            Cart
        </p>
    </div>
</div>

<div class = "products">
    <?php $total=0; $num=0; $qty=0?>
    @foreach (session('cartproduct'.Auth::user()->id) as $id => $vegetable)
    <div class="d-flex flex-column align-items-center">
            <?php $total+= ($vegetable['price'] )?>
            <div class="card mb-3 bg-white w-100" style="max-width:1000px">
                <div class="row p-3">
                    <div class="col-4">
                        <div class="d-flex align-items-center h-100">
                            <img src= "/storage/image/{{$vegetable['image']}}" class="card-img-left"alt="...">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h4 class="card-text">{{$vegetable['name']}}</h4>
                            <p class="card-text">
                                <?php $num = $vegetable['price']; $formatted_num = 'Rp. '.number_format($num,0,',',',');?>
                                {{$formatted_num}}
                            </p>
                            <p class="card-text">{{ $vegetable['description']}}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <div class="m-1">
                                <a href="{{route('remove',$id)}}" class="btn btn-danger" >Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-between">
        <div class="">
            
            <h5>Total Price: <?php $formatted_num = 'Rp'.number_format($total,0,'.',',');?>
            {{$formatted_num}}</h5>
        </div>
        <div class="">
            <form action="{{route('success')}}" method="GET">
                @csrf
                <button type="submit" class="btn btn-info text-white fs-5">Checkout</button>
            </form>
        </div>
    </div>
</div>
 @endsection