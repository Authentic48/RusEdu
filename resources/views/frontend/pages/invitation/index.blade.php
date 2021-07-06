@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-5">
        <h3>получили</h3>
        <div class="row">
			
          <div class="col-lg-12 m-b30">
            <div class="widget-box">
              <div class="email-wrapper">
                <div class="mail-list-container">
                  <div class="mail-box-list">
                    @foreach ($invitations as $invitation)
                                          <a class="mail-list-info" href="{{ route('invitations.show', $invitation->id) }}" >
                      <div class="mail-list-title">
                        <h6>{{ $invitation->from }}</h6>
                      </div>
                      <div class="mail-list-title-info">
                        <p class="text-truncate">{{ $invitation->subject }}</p>
                      </div>
                      <div class="mail-list-time">
                        <span>{{ $invitation->created_at->diffForHumans() }}</span>
                      </div>
                                      </a>
                                    @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
   </div>

       <div class="container mt-5">
        <h3>послал</h3>
        <div class="row">
			
          <div class="col-lg-12 m-b30">
            <div class="widget-box">
              <div class="email-wrapper">
                <div class="mail-list-container">
                  <div class="mail-box-list">
                    @foreach ($replies as $reply)
                                          <a class="mail-list-info" href="{{ route('invitations.show', $reply->id) }}" >
                      <div class="mail-list-title">
                        <h6>{{ $reply->to }}</h6>
                      </div>
                      <div class="mail-list-title-info">
                        <p class="text-truncate">{{ $reply->subject }}</p>
                      </div>
                      <div class="mail-list-time">
                        <span>{{ $reply->created_at->diffForHumans() }}</span>
                      </div>
                                      </a>
                                    @endforeach
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      @if (Auth::user()->hasSchoolProfile(Auth::user()->id))
       <a type="button" href="{{ route('invitation.create') }}" class="btn btn-outline-dark">отправить новое приглашение</a>
   @endif
   </div>
@endsection
