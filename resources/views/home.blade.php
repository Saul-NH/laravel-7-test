@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        @foreach($tasks as $task)
            <div class="card" style="width: 18rem;">
                <img src="storage/{{ $task->image }}" class="card-img-top img-fluid" width="70%" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <a href="#" class="btn btn-primary addToCar" data-task="{{ $task }}">Add to shopping car</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('partials.modals.carDetailModal')
@endsection
