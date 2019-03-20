<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

	/**
	 * Create a new controller instance.
	 * @param Event $event
	 * @return void
	 */

	public function __construct(Event $event) {

		$this->event = $event;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function store(Request $request)
	{

		$this->authorize('store', Event::class);

		$request->validate([
			'date' => 'required',
			'title' => 'required|regex:/^(?:[A-Za-z]+)(?:[A-Za-z0-9 _]*)$/'
		]);

		$this->event->date = $request->date;
		$this->event->title = htmlspecialchars($request->title, ENT_QUOTES);
		$this->event->user_id = $request->user('api')->id;
		$this->event->save();

		return response()->json('Event was saved!', '200');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function update(Request $request, $id)
	{
		$this->authorize('update', Event::class);

		$request->validate([
			'title' => 'required'
		]);

		$event = $this->event->find($id);

		$event->title = htmlspecialchars($request->title, ENT_QUOTES);

		$event->update();

		return response()->json('Event Title was updated!', '200');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function destroy($id)
	{
		$this->authorize('delete', Event::class);

		$event = $this->event->find($id);

		$event->delete();

		return response()->json('Event was deleted!', '200');
	}
}
