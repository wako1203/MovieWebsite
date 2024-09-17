<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;

class IndexController extends Controller
{
    public function search()
    {
        if (isset($_GET['search']))
        {
            $search = $_GET['search'];
            $phimhot=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
            $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
            $category = Category::orderBy('id','DESC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
            $country = Country::orderBy('id','DESC')->where('status',1)->get();
            $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
            $movie = Movie::where('title','LIKE','%'.$search.'%')->orderBy('ngaycapnhat','DESC')->paginate('40');
            return view('Clients.search', compact('category', 'genre', 'country','category_home','phimhot','top','movie'));
        }
        else
        {
            return redirect()->to('/');
        }
    }
    public function home(){
        
        $phimhot=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->get();
        $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $category_home = Category::with('movie')->orderBy('id','DESC')->where('status',1)->get();
        // $movie = Movie::with('category','genre','country')->where('category_id',$category_home->id)->where('status',1)->first();
        // $movie  = Movie::where('category_id',$category->id)->where('status',1)->first()();
        // $so = Episode::with('movie')->where('movie_id', $phimhot->id)->count();
        return view('Clients.Home', compact('category', 'genre', 'country','category_home','phimhot','top'));
    }

    public function category($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->paginate(40);
        // $so = Episode::with('movie')->where('movie_id',$movie->id)->count();
        return view('Clients.Category', compact('category', 'genre', 'country', 'cate_slug','movie','top'));
    }
    public function genre($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $gen_slug = Genre::where('slug',$slug)->where('status',1)->first();
        $movie = Movie::where('genre_id', $gen_slug->id)->paginate(40);
        return view('Clients.Genre', compact('category', 'genre', 'country','gen_slug','movie','top'));
    }
    public function country($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $coun_slug = Country::where('slug',$slug)->where('status',1)->first();
        $movie = Movie::where('country_id', $coun_slug->id)->paginate(40);
        return view('Clients.Country', compact('category', 'genre', 'country', 'coun_slug','movie','top'));
    }
    public function movie($slug){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $movie = Movie::with('category','genre','country')->where('slug',$slug)->where('status',1)->first();
        $releated = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(4)->get();
        $so = Episode::with('movie')->where('movie_id',$movie->id)->count();
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        return view('Clients.Movie',compact('category', 'genre', 'country','movie','releated','episode','episode_tapdau','so'));
    }
    public function watch($slug,$tap){
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $top=Movie::where('hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take('10')->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $movie = Movie::with('category','genre','country','episode')->where('slug',$slug)->where('status',1)->first();
        $releated = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        if(isset($tap))
        {
            $tapphim = $tap;
            $tapphim = substr($tap,4,2);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        else
        {
            $tapphim = 1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }
        return view('Clients.Watch',compact('category', 'genre', 'country','movie','top','episode','tapphim','releated'));
    }

    public function episode(){
        return view('Clients.Episode');
    }
}
