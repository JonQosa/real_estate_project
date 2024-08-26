<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prop\AllRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Prop\SavedProp;




class UsersController extends Controller
{
    public function allRequests()
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the currently authenticated user's ID
            $allRequests = AllRequest::where('user_id', $userId)->get();

            return view('users.displayrequests', compact('allRequests'));
        } else {
            return abort(404); // You may also use redirect()->route('login') or similar
        }
    }

    public function allSavedProps()
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the currently authenticated user's ID
            $allSavedProps = SavedProp::where('user_id', $userId)->get();

            return view('users.displaysavedprops', compact('allSavedProps'));
        } else {
            // Redirect to login page or show an error
            return abort(404); // You may also use redirect()->route('login') or similar
        }
    }
}
