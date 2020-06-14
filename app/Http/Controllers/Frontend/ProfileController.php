<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){

        $user = User::first();
        return view($this->viewPath.'/profile/profile', compact('user'));
    }

    public function updateProfile(Request $request){

        $id = $request->id;
        $value = $request->fieldValue;
        $type = $request->type;
        User::where('id',$id)->update([$type => $value]);
        return ['status' => true, 'message' => 'profile has been update successfully '];

    }


}
