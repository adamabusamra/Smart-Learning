<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.admin.news.news_index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.news.news_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'                 => 'sometimes|nullable|mimes:jpeg,jpg,png|max:2000',
            'headline'              => 'required|max:200',
            'short_description'     => 'required|max:700',
            'long_description'      => 'required|max:5000',
            'tag'                   => 'required|max:20',
        ]);
        if ($validator->fails()) {
            return redirect()->route('posts.create')
                ->with('warning', 'Some Errors in the form fields')
                ->withErrors($validator)
                ->withInput();
        }

        // Storing image in storage and setting the image's name in database
        if ($file = $request->file('image')) {
            $file_name =  rand() . $file->getClientOriginalName();
            $file->move('news/images', $file_name);
        } else {
            $file_name = "default-news.png";
        }
        News::create([
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            'tag'                   => $request->tag,
            'headline'              => $request->headline,
            'image'                 => $file_name,
        ]);

        return redirect()->route('posts.index')
            ->with('toast_success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $post = $news;
        return view('public.single_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect(route('posts.index'))->with('success', 'Post deleted successfully.');
    }
}
