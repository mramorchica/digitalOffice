<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news = News::with('category')->get();
       dd( $news );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::all();       
        
        return view('news.create', compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;

        $news->title = $request->news_title;
        $news->content = $request->content;
        $news->date_published = $request->date_published;
        $news->is_public = $request->is_public;
        $news->category_id = $request->news_category;
        $news->author_id = Auth::user()->id;
        $img_name = str_replace(' ', '-', $request->news_title);


        $extension = $request->image->extension();

        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = str_replace(' ', '-', $request->news_title) . '_' . time();
            // Define folder path
            $folder = '/news_images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
                    
            $image->storeAs('/public', $filePath);
            // Set user profile image path in database to filePath
           
        }

        $news->image = $filePath;

        $news->save();        
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
