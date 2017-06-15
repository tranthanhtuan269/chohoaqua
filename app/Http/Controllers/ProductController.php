<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        $products = \DB::table('products')
                        ->leftJoin('categories', 'categories.id', '=', 'products.category')
                        ->select(
                                'products.id',
                                'products.name', 
                                'categories.name as categoryName'
                        )
                        ->paginate(8);
        return view('products.index')->withproducts($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \DB::table('products')
                        ->leftJoin('categories', 'categories.id', '=', 'products.category')
                        ->select(
                                'products.id',
                                'products.name', 
                                'categories.name as categoryName'
                        )
                        ->paginate(8);
        return view('products.index')->withproducts($products);
    }

    /**
     * Show the form for creating a product resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = \DB::table('categories')->get();
        $categories = \App\Category::pluck('name', 'id');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a productly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // upload images to server
        $picture = '';
        $allPic = '';
        if ($request->hasFile('images1')) {
            $files = $request->file('images1');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
        }
        // add images to database
        $input = $request->all();
        unset($input['images1']);
        $input['images'] = $allPic;
        $products = Product::create($input);

        \Session::flash('flash_message', 'Nông sản đã được tạo thành công!');
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
        $product = Product::findOrFail($id);    

        if($product === null){
            return view('errors.404');
        }        

        return view('products.show')->withproduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = \App\Category::pluck('name', 'id');
        if (is_null($product))
        {
            return Redirect::route('products.index');
        }
        return \View::make('products.edit', compact(['product', 'categories']));
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
        $allPic = '';
        if ($request->hasFile('images1')) {
            $files = $request->file('images1');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
            unset($input['images1']);
            $input['images'] = $allPic;
        }

        $products = Product::find($id);
        if($products === null){
            return view('errors.404');
        }

        $products->update($input);
        \Session::flash('flash_message', 'Sản phẩm đã được sửa thành công!');

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
        $products = Product::find($id);

        if (is_null($products))
        {
            return Redirect::route('products.index');
        }

        $products->delete();
        return redirect()->route('products.index');
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
