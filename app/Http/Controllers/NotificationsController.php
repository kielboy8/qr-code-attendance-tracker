<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NotificationsController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
    	$notifications = auth()->user()->notifications()->paginate(5);
    	return view('notifications.index', compact('notifications'));
    }
}
