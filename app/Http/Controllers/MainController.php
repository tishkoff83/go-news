<?php

namespace App\Http\Controllers;

use App\News;
use App\Goods;
use App\Parser\Oksnews;
use App\Events\NewsView;
use App\Events\NewsClick;
use Illuminate\Http\Request;
//use Hash;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        $news = News::inRandomOrder()->where('status', '1')->limit(22)->get();
        return view('index', compact('news'));
    }

    public function show($id)
    {
        $show = News::where('slug', $id)->first();
        $tnews = Goods::inRandomOrder()->where('status', '1')->limit(24)->get();
        $previous = News::where('status', '1')->where('id', '<', $show->id)->orderBy('id', 'DESC')->first();
        $months = $show->created_at->format('m');
        return view('show', compact('show', 'tnews', 'previous', 'months'));
    }

    public function full($id)
    {
        $full = News::where('slug', $id)->first();
        $mnews = Goods::inRandomOrder()->where('status', '1')->limit(3)->get();
        $fnews = Goods::inRandomOrder()->where('status', '1')->limit(1)->get();
        $rnews = Goods::inRandomOrder()->where('status', '1')->limit(5)->get();
        $tnews = Goods::inRandomOrder()->where('status', '1')->limit(22)->get();
        $months = $full->created_at->format('m');
        event('NewsView', $full);
        return view('full', compact('full', 'rnews', 'fnews', 'tnews', 'mnews', 'months'));
    }

    public function link($id)
    {
        $link = Goods::findOrFail($id);
        event('NewsClick', $link);
        return redirect($link->url);
    }

    public function parse()
    {
        $obj = new Oksnews();
        $obj->getParse('url');
    }

}
