<!-- Section Banner -->
<div class="dez-bnr-inr dez-bnr-inr-md"
style="background-image:url({{ asset('assets/images/banner/bnr1.jpg') }});">
    <div class="container">
        <div class="dez-bnr-inr-entry align-m ">
            <div class="find-job-bx">
                <form class="dezPlaceAni" action="{{ route('search') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="subject"
                                        class="form-control @error('subject') is-invalid @enderror" placeholder="поиск школ, учителей, вакансии">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Город, Регион">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                    </div>
								</div>
								 @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <select name="role">
                                    <option value="teacher">инструкторы</option>
                                    <option value="school">школы</option>
                                    <option value="job">вакансии</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <button type="submit" class="site-button btn-block">Поиск</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Section Banner END -->
