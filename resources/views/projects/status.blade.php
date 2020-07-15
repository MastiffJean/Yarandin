@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $status->title }}: {{ $project->title }}</h1>
  <h2>{{ $project->description }}</h2>
  <a href="{{ url('taskcreate',$project->id)}}" class="btn btn-success mb-2">Add Task</a> 
  <br>
  <br>
  <div class="row justify-content-center">
    @foreach($tasks as $task)
    <div class="col-md-6" style="margin-bottom: 15px">
      <div class="card">
        <div class="card-header"><a href="../../tasks/{{$task->id}}">{{ $task->title }}</a></div>

        <div class="card-body">
          <div>
            {{ $task->description }}
          </div>
          <div style="display: flex; justify-content: space-between;">
            <div style="align-self: flex-end;">
              {{ date('Y-m-d', strtotime($task->created_at)) }}
            </div>
            <div>
              <div style="display: inline-flex; float: right;">
                <a href="{{ route('tasks.edit',$task->id)}}" class="btn btn-primary" style="margin-right: 5px">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
                 {{ csrf_field() }}
                 @method('DELETE')
                 <button class="btn btn-danger" type="submit">Delete</button>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   @endforeach
 </div>
 <div class="row justify-content-center">
  {!! $tasks->links() !!}
</div>
</div>
@endsection
