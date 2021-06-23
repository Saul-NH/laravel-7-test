@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('tasks.create')}}" class="btn btn-success float-right mb-4">Agregar tarea</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td><img src="storage/{{ $task->image }}" alt="image" width="20%"></td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center"> No Tasks</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
