<?php

namespace App\Http\Controllers;

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
		return view('info');
	}
}
