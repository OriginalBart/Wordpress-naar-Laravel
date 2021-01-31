@extends('layouts.dashboard')
@section('content')
    <div class="container mt-5">
        {{--        image--}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="name"/>
            </div>
            <div class="form-group">
                <label for="content">Show content :</label>
                <textarea  type="text" class="form-control" style="height:100px" name="content" placeholder="content"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Show price :</label>
                <input type="number" class="form-control" name="price" placeholder="price"/>
            </div>
            <div class="form-group">
                <label for="stage_id">Choise stage :</label>
                <input  type="number" class="form-control " name="stage_id" ></input>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="stage_id">Choise stage :</label>--}}
{{--                <select class="form-control livesearch" name="stage_id" ></select>--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="location">Show location :</label>
                <input type="text" class="form-control" name="location" placeholder="location"/>
            </div>

            <div class="form-group">
                <div class="card shadow">


                    <div class="card-body">



                        <div class="form-group" {{ $errors->has('filename') ? 'has-error' : '' }}>
                            <label for="filename"></label>
                            <input type="file" name="filename" id="filename" class="form-control">
                            <span class="text-danger"> {{ $errors->first('filename') }}</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-md"> Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
