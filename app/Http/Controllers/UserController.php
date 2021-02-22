<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Profile;
use App\Models\ProfilePivot;
use App\Models\User;
use App\Models\Watchlist;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Mail\Message as MailMessage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
    }
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }
}


// 