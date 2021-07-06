@extends('admin.layouts.app')

@section('content')
<!-- Card -->
<div class="row">
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg1">
            <div class="wc-item">
                <h4 class="wc-title">
                    Users
                </h4>
                <span class="wc-des">
                    All Users
                </span>
                <span class="wc-stats">
                    <span class="counter">{{ $users->count() }}</span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg2">
            <div class="wc-item">
                <h4 class="wc-title">
                    Schools
                </h4>
                <span class="wc-des">
                    All Schools
                </span>
                <span class="wc-stats counter">
                    {{ $schools->count() }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg3">
            <div class="wc-item">
                <h4 class="wc-title">
                    Teachers
                </h4>
                <span class="wc-des">
                    All Teachers
                </span>
                <span class="wc-stats counter">
                    {{ $teachers->count() }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
        <div class="widget-card widget-bg4">
            <div class="wc-item">
                <h4 class="wc-title">
                    Guests
                </h4>
                <span class="wc-des">
                    All Guests
                </span>
                <span class="wc-stats counter">
                    {{ $guests }}
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Card END -->
<!-- Your Profile Views Chart END-->
<div class="col-lg-12 m-b30">
    <div class="widget-box">
        <div class="wc-title">
            <h4>Support and Feedbacks</h4>
        </div>
        <div class="widget-inner">
            <div class="noti-box-list">
                <ul>
                    @foreach($supports as $support)
                        <li>
                            <span class="notification-text">
                                <span>{{ $support->name }}</span> {{ $support->email }}
                            </span>
                            <span class="notification-time">
                                <span> {{ $support->created_at->diffForHumans() }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Your Profile Views Chart END-->
<div class="col-lg-12 m-b30">
    <div class="widget-box">
        <div class="wc-title">
            <h4>Messages From Contact Us</h4>
        </div>
        <div class="widget-inner">
            <div class="noti-box-list">
                <ul>
                    @foreach($messages as $message)
                        <li>
                            <span class="notification-text">
                                <span>{{ $message->name }}</span> {{ $message->email }}
                            </span>
                            <span class="notification-time">
                                <span> {{ $message->created_at->diffForHumans() }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
