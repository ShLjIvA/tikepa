@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">User</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Postal code</th>
                    <th scope="col">City</th>
                    <th scope="col">Total</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Order Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->number }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->zip }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('orders.show', ['id' => $order->id]) }}"><button type="button" class="btn btn-danger">Go!</button></a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="pagination">
{{$orders->links()}}
</div>
<div style="margin: 20px">
</nav>
</div>

@endsection