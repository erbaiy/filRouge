<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {

        $rooms = Room::where('availability', '1')->where('is_accepted', 'accepte')->get();
        return view('front-office.room', compact('rooms'));
    }
}
