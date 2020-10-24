@extends('frontend.layouts.app')
@push('title') Blogs @endpush
@section('content')
    <div class="container">
        <div class="row htlfndr-page-content">
            <main id="htlfndr-main-content" class="col-sm-12 col-md-8 col-lg-9" role="main">
                @foreach($blogs as $blog)
                <article class="post htlfndr-post">
                    <header class="htlfndr-entry-header">
                        <a href="#"><h2 class="htlfndr-entry-title">{{ Str::limit($blog->title, 75) }}</h2></a>
                        <div class="htlfndr-entry-meta">
                            <span class="htlfndr-posted-by text-danger">Posted by <a href="#">{{ $blog->writer->name }}</a></span>
                            <span class="htlfndr-post-date"><a href="#"><time datetime="2015-08-25">{{ $blog->created_at->format('d-M-Y') }}</time></a></span>
                            <span class="htlfndr-post-time"><a href="#"><time datetime="18:00">at {{ $blog->created_at->format('h:m:s A') }}</time></a></span>
                            <span class="htlfndr-category-link"><a href="#">{{ $blog->created_at->format('l') }}</a></span>
                            <span class="htlfndr-post-comments"><a href="#">{{ $blog->visitor_counter }}</a> Visitors</span>
                        </div><!-- .htlfndr-entry-meta -->
                    </header>
                    <a href="#" class="htlfndr-post-thumbnail">
                        <img src="{{ asset('uploads/images/'.$blog->image) }}" alt="post image" />

                    </a>
                    <div class="htlfndr-entry-content">
                        <p>{!! Str::limit($blog->description, 550) !!}</p>
                        <a href="{{ route('blogDetails', \Illuminate\Support\Facades\Crypt::encryptString($blog->id) ) }}" class="htlfndr-more-link">read more</a>
                    </div><!-- .htlfndr-entry-content -->
                </article><!-- .post .htlfndr-post -->
                @endforeach
                {{ $blogs->links() }}
                    <br>
                    <hr>
                    <!--facebook comment plugin start -->
                    <div class="fb-comments" data-href="http://127.0.0.1:8000/blog" data-numposts="10" data-width=""></div>
                    <!--facebook comment plugin End -->
            </main><!-- #htlfndr-main-content -->


            <aside id="htlfndr-right-sidebar" class="col-sm-12 col-md-4 col-lg-3 htlfndr-sidebar htlfndr-sidebar-in-right" role="complementary">


                <div class="widget htlfndr-near-properties">
                    <div class="htlfndr-widget-main-content">
                        <h3 class="widget-title">Most reached</h3>
                        @foreach($mostViewedBlogs as $mostViewedBlog)
                        <div class="htlfdr-hotel-post">
                            <div class="htlfndr-post-inner htlfndr-table-view">
                                <div class="htlfndr-hotel-thumbnail">
                                    <a href="{{ route('blogDetails', \Illuminate\Support\Facades\Crypt::encryptString($mostViewedBlog->id) ) }}">
                                        <img src="{{ asset('uploads/images/'.$mostViewedBlog->image) }}"/>
                                    </a>
                                </div>
                                <!-- .htlfndr-hotel-thumbnail -->
                                <div class="htlfndr-hotel-info">
                                    <a href="{{ route('blogDetails', \Illuminate\Support\Facades\Crypt::encryptString($mostViewedBlog->id) ) }}"><h6>{{ Str::limit($mostViewedBlog->title, 45) }}</h6></a>
                                    <div class="htlfndr-rating-stars" style="display: none">
                                        <i class="fa fa-star htlfndr-star-color"></i>
                                        <i class="fa fa-star htlfndr-star-color"></i>
                                        <i class="fa fa-star htlfndr-star-color"></i>
                                        <i class="fa fa-star htlfndr-star-color"></i>
                                        <i class="fa fa-star htlfndr-star-color"></i>
                                    </div><!-- .htlfndr-rating-stars -->
                                    <p class="htlfndr-hotel-price"><span>Visitors</span> <span class="htlfndr-cost-normal">{{ $mostViewedBlog->visitor_counter }}</span>
                                    </p>
                                </div><!-- .htlfndr-hotel-info -->
                            </div><!-- .htlfndr-post-inner -->
                        </div><!-- .htlfdr-hotel-post -->
                        @endforeach
                    </div><!-- .htlfndr-widget-main-content .htlfndr-widget-padding -->
                </div><!-- .widget .htlfndr-near-properties -->

                <div class="widget htlfndr-widget-help">
                    <div class="htlfndr-widget-main-content htlfndr-widget-padding">
                        <h3 class="widget-title">need our help</h3>
                        <span>24/7 dedicated customer support</span>
                        <p class="htlfndr-phone">+(000) 000-000-000</p>
                        <p class="htlfndr-mail">support@bestwebsoft.zendesk.com</p>
                    </div><!-- .htlfndr-widget-main-content .htlfndr-widget-padding -->
                </div><!-- .widget .htlfndr-widget-help -->
            </aside><!-- .htlfndr-sidebar-in-right -->
        </div><!-- .row .htlfndr-page-content -->
    </div>
@endsection
