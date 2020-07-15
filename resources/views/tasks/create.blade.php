@extends('layouts.app')

 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Create Task</a></h2>
<br>
 
<form action="{{ route('tasks.store') }}" method="POST" name="add_task" enctype="multipart/form-data">
{{ csrf_field() }}
 
<div class="container">
<div class="row">
    <input type="hidden" name="project_id" value="{{ $project_id }}">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>File</strong>
            <input class="form-control" type="file" name="file">
            <span class="text-danger">{{ $errors->first('file') }}</span>
        </div>
    </div>
    <div class="col-md-8">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
</form>
@endsection