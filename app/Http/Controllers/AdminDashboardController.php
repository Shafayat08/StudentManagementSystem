<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Photo;
use App\Models\Setting;
use App\Models\User;
use App\Models\Complain;
use App\Models\Entrepreneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $mothers = [];
        $complains = [];
        $user = auth()->user(); 
        $usertype = $user->type;
        return view('admin.dashboard', ['usertype' => $usertype], compact('mothers', 'complains'));
    }


}
