
@extends('frontend.layouts.app')
@section('content')
	
<div class="dez-bnr-inr overlay-black-middle"
    style="background-image:url({{ asset ('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">{{ $school->name }}</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{ route('landing') }}">Главная страница</a></li>
                    <li>школы</li>
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
                            <img src="{{ asset($school->pic) }}" alt="" />
                        </div>
                        <div class="profile-info">
                            <h4>{{ $school->name }}</h4>
                            <span>{{ $school->subject }}</span><br>
                            <span><i class="ti-location-pin"></i> {{ $school->location }}</span>
                        </div>
                        <div class="profile-social">
                            <ul class="list-inline m-a0">
                                @if ($school->vk)
                                <li><a href="{{ $school->vk }}"><i class="fa fa-vk"></i></a></li>
                                @endif
                                @if ($school->skype)
                                <li><a href="{{ $school->skype }}"><i class="fa fa-skype"></i></a></li>
                                @endif
                                @if ($school->instagram)
                                <li><a href="{{ $school->instagram }}"><i class="fa fa-instagram"></i></a></li> 
                                @endif
                               @if ($school->website)
                               <li><a href="{{ $school->website }}"><i class="fa fa-globe"></i></a></li> 
                               @endif
                            </ul>
                        </div>
                        <div class="profile-tabnav">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="ti-location-pin"></i> {{ $school->address }}
                                </li>
                                <li class="list-group-item">
                                    <i class="ti-mobile"></i> {{ $school->phone }}</li>
                                </li>

                                <li class="list-group-item">
                                    <i class="ti-location-pin"></i> {{ $school->location }}</li>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="courses-post">
                        <div class="ttr-post-media media-effect">
                            <a href="#"><img src="{{ $school->image }}" alt=""></a>
                        </div>
                        <div class="ttr-post-info">
                            <div class="ttr-post-title ">
                                <h2 class="post-title">О школе</h2>
                            </div>
                            <div class="ttr-post-text">
                                <p>{!! nl2br(e($school->about)) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="courese-overview" id="overview">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <ul class="course-features">
                                    <li><i class="ti-world"></i> <span class="label">Онлайн обучение</span> <span
                                            class="value">{{ $school->onlineTraining }}</span></li>
                                    <li><i class="ti-shield"></i> <span class="label">Опыт</span> <span
                                            class="value">{{ $school->onlineTraining }}</span></li>
                                    <li><i class="ti-calendar"></i> <span class="label">Рабочий день</span>
                                        <span class="value">{{ $school->work_day }}</span></li>
                                    <li><i class="ti-time"></i> <span class="label">Режим Работы</span>
                                        <span class="value">{{ $school->from }} - {{ $school->to }}</span></li>
                                    <li><i class="ti-credit-card"></i> <span class="label">Средняя цена</span>
                                        <span class="value">{{ $school->price }} руб/месяц</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                        
                    @if ($programs->count() != 0)
                    <h2 class="post-title">наши программы</h2>
                    <div class="row">
                        @foreach($programs as $program)
                            <div class="col-md-4">
                                <div class="m-b30 blog-grid">
                                    <div class="dez-post-media dez-img-effect "><img
                                            src="{{ asset($program->image) }}" alt=""></div>
                                    <div class="dez-info p-a20 border-1">
                                        <div class="dez-post-title ">
                                            <h5 class="post-title">{{ $program->name }}</h5>
                                        </div>
                                        <div class="dez-post-meta ">
                                            <ul class="job-info">
                                                <li> <i class="ti-shield text-black m-r5"></i>{{ $program->level }}
                                                </li>
                                                <li><i
                                                        class="ti-credit-card text-black m-r5"></i>{{ $program->price }}
                                                </li>
                                                <li><i class="ti-user text-black m-r5"></i>{{ $program->category }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                        @if ($branches->count() != 0)
                        <h2 class="post-title">наши отделения</h2>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    <div class="row">
                        @if(Auth::user()->hasAnyRole('student'))
                            <a type="submit" class="site-button text-white mb-3"
                                href="{{ route('review.create', $school->id) }}">обзор этой школы</a>
                        @endif
                    </div>
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
                    @foreach ($schools as $school)
                    <div class="col-lg-4 mt-2">
                        <li>
                        <a href="{{ route('schools.show', $school->slug)}}">
                            <div class="d-flex m-b30">
                                <div class="job-post-company">
                                    <span><img src="{{ asset($school->pic)}}"/></span>
                                </div>
                                <div class="job-post-info">
                                    <h4>{{$school->name}}</h4>
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i>{{$school->location}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="job-time mr-auto">
                                    <span>{{ $school->subject }}</span>
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
    </div>
    @endsection
