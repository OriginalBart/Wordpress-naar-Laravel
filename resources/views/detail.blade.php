@extends('layouts.layout')

@section('nav')
    @include('includes.header')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12"><a href="/">Ga terug</a></div>

            <div class="col-12">
                <img src="/uploads/{{ $bands->filename }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h5>{{ $bands->name }}</h5>
            </div>
            <div class="col-6">
                <p>{{ $bands->content }}</p>
                <p>{{ $bands->location }}</p>
                <b>{{ $bands->price }}</b>

            </div>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <button class="btn btn-secondary ">Buy now</button>

            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <form action="/add/cart" method="POST">
                    @csrf


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>First name:</strong>
                                <input type="text" name="first_name" class="form-control" placeholder="first name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>last name:</strong>
                                <input type="text" name="last_name" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Adress:</strong>
                                <input type="text" name="address" class="form-control" placeholder="address">
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
                        <input type="hidden" name="band_id" value="{{$bands->id}}">
                        <input type="hidden" name="location" value="{{$bands->location}}">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


    </div>
@endsection
