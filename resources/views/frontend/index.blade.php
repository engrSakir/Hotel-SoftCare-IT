@extends('frontend.layouts.app')
@push('title') Home @endpush
@section('content')
    <!-- Section with popular destinations -->
    <section class="container htlfndr-top-destinations">
        <h2 class="htlfndr-section-title">Latest Hotels</h2>
        <div class="htlfndr-section-under-title-line"></div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 ">
                <article class="htlfndr-top-destination-block">
                    <div class="htlfndr-content-block">
                        <img src="{{ asset('frontend-assets/images/top-destination-1.jpg') }}" alt="room-1" />
                        <div class="htlfndr-post-content">
                            <p class="htlfndr-the-excerpt">A modern hotel room in Star Hotel Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.
                                <a class="htlfndr-read-more-arrow" href="#"><i class="fa fa-angle-right"></i></a>
                            </p>
                            <div class="htlfndr-services">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Free WI-FI</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Incl. breakfast</div><!-- .col-sm-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Private balcony</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Bathroom</div><!-- .col-sm-6 -->
                                </div><!-- .row -->
                            </div><!-- .htlfndr-services -->
                        </div><!-- .htlfndr-post-content -->
                    </div><!-- .htlfndr-content-block -->
                    <footer class="entry-footer">
                        <div class="htlfndr-left-side-footer">
                            <h5 class="entry-title">King Size Bedroom</h5>
                            <div class="htlfndr-entry-rating-stars">
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- .htlfndr-slide-rating-stars -->
                        </div><!-- .htlfndr-left-side-footer -->
                        <div class="htlfndr-right-side-footer">
                            <span class="htlfndr-cost">$ 100</span>
                            <span class="htlfndr-per-night">per night</span>
                        </div><!-- .htlfndr-right-side-footer -->
                    </footer>
                </article><!-- .htlfndr-top-destination-block -->
            </div><!-- .col-sm-4.col-xs-12 -->

            <div class="col-xs-12 col-sm-4 col-md-4 ">
                <article class="htlfndr-top-destination-block">
                    <div class="htlfndr-content-block">
                        <img src="{{ asset('frontend-assets/images/top-destination-2.jpg') }}" alt="room-2" />
                        <div class="htlfndr-post-content">
                            <p class="htlfndr-the-excerpt">A modern hotel room in Star Hotel Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.
                                <a class="htlfndr-read-more-arrow" href="#"><i class="fa fa-angle-right"></i></a>
                            </p>
                            <div class="htlfndr-services">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Free WI-FI</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Incl. breakfast</div><!-- .col-sm-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Private balcony</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Bathroom</div><!-- .col-sm-6 -->
                                </div><!-- .row -->
                            </div><!-- .htlfndr-services -->
                        </div><!-- .htlfndr-post-content -->
                    </div><!-- .htlfndr-content-block -->
                    <footer class="entry-footer">
                        <div class="htlfndr-left-side-footer">
                            <h5 class="entry-title">Awesome Suits</h5>
                            <div class="htlfndr-entry-rating-stars">
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- .htlfndr-slide-rating-stars -->
                        </div><!-- .htlfndr-left-side-footer -->
                        <div class="htlfndr-right-side-footer">
                            <span class="htlfndr-cost">$ 250</span>
                            <span class="htlfndr-per-night">per night</span>
                        </div><!-- .htlfndr-right-side-footer -->
                    </footer>
                </article><!-- .htlfndr-top-destination-block -->
            </div><!-- .col-sm-4.col-xs-12 -->

            <div class="col-xs-12 col-sm-4 col-md-4 ">
                <article class="htlfndr-top-destination-block">
                    <div class="htlfndr-content-block">
                        <img src="{{ asset('frontend-assets/images//top-destination-3.jpg') }}" alt="room-3" />
                        <div class="htlfndr-post-content">
                            <p class="htlfndr-the-excerpt">A modern hotel room in Star Hotel Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque at leo nec vestibulum. malesuada metus.
                                <a class="htlfndr-read-more-arrow" href="#"><i class="fa fa-angle-right"></i></a>
                            </p>
                            <div class="htlfndr-services">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Free WI-FI</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Incl. breakfast</div><!-- .col-sm-6 -->
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Private balcony</div><!-- .col-sm-6 -->
                                    <div class="col-sm-6 col-xs-6 htlfndr-service">Bathroom</div><!-- .col-sm-6 -->
                                </div><!-- .row -->
                            </div><!-- .htlfndr-services -->
                        </div><!-- .htlfndr-post-content -->
                    </div><!-- .htlfndr-content-block -->
                    <footer class="entry-footer">
                        <div class="htlfndr-left-side-footer">
                            <h5 class="entry-title">Single Room</h5>
                            <div class="htlfndr-entry-rating-stars">
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star htlfndr-star-color"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- .htlfndr-slide-rating-stars -->
                        </div><!-- .htlfndr-left-side-footer -->
                        <div class="htlfndr-right-side-footer">
                            <span class="htlfndr-cost">$ 150</span>
                            <span class="htlfndr-per-night">per night</span>
                        </div><!-- .htlfndr-right-side-footer -->
                    </footer>
                </article><!-- .htlfndr-top-destination-block -->
            </div><!-- .col-sm-4.col-xs-12 -->
        </div><!-- .row -->
    </section><!-- .container.htlfndr-top-destinations -->

    <!-- Section called USP section -->
    <section class="container-fluid htlfndr-usp-section">
        <h2 class="htlfndr-section-title htlfndr-lined-title"><span>USP section</span></h2><!-- You need <span> and 'htlfndr-lined-title' class for both side line -->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 htlfndr-icon-box">
                    <img class="htlfndr-icon icon-drinks" src="{{ asset('frontend-assets/images/icon-ups-drinks.png') }}" height="100" width="100" alt="icon" />
                    <h5 class="htlfndr-section-subtitle">beverages included</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.</p>
                    <a href="#" class="htlfndr-read-more-button">read more</a>
                </div><!-- .col-sm-4.htlfndr-icon-box -->

                <div class="col-sm-4 htlfndr-icon-box">
                    <img class="htlfndr-icon icon-drinks" src="{{ asset('frontend-assets/images/icon-ups-card.png') }}" height="100" width="100" alt="icon" />
                    <h5 class="htlfndr-section-subtitle">best deals</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.</p>
                    <a href="#" class="htlfndr-read-more-button">read more</a>
                </div><!-- .col-sm-4.htlfndr-icon-box -->

                <div class="col-sm-4 htlfndr-icon-box">
                    <img class="htlfndr-icon icon-drinks" src="{{ asset('frontend-assets/images/icon-ups-check.png') }}" height="100" width="100" alt="icon" />
                    <h5 class="htlfndr-section-subtitle">guarantee</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum.</p>
                    <a href="#" class="htlfndr-read-more-button">read more</a>
                </div><!-- .col-sm-4.htlfndr-icon-box -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .container-fluid .htlfndr-usp-section -->

    <!-- Section with categories -->
    <section class="container-fluid htlfndr-categories-portfolio">
        <h2 class="htlfndr-section-title bigger-title">discover the world</h2>
        <div class="htlfndr-section-under-title-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)"><!-- The "onclick" is using for Safari (IOS)
                         that recognizes the 'div' element as a clickable element -->
                        <img src="{{ asset('frontend-assets/images/category-box-1.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-germany"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">berlin</h2>
                            <a href="#" class="htlfndr-category-permalink"></a><!-- This link will be displayed to "block" and
                                 will overlay to whole box by hovering on large desktop and will be a circle link on small devices -->
                            <h5 class="category-name">germany</h5>
                            <p class="category-properties"><span>374</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->

                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)">
                        <img src="{{ asset('frontend-assets/images/category-box-2.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-britain"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">london</h2>
                            <a href="#" class="htlfndr-category-permalink"></a>
                            <h5 class="category-name">britain</h5>
                            <p class="category-properties"><span>185</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->

                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)">
                        <img src="{{ asset('frontend-assets/images/category-box-3.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-italy"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">rom</h2>
                            <a href="#" class="htlfndr-category-permalink"></a>
                            <h5 class="category-name">italy</h5>
                            <p class="category-properties"><span>98</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->

                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)">
                        <img src="{{ asset('frontend-assets/images/category-box-4.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-france"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">paris</h2>
                            <a href="#" class="htlfndr-category-permalink"></a>
                            <h5 class="category-name">france</h5>
                            <p class="category-properties"><span>281</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->

                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)">
                        <img src="{{ asset('frontend-assets/images/category-box-5.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-russia"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">moscow</h2>
                            <a href="#" class="htlfndr-category-permalink"></a>
                            <h5 class="category-name">russia</h5>
                            <p class="category-properties"><span>38</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->

                <div class="col-sm-4 col-xs-6">
                    <div class="htlfndr-category-box" onclick="void(0)">
                        <img src="{{ asset('frontend-assets/images/category-box-6.jpg') }}" height="311" width="370" alt="category-img" />
                        <div class="category-description">
                            <div class="htlfndr-icon-flag-border"><i class="htlfndr-icon-flag flag-japan"></i></div><!-- .htlfndr-icon-flag-border -->
                            <h2 class="subcategory-name">tokio</h2>
                            <a href="#" class="htlfndr-category-permalink"></a>
                            <h5 class="category-name">japan</h5>
                            <p class="category-properties"><span>318</span> properties</p>
                        </div><!-- .category-description -->
                    </div><!-- .htlfndr-category-box -->
                </div><!-- .col-sm-4.col-xs-6 -->
            </div><!-- .row -->
        </div>
    </section><!-- .container-fluid.htlfndr-categories-portfolio -->

    <!-- Section with visitors cards -->
    <section class="container-fluid htlfndr-visitors-cards">
        <h2 class="htlfndr-section-title bigger-title">visitors experienced</h2>
        <div class="htlfndr-section-under-title-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
                    <div class="htlfndr-visitor-card">
                        <div class="visitor-avatar-side">
                            <div class="visitor-avatar">
                                <img src="{{ asset('frontend-assets/images/visitor-avatar-1.jpg') }} " height="90" width="90" alt="user avatar" />
                            </div><!-- .visitor-avatar -->
                        </div><!-- .visitor-avatar-side -->
                        <div class="visitor-info-side">
                            <h5 class="visitor-user-name">Sara Connor</h5>
                            <h6 class="visitor-user-firm">Travel Magazine</h6>
                            <p class="visitor-user-text">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam nar...</p>
                        </div><!-- .visitor-info-side -->
                    </div><!-- .htlfndr-visitor-card -->
                </div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->

                <div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
                    <div class="htlfndr-visitor-card">
                        <div class="visitor-avatar-side">
                            <div class="visitor-avatar">
                                <img src="{{ asset('frontend-assets/images/visitor-avatar-2.jpg') }}" height="90" width="90" alt="user avatar" />
                            </div><!-- .visitor-avatar -->
                        </div><!-- .visitor-avatar-side -->
                        <div class="visitor-info-side">
                            <h5 class="visitor-user-name">Mira Young</h5>
                            <h6 class="visitor-user-firm">Hotel Manager</h6>
                            <p class="visitor-user-text">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam nar...</p>
                        </div><!-- .visitor-info-side -->
                    </div><!-- .htlfndr-visitor-card -->
                </div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->

                <div class="col-sm-4 col-xs-12 htlfndr-visitor-column">
                    <div class="htlfndr-visitor-card">
                        <div class="visitor-avatar-side">
                            <div class="visitor-avatar">
                                <img src="{{ asset('frontend-assets/images/recent-04.jpg') }}" height="90" width="90" alt="user avatar" />
                            </div><!-- .visitor-avatar -->
                        </div><!-- .visitor-avatar-side -->
                        <div class="visitor-info-side">
                            <h5 class="visitor-user-name">John Smith</h5>
                            <h6 class="visitor-user-firm">Hotel Manager</h6>
                            <p class="visitor-user-text">Nunc cursus libero purus ac congue arcu cursus ut sed vitae pulvinar massa idporta nequetiam nar...</p>
                        </div><!-- .visitor-info-side -->
                    </div><!-- .htlfndr-visitor-card -->
                </div><!-- .col-sm-4.col-xs-12.htlfndr-visitor-column -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .container-fluid.htlfndr-visitors-cards -->
@endsection
