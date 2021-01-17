<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCategory;

class NewsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news_categories = NewsCategory::all();

       return view('news.news_categories.index', compact('news_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('news.news_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news_category = new NewsCategory;

        $news_category->category_name = $request->category_name;

        $news_category->save();
        
        $message = 'Successfully created news category!';
        
        return redirect()->route('news_categories.index')
                        ->with('success', $message);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news_category = NewsCategory::find( $id );

        return view('news.news_categories.edit', compact('news_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsCategory $news_category )
    {

        $news_category->update(['category_name' => $request->category_name ]);
        
        $message = 'News category successfuly updated!';
        
        return redirect()->route('news_categories.index')
                        ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {

        $news_category = NewsCategory::find( $id );
        $news_category->delete();

        $message = 'News category deleted!';
        
        return redirect()->back()
                        ->with('success', $message);
    }
}
