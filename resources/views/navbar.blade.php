<style>
  .bg-warning{
    display: flex;
    justify-content: center;
    align-items:center;
    font-size: 1.2em;
    color: white;
  }
  .titlehead{
    display: flex;
    justify-content: center;
    background-color: #afe9d0;
  }
  .nav{
    display: flex;
    justify-content: center;
    align-items:center;
    background-color:#fadf54;
  }
  .head{
    display: flex;
    margin-right: 30px;
    
  }
</style>

<div class = "titlehead ">
  <div class = "head">
      <h1 >Amazing E-Grocery</h1>
  </div>
  <form action="{{ route('logout')}}" method="GET" class="m-0">                  
        @csrf                   
      <button style="" type="submit" class="dropdown-item">Logout</button>                 
      </form>
</div>

<div class = "nav">
<nav class="navbar navbar-expand-lg navbar-light " style = "color:#fadf54">
  <div class="justify-content-center collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      @if (Auth::check() == false)
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
      <li class="nav-item" style="margin-left:30px">
        <a class="nav-link" href="/login">Login</a>
      </li>

      @elseif(Auth::check() && Auth::user()->role == 2)
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="margin-left:30px; margin-right:30px"href="{{route('indexcart')}}">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('index_update',Auth::user()->id)}}">Profile</a>
      </li>  

      @elseif(Auth::check() && Auth::user()->role == 1)
      <li class="nav-item">
        <a class="nav-link" href="/vegetable">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  style="margin-left:30px; margin-right:30px"href="{{route('indexcart')}}">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('index_update',Auth::user()->id)}}">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('manageuser')}}">Account Maintenance</a>
      </li>

      @endif
  </div>
  </nav>
</div>

