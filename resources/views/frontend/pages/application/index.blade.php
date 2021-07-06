@extends('frontend.layouts.app')

@section('content')
   <div class="container mt-5">
     <div class="table-responsive">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Место работы</th>
      <th scope="col">название школы</th>
      <th scope="col">статус</th>
      <th scope="col">Комментарии</th>
      <th scope="col">обновлено в</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($applications as $application)
    <tr>
      <td>{{ $application->job_title}}</td>
      <td>{{ $application->school_name }}</td>
      <td>{{ $application->status}}</td>
      <td>{{ $application->comments}}</td>
      <td>{{ $application->updated_at->diffForHumans()}}</td>
    </tr>
      @endforeach
  </tbody>
</table>
     </div>
   </div>
@endsection