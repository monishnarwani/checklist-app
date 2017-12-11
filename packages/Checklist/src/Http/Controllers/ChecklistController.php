<?php

namespace Checklist\Http\Controllers;

use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function index() {
        return view('Checklist::pages.welcome');
    }
}
