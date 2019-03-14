<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(User $user, Request $request)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->req = $request;
    }

    /**
     * Show Calendar interface For Auth User.
     *
     * @return mixed
     */

    public function index()
    {

        return view('home');
    }

	/**
	 * Send data as Json response
	 *
	 * @return mixed
	 */
	public function data(){

		return response()->json(
			new UserResource(User::find($this->req->user()->id))
		);

    }

    public function dummy(){

	    return response()->json(
		    new UserResource(User::find(2))
	    );

    }
}
