@extends('frontend.layouts.app')

@section('content')
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<!-- Our Jobs -->
<div class="section-full content-inner">
    <div class="container">
        <a class="btn btn-primary mb-5" href="{{ route('student.create') }}" role="button">Новый
            пост</a>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a
                                        href="{{ route('students.show', $post->slug) }}">{{ $post->title }}</a>
                                </h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i>{{ $post->city }}</li>
                                    <li class="post-author"><i class="ti-user"></i>Oт <a
                                            href="#">{{ $post->name }}</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p class="text-truncate">{{ $post->content }}</p>
                            </div>
                            <div class="dez-post-readmore">
                                <i class="fa fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</li>
                            </div>
                            <div class="d-flex">
                            <a href="{{ route('student.edit', $post->id) }}"
                                class="btn btn-outline-primary mr-2" role="button" aria-pressed="true">Обновить</a>
                                <form action="{{ route('student.delete', $post->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button class="btn btn-outline-danger" type="submit" role="button" aria-pressed="true">Удалить</button>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Our Jobs END -->
@endsection