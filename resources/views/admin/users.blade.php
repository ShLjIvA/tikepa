@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">admin</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->admin }}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal{{$user->id}}">Edit</button></td>
                    <td><a href="{{route('users.delete', ['id' => $user->id])}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach ($users as $user)
<div class="modal fade" id="updateModal{{$user->id}}" tabindex="-1" aria-labelledby="modalLabel{{$user->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel{{$user->id}}">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.update', ['id' => $user->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input value="{{ $user->email}}" type="email" class="form-control" name="email" placeholder="{{$user->email}}">
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" value="{{ $user->first_name}}" class="form-control" name="first_name" placeholder="{{$user->first_name}}">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" value="{{ $user->last_name}}" class="form-control" name="last_name" placeholder="{{$user->last_name}}">
            </div>
            <select id="admin" name="admin" class="form-control">
                <option value="0" @if($user->admin == 0) selected @endif>Customer</option>
                <option value="1" @if($user->admin == 1) selected @endif>Admin</option>
            </select>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<div style="margin: 20px">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    @php
        for($i = 1; $i <= $pagination; $i++) {
            if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="/admin/users?page='.$i.'">'.$i.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="/admin/users?page='.$i.'">'.$i.'</a></li>';
            }
        }

    @endphp
  </ul>
</nav>
</div>

@endsection