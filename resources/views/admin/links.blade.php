@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<button type="button" class="btn btn-primary">Add new Gender</button>
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
                    <td><button type="button" class="btn btn-success">Edit</button></td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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