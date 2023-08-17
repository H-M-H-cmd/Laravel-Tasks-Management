@extends('layouts.app')
@section('title', 'Create Project')
@section('content')

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="card" style="width: 50%;">
                <div class="card-header text-center">
                    <h1>Create New Project</h1>
                </div>
                <div class="card-body">
                    <form action="/projects/create" method="post">
                        @csrf
                        <div class="form-group">
                            @error('projectName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="projectName" value="{{old('projectName')}}"
                                class="@error('projectName') is-invalid @enderror form-control" placeholder="Enter New Project">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
