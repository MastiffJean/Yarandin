@extends('layouts.app')

@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Task</a></h2>
<br>
 
<form action="{{ route('tasks.update', $task_info->id) }}" method="POST" name="update_task">
{{ csrf_field() }}
@method('PATCH')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $task_info->title }}">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $task_info->description }}</textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Task status</strong>
            <select type="text" name="task_status" class="form-control" style="width: 100%" required>
              @foreach ($task_statuses as $task_status)
                @if($task_status->id == $task_info->status_id)
                    <option value="{{ $task_status->id }}" selected="selected">{{ $task_status->title }}</option>
                @else
                    <option value="{{ $task_status->id }}">{{ $task_status->title }}</option>
                @endif
              @endforeach>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</div>
</form>
@endsection