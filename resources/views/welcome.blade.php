@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <div class="d-flex justify-content-between mb-5">
                    <h2 class="h2 m-0 text-uppercase">Liste des articles </h2>
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Ajouter un article</a>
                </div>
                <table class="display" style="width:100%" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    <a href="{{ route('tasks.show', $task) }}" class="btn btn-secondary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <a href="" onclick="event.preventDefault();supprime('{{$task->id}}')" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-none" id="submit{{$task->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection