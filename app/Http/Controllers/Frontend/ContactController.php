<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){
        return view($this->viewPath.'/contact/contact');
    }


}
