@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="db-breadcrumb">
        <h4 class="breadcrumb-title">Mail Read</h4>
        <ul class="db-breadcrumb-list">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li>Mail Read</li>
        </ul>
    </div>	
    <div class="row">
        <!-- Your Profile Views Chart -->
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="email-wrapper">
                    <div class="mail-list-container">
                        <div class="mailbox-view">
                            <div class="mailbox-view-title">
                                <h5 class="send-mail-title">Feedbacks and Support</h5>
                            </div>
                            <div class="send-mail-details">
                                <div class="d-flex">
                                    <div class="send-mail-user">
                                        <div class="send-mail-user-pic">
                                            <img src="https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png" alt="">
                                        </div>
                                        <div class="send-mail-user-info">
                                           From <h4>{{ $support->email }}</h4>
                                            
                                        </div>
                                    </div>
                                    <div class="ml-auto send-mail-full-info">
                                        <div class="time"><span>{{ $support->created_at->diffForHumans() }}</span></div>
                                    </div>
                                </div>
                                <div class="read-content-body">
                                    <h5 class="read-content-title">Hi, {{ Auth::user()->name }}</h5>
                                    <p>{{ $support->content }}</p>
                                    <h5 class="read-content-title">Kind Regards</h5>
                                    <p class="read-content-name">{{ $support->name }}</p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>       
@endsection