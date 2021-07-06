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
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                @foreach($jobs as $job)
                    <div class="m-b30 blog-grid">
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a
                                        href="{{ route('jobs.show',$job->slug ) }}">{{ $job->title }}</a>
                                </h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i>{{ $job->city }}</li>
                                    <li class="post-author"><i class="ti-user"></i>Oт <a href="#">{{ $job->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p class="text-truncate">{{ $job->description }}</p>
                            </div>
                            <div class="dez-post-readmore">
                                <i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</li>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $jobs->links() }}
            </div>


            <div class="col-xl-3 col-lg-4">
                <div class="sticky-top">
                    <form action="{{ route('search.job') }}" method="POST">
                        @csrf
                        <div class="clearfix m-b30">
                            <h5 class="widget-title font-weight-700 text-uppercase">ключевые слова</h5>
                            <input type="text" name="subject"
                                class="form-control @error('subject') is-invalid @enderror" placeholder="поиск">
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="clearfix m-b10">
                            <h5 class="widget-title font-weight-700 m-t0 text-uppercase">город</h5>
                            <input type="text" name="location"
                                class="form-control m-b30 @error('location') is-invalid @enderror" placeholder="Москва">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="site-button">поиск</button>
                    </form>
                </div>
                <!-- ads -->
            </div>
        </div>
    </div>
</div>

<!-- Our Jobs END -->
@endsection
