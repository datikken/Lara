<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class AdminSubscriptionsController extends Controller
{
    public function index()
    {
        $posts = Subscription::paginate(10);
        return view('admin.subscriptions.display', ['posts' => $posts]);
    }
}
