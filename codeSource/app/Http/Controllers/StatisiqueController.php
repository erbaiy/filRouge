<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisiqueController extends Controller
{
    public  function adminStatistique()
    {

        $activeReservationCount = Reservation::where('status', 'active')->count();
        $cancelledReservationCount = Reservation::where('status', 'cancelled')->count();
        $completedReservationCount = Reservation::where('status', 'completed')->count();
        $usersCount = DB::table('users')
            ->join('role', 'role.id', '=', 'users.role_id')
            ->where('role.name', '=', 'user')
            ->count();
        $adminCount = DB::table('users')
            ->join('role', 'role.id', '=', 'users.role_id')
            ->where('role.name', '=', 'admin')
            ->count();
        $organizerCount = DB::table('users')
            ->join('role', 'role.id', '=', 'users.role_id')
            ->where('role.name', '=', 'organizer')
            ->count();
        $tiketsUsed = DB::table('tickets')
            ->where('tickets.status', 'issued')->count();
        $tiketsCancelled = DB::table('tickets')
            ->where('tickets.status', 'cancelled')->count();

        $availabilityRooms = DB::table('rooms')
            ->where('rooms.availability', true)->count();

        $notAvailabilityRooms = DB::table('rooms')
            ->where('rooms.availability', false)->count();


        return view("back-office.statistique.admin", compact("organizerCount", 'adminCount', 'usersCount', 'completedReservationCount', 'cancelledReservationCount', "activeReservationCount", "tiketsUsed", "tiketsCancelled", "availabilityRooms", "notAvailabilityRooms"));
    }
    public  function organizerStatistique()
    {
        // dd(session('id'));

        $activeReservationCount = DB::table('rooms')
            ->join('reservations', 'rooms.id', '=', 'reservations.room_id')
            ->where('status', 'active')
            ->where('rooms.user_id', '=', session(("id")))
            ->count();

        $cancelledReservationCount = DB::table('rooms')
            ->join('reservations', 'rooms.id', '=', 'reservations.room_id')
            ->where('status', 'canclled')
            ->where('rooms.user_id', '=', session(("id")))
            ->count();
        $completedReservationCount = DB::table('rooms')
            ->join('reservations', 'rooms.id', '=', 'reservations.room_id')
            ->where('status', 'completed')
            ->where('rooms.user_id', '=', session(("id")))
            ->count();

        $availabilityRooms = DB::table('rooms')
            ->where('rooms.availability', true)->where('rooms.user_id', '=', session(("id")))
            ->count();

        $notAvailabilityRooms = DB::table('rooms')
            ->where('rooms.availability', false)->where('rooms.user_id', '=', session(("id")))
            ->count();


        return view("back-office.statistique.organizer", compact('completedReservationCount', 'cancelledReservationCount', "activeReservationCount", "availabilityRooms", "notAvailabilityRooms"));
    }
}
