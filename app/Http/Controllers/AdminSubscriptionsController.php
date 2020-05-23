<?php

namespace App\Http\Controllers;

use App\Subscriptions;
use Illuminate\Http\Request;

class AdminSubscriptionsController extends Controller
{
    public function index()
    {
        $posts = Subscriptions::paginate(10);
        return view('admin.subscriptions.display', ['posts' => $posts]);
    }
}
