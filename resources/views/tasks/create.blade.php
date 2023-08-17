@extends('layouts.app')
@section('title', 'Create Task')
@section('content')

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>Create New Task</h1>
                </div>
                <div class="card-body">
                    <form action="/tasks/create" method="post">
                        @csrf
                        <div class="form-group">
                            @error('taskName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="taskName" value="{{old('taskName')}}"
                                class="@error('taskName') is-invalid @enderror form-control" placeholder="Enter New Task">
                        </div>
                        <div class="form-group">
                            <label for="projectId">Project:</label>
                            <select name="projectId" class="form-control @error('project') is-invalid @enderror"
                                id="projectId">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
