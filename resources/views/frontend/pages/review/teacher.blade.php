@extends('frontend.layouts.app')

@section('content')
@if(session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
  <div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
       <div class="col-md-6 offset-md-3">
       <form method="POST" action="{{ route('review.teacherStore', $teacher->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>имя *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', auth()->user()->name) }}" placeholder="Your Full Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="text" class="invisible" name="user_id" value="{{ $teacher->id }}">
            <input type="text" class="invisible" name="slug" value="{{ $teacher->slug }}">
           <div class="form-group">
                <label>контент *</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                    placeholder="скажи что-нибудь об этой школе">{{old('content')}}</textarea>
                @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="site-button">Отправить</button>
    </form>       
    </div>         
     </div>
            
</div>
<!-- Submit Resume END -->

@endsection
