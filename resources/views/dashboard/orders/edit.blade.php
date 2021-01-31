@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('order.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First name:</strong>
                    <input type="text" name="name" value="{{ $order->first_name }}" class="form-control" placeholder="First name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last name:</strong>
                    <input type="text" name="name" value="{{ $order->last_name }}" class="form-control" placeholder="last name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address :</strong>
                    <input type="text" name="name" value="{{ $order->address }}" class="form-control" placeholder="Adress">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>location:</strong>
                    <input type="text" name="name" value="{{ $order->location }}" class="form-control" placeholder="location">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>band id:</strong>
                    <input type="text" name="band_id" class="form-control" placeholder="band">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Welke dag wilt uw reserveren?:</strong>
                    <select  name="assigned_ticket" class="form-control">
                        <option value="zaterdag">Zaterdag</option>
                        <option value="zondag">Zondag</option>
                        <option value="combi_ticket">Combi ticket</option>
                    </select>
                </div>
                <small class="font-italic ">* Combi ticket = Zaterdag en Zondag</small>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>quantity:</strong>
                    <select  name="quantity" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
