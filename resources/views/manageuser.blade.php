@extends('temp')

@section('content')
    @include('navbar')

  <div class="d-flex">
    <table id = "data" class="table table-bordered" style="width:75% ;margin-left:10%; margin-top:50px">
        <thead>
            <tr>
             
                <th scope="col">Account Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $idx=1?>
        @foreach ($userdetail as $user)
            <tr>
                <td>Account {{$idx}} - Role {{$user->role}}</td>
                <td>
                    <div class = "action">
                        <div class="m-1">
                            <a href="{{route('index_update_role',$user->id)}}">Update Role</a>
                        </div>
                        <div class="m-1">
                            <a href="{{route('delete',$user->id)}}">Delete</a>
                        </div>
                    </div>
                </td>
                <?php{{$idx++}}?>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection