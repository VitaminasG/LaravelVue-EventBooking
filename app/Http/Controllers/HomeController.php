<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show Calendar interface with forced token generation for Auth User.
     * @param Request $request
     *
     * @return mixed
     */

    public function index(Request $request)
    {

    	$token = Str::random(60);

    	$request->user()->forceFill([

    		'api_token' => hash('sha256', $token),

	    ])->save();

        return view('home', compact('token'));

    }

	/**
	 * Send data as Json response with Auth guard API
	 *
	 * @return mixed
	 */

	public function view(){

			return response()->json(

				new UserResource(User::find(Auth::guard('api')->user()->id))

			);
	}
}
