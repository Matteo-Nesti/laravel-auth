@extends('layouts.app')

@section('content')
    <div class="row mt-3">
        <div class="col-3">
            <img src="{{ $project->image }}" alt=" {{ $project->title }} " class="img-fluid">
        </div>
        <div class="col">
            <h1 class="text-center">{{ $project->title }}</h1>
            <p>{{ $project->content }}</p>
        </div>
    </div>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
