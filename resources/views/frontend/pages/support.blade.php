@extends('frontend.layouts.app')

@section('content')
<!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle bg-pt"
style="background-image:url({{ $page->image ? $page->image: url('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Поддержка и отзывы</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{route('landing')}}">Главная страница</a></li>
                    <li>Поддержка и отзывы</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<div class="content-block">
    <div class="section-full content-inner overlay-white-middle">
        <div class="container">
            <div class="row align-items-center m-b50">
                <div class="col-md-12 col-lg-12 m-b20">
                    <h2 class="m-b5">для учителей</h2>
                    <p class="m-b15">{!! $page->content !!}</p>
                </div>
            </div>
            <div class="col-lg-2">
                @if(Auth::check())
                    <a href="{{ route('support.create') }}" class="site-button">поддержка или отзывы</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- inner page banner END -->
@endsection
