@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>

    <div>
        <p>{{ $project->content }}</p>
        <img src="{{ $project->image }}" alt=" {{ $project->title }} ">
    </div>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back</a>
@endsection
