@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add new Link</button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                    <tr>
                    <th scope="row">{{$link->id}}</th>
                    <td>{{ $link->title }}</td>
                    <td>{{ $link->name }}</td>
                    <td>{{ $link->admin }}</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModal{{$link->id}}">Edit</button></td>
                    <td><a href="{{ route('links.delete', ['id' => $link->id]) }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@foreach ($links as $link)
<div class="modal fade" id="updateModal{{$link->id}}" tabindex="-1" aria-labelledby="modalLabel{{$link->id}}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel{{$link->id}}">Update Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('links.update', ['id' => $link->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label>Link Title</label>
                <input type="text" class="form-control" name="title" placeholder="{{$link->title}}">
            </div>
            <div class="form-group">
                <label>Link Name</label>
                <input type="text" class="form-control" name="link_name" placeholder="{{$link->name}}">
            </div>
            <div class="form-group">
                <label>Admin</label>
                <input type="number" min="0" max="1" class="form-control" name="admin" placeholder="{{$link->admin}}">
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
        <h5 class="modal-title" id="modalLabelCreate">Create Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('links.add')}}" method="post">`
            @csrf
            <div class="form-group">
                <label>Link Title</label>
                <input type="text" class="form-control" name="title" placeholder="Link title here">
            </div>
            <div class="form-group">
                <label>Link Name</label>
                <input type="text" class="form-control" name="link_name" placeholder="Link name here">
            </div>
            <div class="form-group">
                <label>Admin</label>
                <input type="number" min="0" max="1" value=0 class="form-control" name="admin" placeholder="{{$link->admin}}">
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
                echo '<li class="page-item active"><a class="page-link" href="/admin/links?page='.$i.'">'.$i.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="/admin/links?page='.$i.'">'.$i.'</a></li>';
            }
        }

    @endphp
  </ul>
</nav>
</div>

@endsection