<!-- Footer -->
<footer class="site-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <img src="{{ asset ('assets/images/logo2.png') }}" width="180"
                            class="m-b15" alt="" />
                        <p class="text-capitalize m-b20">Подписывайтесь на нашу новостную рассылку!</p>
                        <div class="subscribe-form m-b20">
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="dzSubscribe" action="{{ route('newsletter.store') }}"
                                method="POST">
                                @csrf
                                <div class="input-group">
                                    <input name="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="info@mail.ru" type="email">
                                    <span class="input-group-btn">
                                        <button name="submit" value="Submit" type="submit"
                                            class="site-button radius-xl">подписываться</button>
                                    </span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                        <ul class="list-inline m-a0">
                            <li><a href="#" class="site-button white facebook circle "><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="site-button white facebook circle "><i
                                        class="fa fa-vk"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">Часто задаваемые вопросы</h5>
                        <ul class="list-2 list-line">
                            <li><a href="#">Для инструкторов</a></li>
                            <li><a href="#">Для школ</a></li>
                            <li><a href="#">для гостей</a></li>
                            <li><a href="#">Для соискателей</a></li>
                            <li><a href="#">Связаться с нами</a></li>
                            <li><a href="#">насчет нас</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                    <div class="widget border-0">
                        <h5 class="m-b30 text-white">O платформе</h5>
                        <ul class="list-2 w10 list-line">
                            <li><a href="#">Конфиденциальность и безопасность</a></li>
                            <li><a href="#">Условия использования</a></li>
                            <li><a href="#">Служба поддержки</a></li>
                          <!--  <li><a href="{{ route('how') }}">как это устроено</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                 All right reserved  &copy; 2020  Schools&Teachers <span>by <a target="_blank" href="/">SMART DEV</a></span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer END -->
