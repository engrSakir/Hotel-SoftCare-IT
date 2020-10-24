<header>
    <div class="htlfndr-top-header">
        <div class="navbar navbar-default htlfndr-blue-hover-nav">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#htlfndr-first-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="htlfndr-logo navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('uploads/images/'.$setting->logo) }}" height="20" width="30" alt="Logo" />
                        <p class="htlfndr-logo-text">&nbsp; <span>{{  $setting->name }}</span></p>
                    </a>
                </div><!-- .navbar-header -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="htlfndr-first-nav">
                    <!-- List with sing up/sing in links -->
                    <ul class="nav navbar-nav htlfndr-singup-block">
                        @guest
                        <li id="htlfndr-singup-link">
                            <a href="{{ route('register') }}" ><span>sing up</span></a>
                        </li>
                        <li id="htlfndr-singin-link">
                            <a href="{{ route('login') }}" ><span>sing in</span></a>
                        </li>
                        @else
                        <!--Start Logout System-->
                            <li id="htlfndr-singin-link">
                                <a href="javaScript:void();" data-toggle="modal" data-target="#htlfndr-sing-in logout-btn"><span>Logout</span></a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <script>
                                $(document).ready(function() {
                                    //Show modal for add
                                    $('#htlfndr-singin-link').click(function(){
                                        $( "#logout-form" ).submit();
                                    });

                                });

                            </script>
                        @endguest
                    </ul>

                    <!-- .htlfndr-singup-block -->
                    <!-- List with currency and language dropdons -->
                    <!-- <ul class="nav navbar-nav htlfndr-custom-select htlfndr-currency">
                        <li>
                            <label for="htlfndr-currency" class="sr-only">Change currency</label>
                            <select name="htlfndr-currency" id="htlfndr-currency" tabindex="-1">
                                <option value="eur">eur</option>
                                <option value="gbp">gbp</option>
                                <option value="jpy">jpy</option>
                                <option value="usd" selected="selected">usd</option>
                            </select>
                        </li>
                    </ul> -->
                    <!-- <ul class="nav navbar-nav htlfndr-custom-select htlfndr-language">
                        <li id="htlfndr-dropdown-language">
                            <label for="htlfndr-language" class="sr-only">Change language</label>
                            <select name="htlfndr-language" id="htlfndr-language" tabindex="-1">
                                <option value="eng" selected="selected">eng</option>
                                <option value="ger">ger</option>
                                <option value="jap">jap</option>
                                <option value="ita">ita</option>
                                <option value="fre">fre</option>
                                <option value="rus" >rus</option>
                            </select>
                        </li>
                    </ul> -->
                </div><!-- .collapse.navbar-collapse -->
            </div><!-- .container -->
        </div><!-- .navbar.navbar-default.htlfndr-blue-hover-nav-->
    </div><!-- .htlfndr-top-header -->
    <!-- Start of main navigation -->
    <div class="htlfndr-under-header">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#htlfndr-main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div><!-- .navbar-header -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="htlfndr-main-nav">
                    <ul class="nav navbar-nav">
                        <li class="">
                            <a href="{{ route('index') }}">home</a>
                        </li>
                        <!-- <li><a href="elements.html">elements</a></li> -->
                        <li>
                            <a href="{{ route('blog') }}">blog</a>
                        </li>
                        <li>
                            <a href="#">about</a>
                        </li>
                        <li>
                            <a href="#">user profile</a>
                        </li>
                        <li  class="dropdown">
                            <a href="#" onclick="return false;">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Search result</a>
                                    <!-- <ul class="dropdown-menu">
                                        <li><a href="search-result.html">Search result 1</a>
                                        <li><a href="search-result-v-2.html">Search result 2</a></li>
                                        <li><a href="search-result-v-3.html">Search result 3</a></li>
                                    </ul> -->
                                </li>
                                <li  class="dropdown-submenu"><a href="#">Hotel page</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Hotel page 1</a>
                                        <li><a href="#">Hotel page 1 Special offer</a></li>
                                        <!-- <li><a href="hotel-page-v3.html">Hotel page 2</a></li>
                                        <li><a href="hotel-page-v4.html">Hotel page 2 Special offer</a></li> -->
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#">Hotel Room Page</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Hotel Room Page</a>
                                        <li><a href="#">Hotel Room Page Special offer</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Payment</a></li>
                                <li><a href="#">Search Rooms</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Thanks Page</a></li>
                                <li><a href="#">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- .collapse.navbar-collapse -->
            </div><!-- .container -->
        </nav><!-- .navbar.navbar-default.htlfndr-blue-hover-nav -->
    </div><!-- .htlfndr-under-header -->
    <!-- End of main navigation -->

    <!-- Start of slider section -->
    <section class="htlfndr-slider-section">

        <div class="owl-carousel">
            @foreach($banners as $banner)
            <div class="htlfndr-slide-wrapper">
                <img src="{{ asset('uploads/images/'.$banner->image) }}" alt="img-1" />
                <div class="htlfndr-slide-data container">
                    <div class="htlfndr-slide-rating-stars">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div><!-- .htlfndr-slide-rating-stars -->
                    <h1 class="htlfndr-slider-title">{{ $setting->name }}</h1>
                    <div class="htlfndr-slider-under-title-line"></div>
                </div><!-- .htlfndr-slide-data.container -->
            </div><!-- .htlfndr-slide-wrapper-->
            @endforeach
        </div>

        <!-- Search form aside start -->
        <aside class="htlfndr-form-in-slider htlfndr-search-form-inline">
            <div class="container">
                <h5>Where are you going?</h5>
                <form action="#" name="search-hotel" id="search-hotel" class="htlfndr-search-form">
                    <div id="htlfndr-input-1" class="htlfndr-input-wrapper">
                        <input type="text" name="htlfndr-city" id="htlfndr-city" class="search-hotel-input" placeholder="Enter city, region or district" />
                        <p class="htlfndr-search-checkbox">
                            <input type="checkbox" id="htlfndr-checkbox" name="htlfndr-checkbox" value="no-dates" />
                            <label for="htlfndr-checkbox">I don't have specific dates yet</label>
                        </p>
                    </div><!-- #htlfndr-input-1.htlfndr-input-wrapper -->

                    <div id="htlfndr-input-date-in" class="htlfndr-input-wrapper">
                        <label for="htlfndr-date-in" class="sr-only">Date in</label>
                        <input type="text" name="htlfndr-date-in" id="htlfndr-date-in" class="search-hotel-input" />
                        <button type="button" class="htlfndr-clear-datepicker"></button>
                    </div><!-- #htlfndr-input-date-in.htlfndr-input-wrapper -->

                    <div id="htlfndr-input-date-out" class="htlfndr-input-wrapper">
                        <label for="htlfndr-date-out" class="sr-only">Date out</label>
                        <input type="text" name="htlfndr-date-out" id="htlfndr-date-out" class="search-hotel-input" />
                        <button type="button" class="htlfndr-clear-datepicker"></button>
                    </div><!-- #htlfndr-input-date-out.htlfndr-input-wrapper -->

                    <div id="htlfndr-input-4" class="htlfndr-input-wrapper">
                        <label for="htlfndr-dropdown" class="sr-only">The number of people in room</label>
                        <select name="htlfndr-dropdown" id="htlfndr-dropdown" class="htlfndr-dropdown">
                            <option value="1 adult">1 adult</option>
                            <option value="2 adults in 1 room">2 adults in 1 room</option>
                            <option value="3 adults in 1 room">3 adults in 1 room</option>
                            <option value="4 adults in 1 room">4 adults in 1 room</option>
                            <option value="2 adults in 2 room">2 adults in 2 room</option>
                            <option value="need more">Need more?</option>
                        </select>
                    </div><!-- #htlfndr-input-4.htlfndr-input-wrapper -->

                    <div id="htlfndr-input-5">
                        <input type="submit" value="search"/>
                    </div><!-- #htlfndr-input-5.htlfndr-input-wrapper -->
                </form>
            </div><!-- .container -->
        </aside><!-- .htlfndr-form-in-slider.container-fluid -->
        <!-- Search form aside stop -->
    </section><!-- .htlfndr-slider-section -->
    <!-- End of slider section -->
    <noscript><h2>You have JavaScript disabled!</h2></noscript>
</header>
