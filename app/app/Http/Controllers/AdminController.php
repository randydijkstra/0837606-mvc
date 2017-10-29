<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function adminPosts(Request $request)
  {
    checkIfAuthorized($request);

    return view('admin/posts');
  }

  public function adminUsers(Request $request)
  {
    $this->checkIfAuthorized($request);

    $users = User::select('id', 'firstname', 'lastname', 'email')->get();
    return view('admin/users', ['users' => $users]);

  }

  private function checkIfAuthorized(Request $request){
    if (!$request->user()->hasRole('admin')){
      return redirect()->route('home')->withError("Un-Authorise access");
    }
  }
}
