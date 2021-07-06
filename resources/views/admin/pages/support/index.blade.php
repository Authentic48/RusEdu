@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Feebacks and Support</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
            <li>Feebacks and Support</li>
        </ul>
    </div>
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="email-wrapper">
                    <div class="mail-list-container">
                        <div class="mail-box-list">
                            @foreach($supports as $support)
                                <a href="{{ route('support.show', $support->id ) }}"
                                    class="mail-list-info">
                                    <div class="mail-list-title">
                                        <h6>{{ $support->name }}</h6>
                                    </div>
                                    <div class="mail-list-title-info">
                                        <p>{{ $support->email }}</p>
                                    </div>
                                    <div class="mail-list-time">
                                        <span>{{ $support->created_at->diffForHumans() }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Your Profile Views Chart END-->
    </div>
</div>
@endsection
