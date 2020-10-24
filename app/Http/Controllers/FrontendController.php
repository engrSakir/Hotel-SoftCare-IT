<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Hotel;
use App\hotel_details;
use App\Image;
use App\Location;
use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    //Frontend home page
    public function index(){
        $setting = Setting::find(1);
        $locations =Location::orderBy('id', 'desc')->get();
        $hotels = Hotel::orderBy('id', 'desc')->take(9)->get();
        $banners = Image::orderBy('id', 'desc')->where('type', 'websiteSlider')->get();
        return view('frontend.index',compact('setting', 'hotels', 'banners', 'locations') );
    }

    //Frontend blog page
    public function blog(){
        $setting = Setting::find(1);
        $locations =Location::orderBy('id', 'desc')->get();
        $hotels = Hotel::orderBy('id', 'desc')->take(9)->get();
        $banners = Image::orderBy('id', 'desc')->where('type', 'websiteSlider')->get();
        $blogs = Blog::orderBy('id', 'desc')->paginate(1);
        $mostViewedBlogs = Blog::orderBy('visitor_counter', 'desc')->take(10)->get();
        return view('frontend.blog',compact('setting', 'blogs', 'mostViewedBlogs','hotels', 'banners', 'locations') );
    }

    //Frontend blog details
    public function blogDetails($blog_id){
        $setting = Setting::find(1);
        $locations =Location::orderBy('id', 'desc')->get();
        $hotels = Hotel::orderBy('id', 'desc')->take(9)->get();
        $banners = Image::orderBy('id', 'desc')->where('type', 'websiteSlider')->get();
        $blog = Blog::find(Crypt::decryptString($blog_id));
        $blog->visitor_counter++;
        $blog->save();
        $mostViewedBlogs = Blog::orderBy('visitor_counter', 'desc')->take(5)->get();
        return view('frontend.blog-details',compact('setting', 'blog', 'mostViewedBlogs', 'hotels', 'banners', 'locations') );
    }
}
