@extends('frontend.layouts.app')

@section('content')

<div class="section-full content-inner">
    <div class="container">
        <a type="button" class="btn btn-primary mb-2" href="{{ route('program.create') }}">Добавить</a>
        <h5 class="font-weight-bold">наши программы</h5>
        <div class="row">
            @foreach($programs as $program)
                <div class="col-md-4">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "><img src="{{ asset($program->image) }}" alt="">
                        </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title">{{ $program->name }}</h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul class="job-info mb-2">
                                    <li> <i class="ti-shield text-black m-r5"></i>{{ $program->level }} </li>
                                    <li><i class="ti-credit-card text-black m-r5"></i>{{ $program->price }} </li>
                                    <li><i class="ti-user text-black m-r5"></i>{{ $program->category }}</li>
                                </ul>
                               <div class="d-flex">
                                <button type="button" class="btn btn-outline-primary"><a href="{{ route('program.edit', $program->id) }}">редактировать</a></button>
                                <form action="{{ route('program.delete', $program->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                  <button type="submit"  class="btn btn-outline-danger ml-2">Удалить</a></button>
                                </form>
                               </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <a type="button" class="btn btn-primary mb-2" href="{{ route('branche.create') }}">Добавить</a>
        <h5 class="font-weight-bold">наши отделения</h5>
        <div class="row">
            @foreach($branches as $branch)
                <div class="col-md-4">
                    <div class="m-b30 blog-grid">
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title">{{ $branch->address }}</h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul class="job-info mb-2">
                                    <li> <i class="ti-location-pin text-black m-r5"></i>{{ $branch->city }} </li>
                                    <li><i class="ti-mobile text-black m-r5"></i>{{ $branch->phone }} </li>
                                </ul>
                               <div class="d-flex">
                                <button type="button" class="btn btn-outline-primary"><a href="{{ route('branche.edit', $branch->id)}}">редактировать</a></button>
                                <form action="{{ route('branche.delete', $branch->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                  <button type="submit"  class="btn btn-outline-danger ml-2">Удалить</a></button>
                                </form>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endsection
