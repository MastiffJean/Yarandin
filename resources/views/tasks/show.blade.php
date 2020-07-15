@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $task->title }}</h1>
  @if($task->file != '')
  <div style="display: flex; justify-content: space-between;">
    <div style="align-self: flex-end;">
        <h4>{{ $task->file }}</h2>
        </div>
        <div style="display: inline-flex; float: right;">
            <a class="btn btn-success" href="/download/{{$task->file}}">Download</a> 
        </div>
    </div>
    @endif
    <br>
    <hr>
    <h3>
        {{ $task->description }}
    </h3>
    <br>
    <hr>
    <h4>
        {{ date('Y-m-d', strtotime($task->created_at)) }}
    </h4>
</div>
</div>
@endsection
