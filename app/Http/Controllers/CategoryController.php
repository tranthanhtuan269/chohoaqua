<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function admin()
    {
        $id = \Auth::id();
        if($id == 3){
            $categories = \DB::table('categories')->paginate(8);
            return view('categories.admin')->withcategories($categories);
        }
        return redirect('category/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \DB::table('categories')->paginate(8);
        return view('categories.index')->withcategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        $category = Category::create($input);

        \Session::flash('flash_message', 'Danh mục sản phẩm đã được tạo thành công!');
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
        $products = \DB::table('products')
                        ->where('products.category', '=', $id)
                        ->take(6)
                        ->get();
        $category = Category::findOrFail($id);    

        if($category === null){
            return view('errors.404');
        }        

        return view('categories.show')->withcategories($category)->withproducts($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (is_null($category))
        {
            return Redirect::route('categories.index');
        }
        return \View::make('categories.edit', compact(['category']));
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
        $category = Category::find($id);
        if($category === null){
            return view('errors.404');
        }

        $category->update($input);
        \Session::flash('flash_message', 'Danh mục sản phẩm đã được sửa thành công!');

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
        $category = Category::find($id);

        if (is_null($category))
        {
            return Redirect::route('category.index');
        }

        $category->delete();
        return redirect()->route('category.index');
    }
}
