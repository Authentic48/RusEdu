@extends('frontend.layouts.app')

@section('content')
<!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle"
    style="background-image:url({{ asset('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">{{ $job->title }}</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{ route('landing') }}">Главная страница</a></li>
                    <li>Детали работы</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row d-flex flex-row-reverse">
                <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
                    <div class="profile-bx text-center">
                        <div class="user-profile-thumb">
                            <img src="{{ $job->photo }}" alt="" />
                        </div>
                        <div class="profile-info">
                            <h4>{{ $job->title }}</h4>
                            <span>{{ $job->profession }}</span><br>
                        </div>
                        <div class="profile-social">
                           
                        </div>
                        <div class="profile-tabnav">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="ti-location-pin"></i> {{ $job->address }}
                                </li>
                                <li class="list-group-item">
                                    <i class="ti-email"></i> {{ $job->email }}</li>
                                </li>

                                <li class="list-group-item">
                                    <i class="ti-location-pin"></i> {{ $job->city }}</li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="courses-post">
                        <div class="ttr-post-media media-effect">
                            <a href="#"><img src="{{ $job->image }}" alt=""></a>
                        </div>
                        <div class="ttr-post-info">
                            <div class="ttr-post-title ">
                                <h2 class="post-title">О школе</h2>
                            </div>
                            <div class="ttr-post-text">
                                <p>{!! nl2br(e($job->about)) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="courese-overview" id="overview">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <ul class="course-features">
                                    <li><i class="ti-calendar"></i> <span class="label"><strong
                                                class="font-weight-700 text-black">Крайний срок:</strong></span>
                                        <span
                                            class="value">{{ date('d-m-Y', strtotime($job->deadline)) }}</span>
                                    </li>
                                    <li><i class="ti-shield"></i>
                                        <span class="label"><strong
                                                class="font-weight-700 text-black">Опыт</strong></span>{{ $job->experience }}
                                    </li>
                                    <li><i class="ti-credit-card"></i>
                                        <span class="label"><strong
                                                class="font-weight-700 text-black">Зарплата</strong></span>{{ $job->salary }}
                                        rub
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ttr-post-text">
                        <h5 class="font-weight-600">Описание работы</h5>
                        <p>{!! nl2br(e($job->description)) !!}</p>
                    </div>
                    <div class="ttr-post-text">
                        <h5 class="font-weight-600">Как подать заявку</h5>
                        <p>{!! nl2br(e($job->application)) !!}</p>
                    </div>
                    <div class="ttr-post-text">
                        <h5 class="font-weight-600">Профессиональные требования</h5>
                        <p>{!! nl2br(e($job->requirements)) !!}</p>
                    </div>

                    @if(Auth::user()->hasAnyRole('teacher'))
                        <a type="submit" class="site-button text-white mb-3"
                            href="{{ route('application', $job->id) }}">подать заявление</a>
                    @endif
                </div>
            </div>
            <h3 class="fw4 mb-3">Недавно добавленные вакансии</h3>
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-lg-4">
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
                            </div>
  
                        </div>
                    </div>
                @endforeach
        </div>
        </div>
    </div>
</div>
@endsection
