<?php

namespace App\Http\Controllers\Backend;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $setting =Setting::find(1);
        $blogs =Blog::orderBy('id', 'desc')->get();
        return view('backend.blog.index', compact('setting', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting =Setting::find(1);
        return view('backend.blog.create', compact('setting'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
            $request->validate([
               'title' => 'required|min:3|max:250',
               'description' => 'required|min:3',
            ]);

        $blog = new \App\Blog();
        $blog->writer_id = auth()->user()->id;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $OriginalExtension = $image->getClientOriginalExtension();
            $image_name = 'blog-image-'. Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
            $destinationPath = ('uploads/images');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize_image->save($destinationPath . '/' . $image_name);
            $blog->image = $image_name;
        }
        try {
            $blog->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully done',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting =Setting::find(1);
        $blog =Blog::find($id);
        return view('backend.blog.edit', compact('setting', 'blog'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'blog' => 'required|exists:blogs,id',
            'title' => 'required|min:3|max:250',
            'description' => 'required|min:3',
        ]);

        $blog =Blog::find($request->input('blog'));
        $blog->writer_id = auth()->user()->id;
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $OriginalExtension = $image->getClientOriginalExtension();
            $image_name = 'blog-image-'. Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
            $destinationPath = ('uploads/images');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize_image->save($destinationPath . '/' . $image_name);
            $blog->image = $image_name;
        }
        try {
            $blog->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully done',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'blog' => 'required|exists:blogs,id',
        ]);

        $blog =Blog::find($request->input('blog'));

        try {
            $blog->delete();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully done',
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }
}
