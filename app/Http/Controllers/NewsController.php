<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $news = \DB::table('news')->paginate(8);
        return view('news.admin')->withnews($news);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = \DB::table('news')->paginate(8);
        return view('news.index')->withnews($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add images to database
        $input = $request->all();

        $picture = '';
        $allPic = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath = base_path() . '/public/images';
            $file->move($destinationPath, $picture);
        }

        
        $input['image'] = $picture;
        $input['flag'] = 1;
        $input['created_at'] = date("Y-m-d H:i:s");
        $news = News::create($input);

        \Session::flash('flash_message', 'Tin tức đã được tạo thành công!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);    

        if($news === null){
            return view('errors.404');
        }        

        return view('news.show')->withnews($news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (is_null($news))
        {
            return Redirect::route('news.index');
        }
        return \View::make('news.edit', compact(['news']));
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
        $input = $request->all();
        $picture = '';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath = base_path() . '/public/images';
            $file->move($destinationPath, $picture);

            $input['image'] = $picture;
        }

        $news = News::find($id);
        if($news === null){
            return view('errors.404');
        }

        $news->update($input);
        \Session::flash('flash_message', 'Tin tức đã được sửa thành công!');

        return redirect()->back();
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

        if (is_null($news))
        {
            return Redirect::route('news.index');
        }

        $news->delete();
        return redirect()->route('news.index');
    }

    public function postImage(\Illuminate\Support\Facades\Request $request){

        $file = $request::file('file');

        $filename = $file->getClientOriginalName();

        $extension = $file->getClientOriginalExtension();

        $picture = date('His').$filename;

        $destinationPath = base_path() . '/public/images';

        $file->move($destinationPath, $picture);

        echo url('/').'/images/'.$picture;

    }
}
