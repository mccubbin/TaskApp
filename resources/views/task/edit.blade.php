@extends('layouts.app')

@section('content')

    <div class="offset-3 col-6">

        @if ($errors->any())
            <ul class="alert-success">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <h2 class="text-center mb-4">Edit Task</h2>

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PATCH')
            <input type="hidden" name="user_id" value="{{ $task->user->id }}">

            <div class="form-group row">
                <label class="col-3 col-form-label">Name</label>
                <input name="name" type="text" class="col-9 form-control" value="{{ $task->name }}">
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label">Priority</label>
                <input name="priority" type="text" class="col-9 form-control" value="{{ $task->priority }}">
            </div>

            <div class="form-group row">
                <button type="submit" class="offset-3 col-2 btn btn-primary">Edit Task</button>
            </div>

        </form>

    </div>

@endsection