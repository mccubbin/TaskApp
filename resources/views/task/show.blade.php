@extends('layouts.app')

@section('content')

    <div class="offset-4 col-4">

        <h2 class="text-center mb-4">View Task</h2>

        <div class="row">
            <label class="col-3">Name</label>
            <p name="name" type="text" class="col-9">{{ $task->name }}</p>
        </div>

        <div class="row">
            <label class="col-3">Priority</label>
            <p name="priority" type="text" class="col-9">{{ $task->priority }}</p>
        </div>

    </div>

@endsection