<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = User::find(auth()->id());
        if ($user->role_id == 1){
        $users = User::where('role_id', 2)->get();
        return view('dashboard',compact('users'));
        }else{
            return view('user_dashboard',compact('user'));
        }
    }
    public function approve(Request $request)
    {
        $userId = $request->user_id;
        $user = User::find($userId);
        if ($user) {
            $user->approved = true;
            $user->save();
            return redirect()->back()->with('success', 'User has been approved successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
    public function decline(Request $request, $userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete(); 
            return redirect()->back()->with('success', 'User registration declined successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
