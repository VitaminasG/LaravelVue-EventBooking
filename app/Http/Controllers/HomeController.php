<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
	 * Get a data associated with User.
	 *
	 * @param $id
	 *
	 * @return array
	 */

    public function events($id){

	    return $this->user->getEvent($id);

    }

	/**
	 * Get User id.
	 *
	 * @return int
	 */
	public function userId(){

    	return $this->req->user()->id;
    }


	/**
	 * Send data as Json response
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function data(){

	    $id = $this->userId();

	    $events = $this->events($id);

	    return response()->json([

	    	'id' => $id,
		    'events' => $events

	    ]);
    }
}
