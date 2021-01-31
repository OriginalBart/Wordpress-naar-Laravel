@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('order.create') }}"> Create New order</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>location</th>
            <th>Order placed</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $order->first_name }}</td>
                <td>{{ $order->last_name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->location }}</td>
                <td>{{ $order->band_id }}</td>
                <td>{{ $order->assigned_ticket }}</td>
                <td>{{ $order->quantity }}</td>
                <td> {{ date('F d, Y', strtotime($order->created_at)) }}</td>

                <td>
                    <form action="{{ route('order.destroy',$order->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('order.show',$order->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('order.edit',$order->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $orders->links() !!}

@endsection
