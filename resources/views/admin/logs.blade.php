@extends('layouts.admin')

@section('title') Admin Panel @endsection

@section('content')
<div style="margin: 20px">
<form>
    <label for="birthdaytime">Start (date and time):</label>
    <input type="datetime-local" id="start_date" name="start_date">
    <label for="birthdaytime">End (date and time):</label>
    <input type="datetime-local" id="end_date" name="end_date">
    <button type="submit" class="btn btn-primary">Search</button>

</form>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">User</th>
                    <th scope="col">Action</th>
                    <th scope="col">URI</th>
                    <th scope="col">Timestamp<th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                    <tr>
                    <td>{{ $log->email }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->uri }}</td>
                    <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="pagination">
{{$logs->links()}}
</div>
<div style="margin: 20px">
</nav>
</div>

@endsection