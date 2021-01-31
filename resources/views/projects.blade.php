@extends('layouts.layout')

@section('nav')
@include('includes.header')
@endsection
@section('content')
<section class="base pt-4">
    <div class="container">
        <div class="row">


            @foreach($projects as $band)
            <div class="project mb-4 col-12 col-sm-6 col-md-5">
                <a class="h-100" href="projects/detail/{{$band->id}}"
                    style="background-image: url(/uploads/{{ $band->filename }})">
                    <div class="project-content-wrapper">
                        <h3>{{ $band->name }}</h3>
                        <p></p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection