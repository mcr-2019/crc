<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{ 
  public function showNews(Request $request)
  {
    $news = News::where('is_enabled', true)
      ->orderBy('created_at', 'desc')
      ->get();

    if (!is_null($news)) {
      $view = view('news', [
          'news' => $news
      ]);
       
      return response($view);
    } else { 
      return redirect()->to('/', 301); 
    }
  }
  
  public function showNewsItem($news_id, Request $request)
  {
    $newsItem = News::where('is_enabled', true)
      ->where('id', $news_id)
      ->first();

    if (!is_null($newsItem)) {
      $view = view('news-item', [
          'newsItem' => $newsItem
      ]);
       
      return response($view);
    } else { 
      return redirect()->to('/', 301); 
    }
  } 
}
