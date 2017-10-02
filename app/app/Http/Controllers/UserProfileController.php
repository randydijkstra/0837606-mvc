<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, $id)
  {
    $request->user()->authorizeRoles(['player', 'admin']);

    $user = User::findOrFail($id);
    $userProfile = $user->profile;

    return view('profile/show')->with(
      array(
        'user'=>$user,
        'profile'=>$userProfile,
      )
    );
  }
}
