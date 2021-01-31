@extends('layouts.dashboard')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Update Bands
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('project.update', $files->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Edit Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $files->name }}"/>
                </div>
                <div class="form-group">
                    <label for="content">Edit content :</label>
                    <input type="text" class="form-control" style="height:100px" name="content" placeholder="content" value="{{ $files->content }}" />
                </div>
                <div class="form-group">
                    <label for="price">Edit price:</label>
                    <input type="text" class="form-control" name="price" value="{{ $files->price }}"/>
                </div>
                <div class="form-group">
                    <label for="stage">Edit Stage :</label>
                    <input type="text" class="form-control" name="stage" value="{{ number_format($files->stage_id, 2) }}"/>
                </div>

                <div class="form-group">
                    <label for="location">Edit location :</label>
                    <input type="text" class="form-control" name="location" placeholder="location"  value="{{ $files->location }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update project</button>
            </form>
        </div>
    </div>
@endsection
