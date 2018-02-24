<?php

namespace Mcc\Laravelcms\Controllers;
// exit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function index() {
      dd('cms testing');
    }

    public function test($slug) {
      dd($slug);
    }
}
