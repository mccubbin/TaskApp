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

        <h2 class="text-center mb-4">Create Task</h2>

        <form method="POST" action="/tasks">
            @csrf

            @if ( Auth::user() )
                @php $user_id = Auth::user()->id @endphp
            @endif
            <input type="hidden" name="user_id" value="{{ isset($user_id) ? $user_id : 1 }}">

            <div class="form-group row">
                <label class="col-3 col-form-label">Name</label>
                <input name="name" type="text" class="col-9 form-control">
            </div>

            <div class="form-group row">
                <label class="col-3 col-form-label">Priority</label>
                <input name="priority" type="text" class="col-9 form-control">
            </div>

            <div class="form-group row">
                <button type="submit" class="offset-3 col-3 btn btn-primary">Create Task</button>
            </div>

        </form>

    </div>

@endsection