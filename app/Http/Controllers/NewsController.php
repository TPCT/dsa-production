<?php

namespace App\Http\Controllers;

use App\Models\Dropdown\Dropdown;
use App\Models\News\News;
use App\Settings\Site;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::active()
            ->paginate(app(Site::class)->news_page_size);
        return $this->view('News.index', compact('news',));
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, News $news)
    {
        return $this->view('Blogs.show', compact('news'));
    }
}
