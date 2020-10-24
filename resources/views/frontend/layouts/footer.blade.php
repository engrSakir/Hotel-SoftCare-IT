<footer class="htlfndr-footer">

    <button class="htlfndr-button-to-top" role="button"><span>Back to top</span></button><!-- Button "To top" -->

    <div class="widget-wrapper">
        <div class="container">
            <div class="row">
                <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
                    <div class="widget">
                        <a class="htlfndr-logo navbar-brand" href="#">
                            <img src="{{ asset('uploads/images/'.$setting->logo) }}" height="20" width="30" alt="Logo" />
                            <p class="htlfndr-logo-text"><span>{{ $setting->name }}</span></p>
                        </a>
                        <hr />
                        <p>{{ $setting->footer_left }}</p>
                    </div><!-- .widget -->
                </aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
                <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
                    <div class="widget">
                        <h3 class="widget-title">contact info</h3>
                        <h5>address</h5>
                        <p>{{ $setting->address }}</p>
                        <hr />
                        <h5>phone number</h5>
                        <p>{{ $setting->phone }}</p>
                        <hr />
                        <h5>email address</h5>
                        <p>{{ $setting->email }}</p>
                    </div><!-- .widget -->
                </aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
                <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
                    <div class="widget">
                        <h3 class="widget-title">pages</h3>
                        <ul class="menu">
                            <li class="menu-item active"><a href="#">home</a></li>
                            <!-- <li class="menu-item"><a href="elements.html">elements</a></li> -->
                            <li class="menu-item"><a href="{{ route('blog') }}">blog</a></li>
                            <li class="menu-item"><a href="#">about</a></li>
                            <li class="menu-item"><a href="#">user profile</a></li>
                        </ul>
                    </div><!-- .widget -->
                </aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
                <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column">
                    <div class="widget">
                        <h3 class="widget-title">follow us</h3>
                        <!-- Start of Follow Us buttons -->
                        <div class="htlfndr-follow-plugin">
                            <a href="" target="_blank" class="htlfndr-follow-button button-facebook"></a>
                            <a href="" target="_blank" class="htlfndr-follow-button button-twitter"></a>
                            <a href="" target="_blank" class="htlfndr-follow-button button-google-plus"></a>
                            <a href="" target="_blank" class="htlfndr-follow-button button-linkedin"></a>
                            <a href="#" class="htlfndr-follow-button button-pinterest"></a>
                            <a href="" target="_blank" class="htlfndr-follow-button button-youtube"></a>
                        </div><!-- .htlfndr-follow-plugin -->
                        <!-- End of Follow Us buttons -->
                        <hr />
                        <h3 class="widget-title">mailing list</h3>
                        <p>{{ $setting->subscribe_note }}</p>
                        <form>
                            <input type="email" placeholder="Your E-mail" />
                            <input type="submit" />
                        </form>
                    </div><!-- .widget -->
                </aside><!-- .col-xs-12.col-sm-6.col-md-3.htlfndr-widget-column -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .widget-wrapper -->

    <div class="htlfndr-copyright">
        <div class="container" role="contentinfo">
            <p>Copyright 2020 | BESTWEBSOFT | All Rights Reserved | Designed by BestWebSoft</p>
        </div><!-- .container -->
    </div><!-- .htlfndr-copyright -->
</footer>
