@extends('layouts.app')
@section('title', 'Edit Task')
@section('content')

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>Edit Task</h1>
                </div>
                <div class="card-body">
                    <form action="/tasks/{{$task->id}}" method="post">
                        @csrf
                        <div class="form-group">
                            @error('taskName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="taskName" value="{{ $task->name }}"
                                class="@error('taskName') is-invalid @enderror form-control" placeholder="Update Task">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
