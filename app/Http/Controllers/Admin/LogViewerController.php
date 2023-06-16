<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogViewerController extends Controller
{

    public function index()
    {
        $title = 'لیست لاگ ها';
        return view('admin.logs.index' , compact('title'));
    }

}
