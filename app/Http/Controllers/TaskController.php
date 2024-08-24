<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function inbox()
    {
        return view('task.inbox');
    }

    public function today()
    {
        return view('task.today');
    }

    public function upcoming()
    {
        return view('task.upcoming');
    }

    public function completed()
    {
        return view('task.completed');
    }

}
