<?php

namespace App\Http\Controllers;

use Gate;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAdmin() || Auth::user()->isAgent()){
          abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

          $totalTickets = Ticket::count();
          $openTickets = Ticket::whereHas('status', function($query) {
              $query->whereName('Open');
          })->count();
          $closedTickets = Ticket::whereHas('status', function($query) {
              $query->whereName('Closed');
          })->count();

          return view('admin.home', compact('totalTickets', 'openTickets', 'closedTickets'));
        }
        return view('client.home');
    }
}
