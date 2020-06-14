<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){
        return view($this->viewPath.'/menu/menu');
    }


}
