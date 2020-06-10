<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Email;
use App\Models\Faq;
use App\Models\LocationName;
use App\Models\Loyalty;
use App\Models\News;
use App\Models\Order;
use App\Models\Promocode;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
 
use Carbon\Carbon;

use App\Services\APIClient;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    return view('home');
  }
}
