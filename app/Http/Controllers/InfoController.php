<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

/**
 * Class InfoController
 *
 * @package App\Http\Controllers
 */

class InfoController extends Controller
{
	/**
	 * Show Main page with information about the application.
	 *
	 * @return object view
	 */
	public function index()
	{

		$token = Str::random(60);

		return view('info', compact('token'));

	}
}
