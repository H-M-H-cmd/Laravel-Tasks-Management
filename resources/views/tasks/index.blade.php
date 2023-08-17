@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>All Tasks</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @if (session()->has('primary'))
                            <div class="alert alert-primary">
                                {{ session()->get('primary') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning">
                                {{ session()->get('warning') }}
                            </div>
                        @endif
                        @if (session()->has('danger'))
                            <div class="alert alert-danger">
                                {{ session()->get('danger') }}
                            </div>
                        @endif
                        <form action="/tasks/filter" method="POST">
                            @csrf
                            <div class="form-group">
                                <select name="projectId" class="form-control @error('project') is-invalid @enderror"
                                    id="projectId">
                                    @foreach ($projects as $project)
                                        <option 
                                        @if (isset($selected))
                                        {{ $selected == $project->id ? 'selected' : ''}} 
                                        @endif    
                                        value="{{ $project->id }}">
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success btn-sm mt-2">Filter by project</button>
                                @error('project')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                        <hr>
                        @forelse ($tasks as $task)
                            <li class="list-group-item text-muted">
                                {{ $task->name }}
                                <span class="float-right">
                                    <a href="/tasks/{{ $task->id }}/delete" style="color: #dc3545;"><i
                                            class="fa-solid fa-trash"></i></a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/tasks/{{ $task->id }}/edit" style="color: #28a745;"><i
                                            class="fa-solid fa-pen"></i></a>
                                </span>
                            </li>
                        @empty
                            <p class="text-center">No Tasks</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
