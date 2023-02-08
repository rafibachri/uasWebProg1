@extends('temp')

@section('title', 'Login Page')

@section('content')
@include('navbar')
<style>
  .on{
    color:red;
  }

  .bg{
        display:flex;
        padding: 10px;
        margin: 0 100px;
        margin-top: 40px;
        justify-content:center;
    }
  </style>
<div class="bg" style="">
<div class = "loginpage" >
  <form action="{{route('login')}}" method = "post">
    @csrf
      <div class="mb-2" style="display:flex; flex-direction:row;">
        <h3 class="h3">Login</h3>
        
      </div>
     
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="email"
        @if(Cookie::has('CookieEmail')) value = "{{Cookie::get('CookieEmail')}}" @endif>
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password"class="form-control" id="password"
        @if(Cookie::has('CookiePassword')) value = "{{Cookie::get('CookiePassword')}}" @endif>
      </div>
     
      <div class="mb-2">
        <button type="submit" class="btn btn-danger w-100" style="color:white"href="/vegetable">Submit</button>
      </div>
    </form>
    <hr>
    <p class="">Don't Have an Account Yet ? Click <a class="link-blue" href="/register">Here</a> to Register.</p>
  </div>
</div>
</div>
</div>
  </div>

 

@endsection
