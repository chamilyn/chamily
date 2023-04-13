<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function adminCreate()
    {
        return view('admin.event.add');
    }
}
