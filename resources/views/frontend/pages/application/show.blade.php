@extends('frontend.layouts.app')

@section('content')
   <div class="container mt-5">
     <div class="table-responsive">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">имя</th>
      <th scope="col">Эл. адрес</th>
      <th scope="col">статус</th>
      <th scope="col">резюме</th>
      <th scope="col">Комментарии</th>
      <th scope="col">обновлено в</th>
      <th scope="col">Обновить</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($applications as $application)
    <tr>
      <td>{{ $application->name }}</td>
      <td>{{ $application->email }}</td>
      <td>{{ $application->status}}</td>
      <td><a href="{{ route('download.resume', $application->id)}}" class="btn btn-primary" role="button" aria-pressed="true">скачать резюме</a></td>
      <td>{{ $application->comments}}</td>
      <td>{{ $application->updated_at->diffForHumans()}}</td>
      <td><a type="button" href="{{ route('application.edit', $application->id)}}" class="btn btn-outline-secondary">редактировать</a></td>
    </tr>
      @endforeach
  </tbody>
</table>
     </div>
   </div>
@endsection