@extends('layouts.app')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>


    <p>{{ $project->content }}</p>
    <img src="{{ $project->image }}" alt=" {{ $project->title }} ">
@endsection
