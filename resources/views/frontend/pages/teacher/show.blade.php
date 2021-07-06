@extends('frontend.layouts.app')
@section('content')

<div class="dez-bnr-inr overlay-black-middle"
    style="background-image:url({{ asset ('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">{{ $teacher->name }}</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{ route('landing') }}">Главная страница</a></li>
                    <li>учителей</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row d-flex flex-row-reverse">
                <div class="col-lg-4 col-md-5 col-sm-12 m-b30">
                    <div class="profile-bx text-center">
                        <div class="user-profile-thumb">
                            <img src="{{ $teacher->pic }}" alt="" />
                        </div>
                        <div class="profile-info">
                            <h4>{{ $teacher->name }}</h4>
                            <span>{{ $teacher->subject }}</span><br>
                            <span><i class="ti-user"></i> {{ $teacher->citizenship }}</span>
                        </div>
                        <div class="profile-social">
                            <ul class="list-inline m-a0">
                                @if ($teacher->skype)
                                <li><a href="{{ $teacher->skype }}"><i class="fa fa-skype"></i></a></li>
                                @endif
                                @if ($teacher->vk)
                                <li><a href="{{ $teacher->vk }}"><i class="fa fa-vk"></i></a></li>
                                @endif
                                @if ($teacher->instagram)
                                <li><a href="{{ $teacher->instagram }}"><i class="fa fa-instagram"></i></a></li> 
                                @endif
                               @if ($teacher->website)
                               <li><a href="{{ $teacher->website }}"><i class="fa fa-globe"></i></a></li> 
                               @endif
                            </ul>
                        </div>
                        <div class="profile-tabnav">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="ti-email"></i> {{ $teacher->email }}
                                </li>
                                <li class="list-group-item">
                                    <i class="ti-mobile"></i> {{ $teacher->phone }}</li>
                                </li>

                                <li class="list-group-item">
                                    <i class="ti-location-pin"></i> {{ $teacher->location }}</li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="courses-post">
                        <div class="ttr-post-media media-effect">
                            <a href="#"><img src="{{ asset($teacher->image) }}" alt=""></a>
                        </div>
                        <div class="ttr-post-info">
                            <div class="ttr-post-title ">
                                <h2 class="post-title">Oбо мне</h2>
                            </div>
                            <div class="ttr-post-text">
                                <p>{!! nl2br(e($teacher->about)) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="courese-overview" id="overview">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <ul class="course-features">
                                    <li><i class="ti-world"></i> <span class="label">Онлайн обучение</span> <span
                                            class="value">{{ $teacher->onlineTraining }}</span></li>
                                    <li><i class="ti-shield"></i> <span class="label">Опыт</span> <span
                                            class="value">{{ $teacher->experience }}</span></li>
                                    <li><i class="ti-calendar"></i> <span class="label">Рабочий день</span>
                                        <span class="value">{{ $teacher->work_day }}</span></li>
                                    <li><i class="ti-time"></i> <span class="label">Режим Работы</span>
                                        <span class="value">{{ $teacher->from }} - {{ $teacher->to }}</span></li>
                                    <li><i class="ti-credit-card"></i> <span class="label">Средняя цена</span>
                                        <span class="value">{{ $teacher->wages }} руб/месяц</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if(Auth::user()->hasAnyRole('student'))
                    <a type="submit" class="site-button text-white mb-3"
                        href="{{ route('review.teacher', $teacher->id) }}">обзор этой учитель</a>
                @endif

                </div>
            </div>
        </div>
    </div>
    <!-- school review -->
    @include('frontend.pages.review.index')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="post-job-bx">
                    <div class="row">
                    @foreach ($teachers as $teacher)
                    <div class="col-lg-4">
                        <li>
                        <a href="{{ route('teachers.show', $teacher->slug)}}">
                            <div class="d-flex m-b30">
                                <div class="job-post-company">
                                    <span><img src="{{ asset($teacher->pic) }}"/></span>
                                </div>
                                <div class="job-post-info">
                                    <h4>{{$teacher->name}}</h4>
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i>{{ $teacher->location }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="job-time mr-auto">
                                    <span>{{$teacher->subject}}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    </div>
                    @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
    @endsection
