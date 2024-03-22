<?php

namespace App\Http\Controllers;

use App\Models\Room;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;

class FrontOfficeRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('front-office.room', compact('rooms'));
    }
}
