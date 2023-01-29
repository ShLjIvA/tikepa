@extends('layouts.admin')

@section('title') Order @endsection

@section('content')

<div>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-6'>
                <div class="card">
                    <div class="card-header">
                        Order Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Phone number</h5>
                        <p class="card-text">{{$order->number}}</p>
                        <h5 class="card-title">Address</h5>
                        <p class="card-text">{{$order->address}}</p>
                        <h5 class="card-title">Postal Code</h5>
                        <p class="card-text">{{$order->zip}}</p>
                        <h5 class="card-title">City</h5>
                        <p class="card-text">{{$order->city}}</p>
                        <h5 class="card-title">Created At</h5>
                        <p class="card-text">{{$order->created_at}}</p>
                        <h5 class="card-title">Total</h5>
                        <p class="card-text">{{$order->total}}</p>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class="card">
                    <div class="card-header">
                        User Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">User Id</h5>
                        <p class="card-text">{{$order->user->id}}</p>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">{{$order->user->email}}</p>
                        <h5 class="card-title">First Name</h5>
                        <p class="card-text">{{$order->user->first_name}}</p>
                        <h5 class="card-title">Last Name</h5>
                        <p class="card-text">{{$order->user->last_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col'>
                <h4>Ordered Articles</h4>
            </div>
        </div>
        <div class='row'>
            <div class='col'>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                        <tr>
                        <th scope="row">{{$item->article->id}}</th>
                        <td><img width="70px" src="{{asset($item->article->image)}}" class="img-thumbnail"></td>
                        <td>{{ $item->article->brand->name }}</td>
                        <td>{{ $item->article->name }}</td>
                        <td>{{ $item->article->category->name }}</td>
                        <td>{{ $item->article->gender->gender }}</td>
                        <td>{{ $item->price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection