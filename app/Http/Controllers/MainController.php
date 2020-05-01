<?php

namespace App\Http\Controllers;

use App\News;
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
        $news = News::inRandomOrder()->where('status','1')->limit(22)->get();
        return view('index', compact('news'));
    }

    public function show($id)
    {
        $show = News::where('slug', $id)->first();
        $tnews = News::inRandomOrder()->where('status','1')->limit(24)->get();
        $previous = News::where('id', '<', $show->id)->orderBy('id', 'DESC')->first();
        $months = $show->created_at->format('m');
        return view('show', compact('show', 'tnews', 'previous', 'months'));
    }

    public function full($id)
    {
        $full = News::where('slug', $id)->first();
        $mnews = News::inRandomOrder()->where('status','1')->limit(3)->get();
        $rnews = News::inRandomOrder()->where('status','1')->limit(5)->get();
        $tnews = News::inRandomOrder()->where('status','1')->limit(22)->get();
        $months = $full->created_at->format('m');
        event('NewsView', $full);
        return view('full', compact('full', 'rnews', 'tnews', 'mnews', 'months'));
    }

    public function link($id)
    {
        $link = News::findOrFail($id);
        event('NewsClick', $link);
        return redirect($link->url);
    }

    public function parse()
    {
        $obj = new Oksnews();
        $obj->getParse('url');
    }

}
