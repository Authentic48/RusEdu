@extends('frontend.layouts.app')

@section('content')
    <!-- Our Jobs -->
<div class="section-full content-inner">
    <div class="container">
        <a class="btn btn-primary mb-5" href="{{ route('job.create') }}" role="button">Новый
            пост</a>
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-lg-8 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a
                                        href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a>
                                </h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i>{{ $job->city }}</li>
                                    <li class="post-author"><i class="ti-user"></i>Oт <a
                                            href="#">{{ $job->name }}</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p class="text-truncate">{{ $job->description }}</p>
                            </div>
                            <div class="dez-post-readmore">
                                <i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</li>
                            </div>
                            <div class="d-flex">
                            <a href="{{ route('job.edit', $job->id) }}"
                                class="btn btn-outline-primary mr-2" role="button" aria-pressed="true">Обновить</a>
                                <form action="{{ route('job.delete', $job->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button class="btn btn-outline-danger mr-2" type="submit" role="button" aria-pressed="true">Удалить</button>
                            </form>
                            <a type="button" href="{{ route('applicants.show', $job->id)}}" class="btn btn-outline-secondary">заявители</a>
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