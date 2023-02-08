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
        justify-content: center;
        
    }

    
</style>

@section('content')
    @include('navbar')
    
    
    <div class = "products ">
        <div class="items " >
        <form action="{{route('update_role',$user->id)}}" method = "post" enctype = "multipart/form-data">
        @csrf
         @foreach ($user as $userlist)
                <h5>{{$user->first}}</h5>
                <h5>{{$user->last}}</h5>
                <div class="mb-2 d-flex flex-column align-items-start">
      
        <div class="mb-2 d-flex flex-column align-items-start">
            <label for="role">Role</label>
            <select class="form-select" name="role" id="role" aria-label = "Default select example">                                 
            <option value = "{{$user->role}}">Admin</option>                            
            <option value = "{{$user->role}}">User</option> 
        </div>
        </div>
            <div class="mb-2">
            <button type="submit" class="btn btn-danger w-100" style="color:white">Save</button>
        </div>
            @endforeach
        </div>
        
        </div>
      
            </form>
   


    @endsection