@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add new Article</button>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td><img width="70px" src="{{asset($article->image)}}" class="img-thumbnail"></td>
                    <td>{{ $article->brandName }}</td>
                    <td>{{ $article->name }}</td>
                    <td>{{ $article->categoryName }}</td>
                    <td>{{ $article->gender }}</td>
                    <td>{{ $article->price }}</td>
                    <td><button type="button" class="btn btn-success">Edit</button></td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="modalLabelCreate" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreate">Create Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('articles.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Article Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name of new article here">
            </div>
            <div class="form-group">
                <label>Select Brand</label>
                <select id="brands" name="brand" class="form-control">
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div>
                <label>Select Category</label>
                </div>
                <div>
                <select id="categories" name="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label>Select Gender</label>
                <select id="genders" name="gender" class="form-control">
                    @foreach($genders as $gender)
                    <option value="{{$gender->id}}">{{ $gender->gender }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description"> 
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="image"> 
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price"> 
            </div>
            <div class="form-group">
                <label>Sale Price</label>
                <input type="number" class="form-control" name="sale_price"> 
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
                echo '<li class="page-item active"><a class="page-link" href="/admin/articles?page='.$i.'">'.$i.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="/admin/articles?page='.$i.'">'.$i.'</a></li>';
            }
        }

    @endphp
  </ul>
</nav>
</div>

@endsection