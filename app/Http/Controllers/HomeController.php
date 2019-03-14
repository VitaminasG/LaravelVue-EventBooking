<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
     * Show Calendar interface For Auth User.
     *
     * @return mixed
     */

    public function index()
    {

        return view('home');
    }

	/**
	 * Identify a user
	 *
	 * @return string
	 */

	public function who(){

		return response()->json(

			$token = Auth::user()->api_token

		);
	}

	/**
	 * Send data as Json response
	 *
	 * @return mixed
	 */

	public function view(){

			return response()->json(

				new UserResource(User::find(Auth::id()))

			);
	}
}
