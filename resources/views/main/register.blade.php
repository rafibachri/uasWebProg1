@extends('temp')

@section('title', 'Register Page')

@section('content')
@include('navbar')
<style>
.h3{
  color:black;
}
.on{
  color:red;
}
.bg{
  display: flex;
  justify-content:center;
}

</style>

<div class="bg" style="">
  <div class = "loginpage" >
      <form action="{{route('register')}}" method = "post" enctype = "multipart/form-data">
      @csrf
      <div class="mb-2">
        <h3 class="h3">Register </h3>
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first" class="form-control" id="first" >
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last" class="form-control" id="last" >
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name= "email" class="form-control" id="email" >
      </div>
      
      <div class="mb-2 d-flex flex-column align-items-start">
      
        <div class="mb-2 d-flex flex-column align-items-start">
          <label for="role">Role</label>
            <select class="form-select" name="role" id="role" aria-label = "Default select example">                                 
            <option value = "1">Admin</option>                            
            <option value = "2">User</option> 
        </div>
      </div>

      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="gender">Gender</label>
        <div class="form-check">                                 
          <input class="form-check-input" type="radio" name="gender" id="male" value="1">                                 
          <label class="form-check-label" for="male">                                     
            Male                                
          </label>                             
        </div>
        <div class="form-check">                                 
          <input class="form-check-input" type="radio" name="gender" id="female" value="2">                                 
          <label class="form-check-label" for="female">                                     
            Female                                
          </label>                             
        </div>
      </div>
      <div class="form-group">
        <label for="image" >Display Picture</label>
        <input type ="file" class = "form-control-file" id="image" name="image">
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password"class="form-control" id="password" >
      </div>
      <div class="mb-2 d-flex flex-column align-items-start">
        <label for="confirm" class="form-label">Repeat your Password</label>
        <input type="password" name="confirm" class="form-control" id="confirm" >
      </div>
      <div class="mb-2">
        <button type="submit" class="btn btn-danger w-100" style="color:white">Submit</button>
      </div>
    </form>
    <hr>
    <p class="">Already have an account ? Click <a class="link-blue" href="/login">Here</a> to Login.</p>
    </div>
    </div>
  </div>
</div>
</div>
@endsection
