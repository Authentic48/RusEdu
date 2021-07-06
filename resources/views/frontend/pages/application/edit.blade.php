@extends('frontend.layouts.app')

@section('content')
    <div class="section-full bg-white submit-resume content-inner-2">
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form method="post" action="{{route('application.update', $application->id)}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf  
                <div class="form-group">
                    <label>статус *</label>
                    <select name="status" id="">
                        <option value="в ожидании">в ожидании</option>
                        <option value="получили">получили</option>
                        <option value="конное интервью">запросить интервью</option>
                        <option value="не сохраняется">не сохраняется</option>
                    </select>
                  
                </div>
                 <div class="form-group">
                    <label>Комментарии *</label>
                    <textarea class="form-control @error('comments') is-invalid @enderror" name="comments"
                        placeholder="сказать что-то заявителю"> {{ old('comments') }}</textarea>
                    @error('comments')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>  
                <button type="submit" class="site-button">Обновить</button>
            </form>
        </div>
    </div>

</div>


@endsection