<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::all();
        return view('admincp.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Category::all();
        return view('admincp.category.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $data = $request->validate(
            [
                'title' => 'required|unique:categories|max:255',
                'slug' => 'required|unique:categories|max:255',
                'description' => 'required',
                'status'=>'required'
            ],
            [
                'title.unique' => 'Tên danh mục đã tồn tại vui lòng nhập tên mới',
                'title.required' => 'Vui lòng nhập tên danh mục',
                'slug.unique' => 'Slug đã tồn tại vui lòng nhập slug mới',
                'slug.required' => 'Vui lòng nhập slug danh mục',
                'description.required' => 'Vui lòng nhập mô tả',

            ]
        );
        $category = new Category();
        $category -> title =  $data['title'];
        $category -> slug =  $data['slug'];
        $category -> description = $data['description'];
        $category -> status =  $data['status'];
        $category ->save();
        toastr() ->success('Thành công','Thêm danh mục phim thành công');
        return redirect()->route('category.index');
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
        $category = Category::find($id);
        $list = Category::all();
        return view('admincp.category.form', compact('list','category'));
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
        $data = $request->validate(
            [
                'title' => 'required|max:255',
                'slug' => 'required|max:255',
                'description' => 'required',
                'status'=>'required'
            ],
            [
                'title.required' => 'Vui lòng nhập tên danh mục',
                'slug.required' => 'Vui lòng nhập slug danh mục',
                'description.required' => 'Vui lòng nhập mô tả',

            ]
        );
        $category =Category::find($id);
        $category -> title =  $data['title'];
        $category -> slug =  $data['slug'];
        $category -> description = $data['description'];
        $category -> status =  $data['status'];
        $category ->save();
        toastr() ->success('Thành công','Cập nhật danh mục phim thành công');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
