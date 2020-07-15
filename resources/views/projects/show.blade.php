@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $project->title }}</h1>
  <h2>{{ $project->description }}</h2>
  <a href="{{ url('taskcreate',$project->id)}}" class="btn btn-success mb-2">Add Task</a> 
  <br>
  <br>
  <div class="row">
    
    @if(count($tasks_new) != 0)
    <div class="col-12">
      <h2><a href="{{$project->id}}/new">New tasks</a></h2>
    </div>
    @foreach($tasks_new as $task)
    
    <div class="col-md-6" style="margin-bottom: 15px">
      <div class="card">
        <div class="card-header"><a href="../tasks/{{$task->id}}">{{ $task->title }}</a></div>

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
   @endif
   
   @if(count($tasks_in_progress) != 0)
   <div class="col-12">
    <h2><a href="{{$project->id}}/in_progress">In progress</a></h2>
  </div>
  @foreach($tasks_in_progress as $task)
  
  <div class="col-md-6" style="margin-bottom: 15px">
    <div class="card">
      <div class="card-header"><a href="../tasks/{{$task->id}}">{{ $task->title }}</a></div>

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
 @endif
 
 @if(count($tasks_done) != 0)
 <div class="col-12">
  <h2><a href="{{$project->id}}/done">Completed</a></h2>
</div>
@foreach($tasks_done as $task)

<div class="col-md-6" style="margin-bottom: 15px">
  <div class="card">
    <div class="card-header"><a href="../tasks/{{$task->id}}">{{ $task->title }}</a></div>

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
@endif

</div>
</div>
@endsection


