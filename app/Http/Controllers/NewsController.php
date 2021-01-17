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
       $news = News::with('category', 'author')
                ->orderBy('date_published', 'desc')
                ->get();

      return view('news.news.index', compact('news'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::all();       
        
        return view('news.news.create', compact('categories'));
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
        $file = $request->file('image');

        $img_name = str_replace(' ', '-', $request->news_title);
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();
        $filename = $img_name . '.' . $extension;

        //Move Uploaded File
        $destinationPath = 'images/news_images';
        $file->move( $destinationPath, $filename );
        

       $news->image = $filename;

        $news->save();

        $message = 'News created successfuly!';

        return redirect()->route('news.index')
        ->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        
        return view('news.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = NewsCategory::all();
      
        return view('news.news.edit', compact('categories', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //TO DO CHECK IF IMAGE UPLOADED ELSE SAVE OLD FILENAME
        //TO DO CHECK IF IMAGE UPLOADED - DELETE OLD FILE

        $file = $request->file('image');

        $img_name = str_replace(' ', '-', $request->title);
        $file = $request->file('image');

        $extension = $file->getClientOriginalExtension();
        $filename = $img_name . '.' . $extension;

        //Move Uploaded File
        $destinationPath = 'images/news_images';
        $file->move($destinationPath, $filename);


        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'date_published'=> $request->date_published,
            'is_public' => $request->is_public,
            'category_is' => $request->news_category,
            'author_id' => Auth::user()->id,
            'image' => $filename
            ]);

                
        $message = 'News edited successfuly!';

        return redirect()->route('news.index')
        ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        //TO DO DELETE IMAGE

        $message = 'News category deleted!';

        return redirect()->back()
            ->with('success', $message);
    }
}
