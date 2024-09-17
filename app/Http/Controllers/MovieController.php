<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Carbon\Carbon;
use Storage;
use File;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        $path = public_path()."/json/";
        if (!is_dir($path))
        {
            mkdir($path,0777,true);
        }
        File::put($path.'movies.json',json_encode($list));
        return view('admincp.movie.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        return view('admincp.movie.form', compact('category', 'genre','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required|unique:movies|max: 255',
                'slug' => 'required|unique:movies|max: 255',
                'description' => 'required',
                'anh' => 'required|mimes: jpq,png,jpeg,gif,jfif|max:10000',
                'time' => 'required',
                'sotap'=>'required',
                'hot'=>'required',
                'phude'=>'required',
                'director'=>'required',
                'country_id'=>'required',
                'category_id'=>'required',
                'genre_id'=>'required',
                'resolution'=>'required',
                'status'=>'required'
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề phim',
                'title.unique' => 'Phim này đã tồn tại',
                'slug.required' => 'Vui lòng nhập slug',
                'slug.unique' => 'Phim này đã tồn tại',
                'anh.mimes' =>'Vui lòng chọn đúng định dạng ảnh (jpq,png,jpeg,gif,jfif)',
                'time.required' => 'Vui lòng nhập thời lượng phim',
                'sotap.required' => 'Vui lòng nhập số tập',
                'description.required' => 'Vui lòng nhập mô tả',
                'phude.required' => 'Vui lòng nhập phụ đề phim',
                'time.required' => 'Vui lòng nhập thời lượng phim',
                'sotap.required' => 'Vui lòng nhập số tập phim',
                'director.required' => 'Vui lòng nhập đạo diễn phim',
                'resolution.required' => 'Vui lòng nhập chất lượng phim'

            ]
        );
        $des = 'uploads/movie';
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->hot = $data['hot'];
        $movie->time = $data['time'];
        $movie->phude = $data['phude'];
        $movie->sotap = $data['sotap'];
        $movie->director  = $data['director'];
        $movie->resolution = $data['resolution'];
        $movie->genre_id = $data['genre_id'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->status = $data['status'];
        $movie->country_id = $data['country_id'];
        $movie->category_id = $data['category_id'];
        $get_image = $request->file('anh')->getClientOriginalName();
        $movie->image=$get_image;
        $movie->save();
        $request->file('anh')->move($des,$get_image);
        toastr() ->success('Thành công','Thêm phim thành công');
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $movie = Movie::find($id);
        return view('admincp.movie.form', compact('category', 'genre','country','movie'));
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
        $des = 'uploads/movie';
        $data = $request->validate(
            [
                'title' => 'required|max: 255',
                'slug' => 'required|max: 255',
                'description' => 'required',
                'anh' => 'mimes: jpq,png,jpeg,gif,jfif|max:10000',
                'time' => 'required',
                'sotap'=>'required',
                'hot'=>'required',
                'phude'=>'required',
                'director'=>'required',
                'country_id'=>'required',
                'category_id'=>'required',
                'genre_id'=>'required',
                'resolution'=>'required',
                'status'=>'required'
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề phim',
                'slug.required' => 'Vui lòng nhập slug',
                'anh.mimes' =>'Vui lòng chọn đúng định dạng ảnh (jpq,png,jpeg,gif,jfif)',
                'time.required' => 'Vui lòng nhập thời lượng phim',
                'sotap.required' => 'Vui lòng nhập số tập',
                'description.required' => 'Vui lòng nhập mô tả',
                'phude.required' => 'Vui lòng nhập phụ đề phim',
                'time.required' => 'Vui lòng nhập thời lượng phim',
                'sotap.required' => 'Vui lòng nhập số tập phim',
                'director.required' => 'Vui lòng nhập đạo diễn phim',
                'resolution.required' => 'Vui lòng nhập chất lượng phim'

            ]
        );
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->hot = $data['hot'];
        $movie->time = $data['time'];
        $movie->sotap = $data['sotap'];
        $movie->phude = $data['phude'];
        $movie->director  = $data['director'];
        $movie->resolution = $data['resolution'];
        $movie->genre_id = $data['genre_id'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->country_id = $data['country_id'];
        $movie->category_id = $data['category_id'];
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $iimage = $request->file('anh');
        if($iimage)
        {
            $get_image = $request->file('anh')->getClientOriginalName();
            if (!empty($movie->image))
                {
                    unlink('uploads/movie/'.$movie->image);
                }
            $movie->image=$get_image;
            $request->file('anh')->move($des,$get_image);
        }
        $movie->save();
        toastr() ->success('Thành công','Chỉnh sửa phim thành công');
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if (!empty($movie->image))
        {
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
