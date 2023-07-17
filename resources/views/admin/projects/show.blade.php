@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="row my-3">
            <div class="col-12">
                <h1>{{ $project->title }}</h1>
                {{-- <h2>Categoria: {{ $project->type ? $project->type->name : 'None' }}</h2> --}}

            </div>
        </div>

        <div>
            @if ($project->image)
                <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}">
                <img src="{{ $project->image }}" alt="{{ $project->title }}">
            @else
                <img src="https://i0.wp.com/theperfectroundgolf.com/wp-content/uploads/2022/04/placeholder.png"
                    alt="{{ $project->title }}">
            @endif
        </div>
        <div class="row py-5">
            <div class="col-12">
                <h2><b>Content:</b></h2>
                <h2><em>{{ $project->content }}</em></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-6 py">
                <h3>Link: <a href="#">{{ $project->link }}</a></h3>
            </div>
            {{-- <div class="col-6 d-flex justify-content-end">
            a<b>Genre:</b> {{ $project->type }}</h3>
            </div> --}}
        </div>
        <div class="row py-5">
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">
                    <<< Back</a>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">Modify >>> </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <a href="{{ route('admin.projects.index') }}">Go back to Projects</a>
            </div>
        </div>

    </div>
@endsection
