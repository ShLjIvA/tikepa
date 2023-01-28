@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add new Gender</button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($genders as $gender)
                    <tr>
                    <th scope="row">{{$gender->id}}</th>
                    <td>{{ $gender->gender }}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal{{$gender->id}}">Edit</button></td>
                    <td><a href="{{ route('genders.delete', ['id' => $gender->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($genders as $gender)
<div class="modal fade" id="updateModal{{$gender->id}}" tabindex="-1" aria-labelledby="modalLabel{{$gender->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel{{$gender->id}}">Update Gender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('genders.update', ['id' => $gender->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label>Gender Name</label>
                <input type="text" class="form-control" name="gender_name" placeholder="{{$gender->gender}}">
            </div>
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
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="modalLabelCreate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreate">Create Gender</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('genders.add')}}" method="post">`
            @csrf
            <div class="form-group">
                <label>Gender Name</label>
                <input type="text" class="form-control" name="gender_name" placeholder="Name of new gender here">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div style="margin: 20px">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    @php
        for($i = 1; $i <= $pagination; $i++) {
            if($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="/admin/genders?page='.$i.'">'.$i.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="/admin/genders?page='.$i.'">'.$i.'</a></li>';
            }
        }

    @endphp
  </ul>
</nav>
</div>

@endsection