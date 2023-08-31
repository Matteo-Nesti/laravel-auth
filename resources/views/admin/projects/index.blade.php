@extends('layouts.app')

@section('title', 'MyProjects')
@section('cdns')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')

    <h1 class="text-center">Projects</h1>



    <table class="table table-dark table-striped ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project-Title</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @forelse ($projects as $project)
            <tbody>
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="" class="btn btn-warning">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>

            @empty

                <div>
                    <p>don't find anything</p>
                </div>
        @endforelse

    </table>
    <a href="{{ route('admin.home') }}" class="btn btn-secondary">Back</a>



@endsection
