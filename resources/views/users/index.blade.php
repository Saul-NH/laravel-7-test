@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">e-mail</th>
                <th scope="col">Tasks</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->tasks_count }} </td>
                </tr>
            @empty
                <tr>
                    <th> No users</th>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection
