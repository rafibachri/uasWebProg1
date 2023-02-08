@extends('temp')



@section('content')
    @include('navbar')

<style>
  .edit{
        display:flex;
        padding: 10px;
        margin: 0 100px;
        margin-top: 40px;
        justify-content:center;
    }
  </style>

<div class = "edit">
  <div class="container" style="width:400px; flex-direction:row">
  <div class="card" style="width: 400px; margin-top:50px">
  <div class="card-body">
  <form action="{{route('update',$user->id)}}" method = "post" enctype = "multipart/form-data">
    @csrf
    <img src= "/storage/image/{{$user->display_picture}}" class="card-img-top"alt="...">

     <div class="mb-2 d-flex flex-column align-items-start">
        <label for="first" class="form-label">First Name</label>
        <input type="text" name="first" class="form-control" id="first" value="{{$user->first}}">
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="last" class="form-label">Last Name</label>
        <input type="text" name="last" class="form-control" id="last" value="{{$user->last}}">
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name= "email" class="form-control" id="email" value="{{$user->email}}">
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
      
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="role">Role</label>
          <select class="form-select" name="role" id="role" aria-label = "Default select example">                                 
          <option value = "{{$user->role}}">Admin</option>                            
          <option value = "{{$user->role}}">User</option> 
      </div>
    </div>

    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="gender">Gender</label>
      <div class="form-check">                                 
        <input class="form-check-input" type="radio" name="gender" id="male" value="{{$user->gender}}">                                 
        <label class="form-check-label" for="male">                                     
          Male                                
        </label>                             
      </div>
      <div class="form-check">                                 
        <input class="form-check-input" type="radio" name="gender" id="female" value="{{$user->gender}}">                                 
        <label class="form-check-label" for="female">                                     
          Female                                
        </label>                             
      </div>
    </div>
    <div class="form-group">
      <label for="image" >Display Picture</label>
      <input type ="file" class = "form-control-file" id="image" name="image" >
    </div>
    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password"class="form-control" id="password" value="{{$user->password}}">
    </div>
    <div class="mb-2 d-flex flex-column align-items-start">
      <label for="confirm" class="form-label">Repeat your Password</label>
      <input type="password" name="confirm" class="form-control" id="confirm" >
    </div>
    <div class="mb-2">
      <button type="submit" class="btn btn-danger w-100" style="color:white">Save</button>
    </div>
    </form>
    
  </div>
</div>
</div>
   </div>
 

 @endsection