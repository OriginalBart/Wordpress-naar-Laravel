@extends('layouts.dashboard')
@section('content')

    <div class="container mt-5 border p-3">
        <div class="row ">
            <div class="col-12">
                <a href=" {{ route('project.create') }} " class="btn btn-success btn-sm float-right"> Add More </a>
            </div>
        </div>
        <div class="row">
            <style>
                .uper {
                    margin-top: 40px;
                }
            </style>
            <div class="uper">
                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div><br />
                @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Show Name</td>
                        <td>Show Price</td>
                        <td>Show stage id</td>
                        <td>Content</td>
                        <td>Image</td>

                        <td colspan="2">Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($files as $file)
                        <tr>
                            <td>{{$file->id}}</td>
                            <td>{{$file->name}}</td>
                            <td>{{$file->price}}</td>
                            <td>{{number_format($file->stage_id,2)}}</td>
                            <td>{{$file->content}}</td>
                            <td> <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails" style="max-width: 150px;"></td>
                            <td><a href="{{ route('project.edit', $file->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form action="{{ route('project.destroy', $file->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
        </div>
    </div>
@endsection
