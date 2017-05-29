<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setlocale(Request $request)
    {
        $lang = ['ru', 'en'];

        if (in_array($request->lang, $lang)) {
            session(['locale' => $request->lang]);
        } else {
            session(['locale' => 'ru']);
        }

        return redirect()->back();
    }
}

