@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>All Projects</h1>
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
                        @if (isset($projects))
                            @forelse ($projects as $project)
                                <li class="list-group-item text-muted">
                                    {{ $project->name }}
                                    <span class="float-right">
                                        <a href="/projects/{{ $project->id }}/delete" style="color: #dc3545;"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </span>
                                </li>
                            @empty
                                <p class="text-center">No Projects</p>
                            @endforelse
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
