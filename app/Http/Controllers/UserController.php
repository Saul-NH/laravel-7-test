<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $users = User::where('id', Auth::user()->id)->withCount('tasks')->get();
        return view('users.index', ['users' => $users]);
    }
}
