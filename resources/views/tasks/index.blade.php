@extends('layouts.app')

@section('content')
<div class="container">
    
    @include('partials.messages.confirmMessage')

    <a href="{{ route('tasks.create') }}" class="btn btn-success float-right mb-4">Agregar tarea</a>
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
                       
                        <a class="btn btn-primary form-control" href="{{ route('tasks.edit', $task->id)}}">Editar</a>

                        <form id="form{{ $task->id }}"
                            action="{{ route('tasks.destroy',$task->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger eliminar form-control" data-id="{{ $task->id }}" data-toggle="modal"
                                data-target="#deleteTaskModal" onclick="event.preventDefault();">
                                Eliminar
                            </button>

                        </form>

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

@include('partials.modals.deleteTaskModal')
@endsection
