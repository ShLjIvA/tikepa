@extends('layouts.admin')

@section('title') Article @endsection

@section('content')
<div>
    <form action="{{route('articles.update', ['id' => $article->id])}}" method="post" enctype="multipart/form-data" style="border: 1px solid black">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div style="margin: 20px">
                        <div class="form-group">
                            <h3>Article Name</label>
                            <input type="text" class="form-control" name="name" value="{{$article->name}}">
                        </div>
                        <div class="form-group">
                            <h3>Description</label>
                            <input type="text" class="form-control" name="description" value="{{$article->description}}">
                        </div>
                        <div class="form-group">
                            <h3>Image</h3>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{asset($article->image)}}" class="img-thumbnail" style="max-width: 300px">
                                    </div>
                                    <div class="col-md-6">
                                        <input type='file' name='image'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="margin: 20px">
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <h4>Select Brand</h3>
                                        <select value="{{$article->brand_id}}" id="brands" name="brand" class="form-control">
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <h4>Select Category</h3>
                                        <select value="{{$article->category_id}}" id="categories" name="category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <h4>Select Gender</h3>
                                        <select value="{{$article->gender_id}}" id="genders" name="gender" class="form-control">
                                            @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{ $gender->gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <h4>Price</h3>
                                        <input value="{{ $article->price }}" type="number" class="form-control" name="price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <h4>Sale Price</h3>
                                        <input value="{{ $article->sale_price }}" type="number" class="form-control" name="sale_price">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 20px"><button type="submit" class="btn btn-primary">Update</button></div>
        </div>
    </form>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h3>Images</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Add Image</h3>
            <form>
                <input type="file" name="image">
                <button type="submit" class="btn btn-primary">Add Image</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Url</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article->gallery as $image)
                    <tr>
                    <th scope="row">{{$image->id}}</th>
                    <td><img width="70px" src="{{asset($image->url)}}" class="img-thumbnail"></td>
                    <td>{{ $image->url }}</td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <h3>Sizes</h3>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Url</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article->gallery as $image)
                    <tr>
                    <th scope="row">{{$image->id}}</th>
                    <td><img width="70px" src="{{asset($image->url)}}" class="img-thumbnail"></td>
                    <td>{{ $image->url }}</td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection