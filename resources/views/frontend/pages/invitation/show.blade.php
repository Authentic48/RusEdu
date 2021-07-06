@extends('frontend.layouts.app')

@section('content')
   <div class="container mt-5">
       <div class="row">
        <div class="col-lg-12 m-b30">
            <div class="widget-box">
                <div class="email-wrapper">
                    <div class="mail-list-container">
                        <div class="mailbox-view">
                            <div class="mailbox-view-title">
                                <h5 class="send-mail-title">{{ $message->subject}}</h5>
                            </div>
                            <div class="send-mail-details">
                                <div class="d-flex">
                                    <div class="send-mail-user">
                                        <div class="send-mail-user-pic">
                                            <img src="https://img.icons8.com/officel/16/000000/user-male-skin-type-5.png" alt="">
                                        </div>
                                        <div class="send-mail-user-info">
                                            <h4>{{ $message->name }}</h4>
                                            <h5>{{ $message->email }}</h5>
                                        </div>
                                    </div>
                                    <div class="ml-auto send-mail-full-info">
                                        <div class="time"><span>{{ $message->created_at->diffForHumans() }}</span></div>
                                    </div>
                                </div>
                                <div class="read-content-body">
                                    <h5 class="read-content-title">Здравствуйте !</h5>
                                    <p>{{ $message->message}}</p>
                                    <h5 class="read-content-title">С уважением,</h5>
                                    <p class="read-content-name">{{ $message->from }}</p>
                                    @if ($message->from != Auth::user()->email)
                                    <a type="button" href="{{ route('invitation.reply') }}" class="btn btn-outline-dark">Ответить</a>
                                    @endif
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