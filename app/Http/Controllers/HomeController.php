<?php

namespace App\Http\Controllers;

use App\Models\News;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
 
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $news = News::where('is_enabled', true)
      ->orderBy('created_at', 'desc')
      ->get();
       
    return view('home', [
      'news' => $news
    ]);  
  }
}
