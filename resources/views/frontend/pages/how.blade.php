@extends('frontend.layouts.app')

@section('content')
  <!-- inner page banner -->
<div class="dez-bnr-inr overlay-black-middle bg-pt"
style="background-image:url({{ $page->image ? $page->image: url('assets/images/banner/bnr1.jpg') }});">
<div class="container">
    <div class="dez-bnr-inr-entry">
        <h1 class="text-white">как это устроено</h1>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <ul class="list-inline">
                <li><a href="{{route('landing')}}">Главная страница</a></li>
                <li>как это устроено</li>
            </ul>
        </div>
        <!-- Breadcrumb row END -->
    </div>
</div>
</div>
<!-- inner page banner END -->  
<div class="content-block">
    <div class="section-full content-inner overlay-white-middle">
        <div class="container">
            <div class="row align-items-center m-b50">
                <div class="col-md-12 col-lg-12 m-b20">
                    <h2 class="m-b5">как это устроено</h2>
                    <p class="m-b15">{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection