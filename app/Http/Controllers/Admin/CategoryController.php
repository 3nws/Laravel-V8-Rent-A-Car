<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    protected $appends = [
        'getParentsTree',
    ];

    public static function getParentsTree($category, $title){
        // gets all the subsequent categories up the hierarchy by calling it recursively
        if ($category->parent_id==0){
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title . ' > ' . $title;

        return CategoryController::getParentsTree($parent, $title);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
//        $datalist = DB::select('SELECT * FROM categories');
        // equals to $datalist = DB::table('categories')->get();
        $datalist = Category::with('children')->get();

        return view('admin.category', ['datalist' => $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function add()
    {
        $datalist = Category::with('children')->get();
        return view('admin.category_add', ['datalist' => $datalist]);
    }

    /**
     * Insert to the database
     *
     */
    public function create(Request $request){
        $data = new Category;
        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image')){
            $data->image = Storage::putFile('images', $request->file('image')); // file upload
        }
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_category')->with('success', 'Category created.');

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
    public function edit(Category $category, $id)
    {
        $data = Category::find($id);
        $datalist = Category::with('children')->get();
        return view('admin.category_edit', ['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $data = Category::find($id);
        $data->parent_id = $request->input('parent_id');
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        if ($request->file('image')){
            $data->image = Storage::putFile('images', $request->file('image')); // file upload
        }
        $data->status = $request->input('status');
        $data->save();

        return redirect()->route('admin_category')->with('success', 'Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();

        return redirect()->route('admin_category')->with('success', 'Category deleted.');
    }
}
