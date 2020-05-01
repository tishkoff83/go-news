<?php

namespace App\Parser;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\DomCrawler\Crawler;
use App\News;
use App\Http\Controllers\TranslitController;

// use App\Category;
// use Auth;

class Oksnews implements ParseContract
{
    use ParseTrait;
    public $crawler;

    public function __construct()
    {
        set_time_limit(0);
        header('Content-Type: text/html; charset=utf-8');
    }

    public function getParse($path)
    {

        $url = 'https://oksnews.me/news/pop';
        $html = file_get_contents($url);
        $this->crawler = new Crawler($html);

        $this->crawler->filter('.all-column a')->each(function (Crawler $node, $i) {
            $uri = $node->attr('href');
            $dom = 'https://oksnews.me';
            $urlA = $dom . $uri;
            return $this->getAnons($urlA);
        });
    }

    public function getAnons($urlA)
    {

        $newsA = $urlA;
        $htmlA = file_get_contents($newsA);
        $this->crawler = new Crawler($htmlA);
        $this->crawler->filter('.main__primary a')->each(function (Crawler $node, $i) {
            $uri = $node->attr('href');
            $dom = 'https://oksnews.me';
            $urlF = $dom . $uri;
            return $this->getFull($urlF);

        });
    }

    public function getFull($urlF)
    {

        $newsF = $urlF;
        $htmlF = file_get_contents($newsF);
        $this->crawler = new Crawler($htmlF);

        sleep(1);

        $this->crawler->filter('.secondary__main')->each(function (Crawler $node, $i) use ($newsF) {

            $title = $this->text($node, ".item-main__title");
            $body = $this->html($node, ".item-text__body");
            $slug = (new TranslitController)->rus2translit($title);

            $node->filter('.secondary__main a')->each(function (Crawler $node2, $i2) use ($node, $newsF, $title, $slug, $body) {
                $link = $node2->attr('href');


                $node->filter('.item-main__img img')->each(function (Crawler $node3, $i3) use ($link, $body, $slug, $title, $newsF) {
                    $link_image = $node3->attr('src');
                    $dom = 'https://oksnews.me';
                    $image = $dom . $link_image;
                    $pic = \App::make('\App\Libs\Imag')->url($image);
                    $dir_pic = '/uploads/' . Auth::user()->id . '/' . $pic;

                    $obj = News::where('origin_link', $newsF)->first();
                    if (!$obj) {
                        $news_new = new News;
                        $news_new->origin_link = $newsF;
                        $news_new->title = $title;
                        $news_new->body = $body;
                        $news_new->slug = $slug;
                        $news_new->link = $link;
                        $news_new->image = $dir_pic;
                        $news_new->save();

                    }
                });
            });
        });
    }
}
