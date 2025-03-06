<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondAdminPanelController extends Controller
{
    public function index(){
        return view ('SecondAdminPanel.index');
    }
}
