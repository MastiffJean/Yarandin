@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Dashboard</h1>
  <a href="{{ route('projects.create') }}" class="btn btn-success mb-2">Add project</a> 
  <br>
  <br>
  <div class="row justify-content-center">
    @foreach($projects as $project)
    <div class="col-md-6" style="margin-bottom: 15px">
      <div class="card">
        <div class="card-header"><a href="{{ route('projects.show',$project->id)}}">{{ $project->title }}</a></div>

        <div class="card-body">
          <div>
            {{ $project->description }}
          </div>
          <div style="display: flex; justify-content: space-between;">
            <div style="align-self: flex-end;">
              {{ date('Y-m-d', strtotime($project->created_at)) }}
            </div>
            <div>
              <div style="display: inline-flex; float: right;">
                <a href="{{ route('projects.edit',$project->id)}}" class="btn btn-primary" style="margin-right: 5px">Edit</a>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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
    {!! $projects->links() !!}
  </div>
</div>
@endsection  