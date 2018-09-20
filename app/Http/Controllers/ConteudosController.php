<?php

namespace App\Http\Controllers;

use App\ThemeOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConteudosController extends Controller
{

    protected $imageExtensions = [
      'jpg',
      'png',
      'svg'
    ];

    public function saveBanners(Request $request)
    {
        $banner = $request->file('banner');
        $opt = $request->input('opt');

        $path = null;

        if (!empty($banner) && !empty($opt)) {

            $ext = $request->banner->extension();

            $name = "banner-$opt.$ext";

            $path = $banner->move(public_path() . '/img', $name);
        }

        return redirect()->route('banners');
    }
}
