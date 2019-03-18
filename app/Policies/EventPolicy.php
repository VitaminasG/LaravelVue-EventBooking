<?php

namespace App\Policies;

use App\User;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function __construct(User $user, Event $event) {
    	$this->user = $user;
    	$this->event = $event;
    }

	/**
     * Determine whether the user can create events.
     * @param User  $user
     * @return mixed
     */
    public function store(User $user)
    {
	    return $user->id === Auth::guard('api')->user()->id;
    }

    /**
     * Determine whether the user can update the event.
     *
     * @param  int  $id
     * @return mixed
     */
    public function update($id)
    {
    	return $this->event->find($id)->where('user_id', Auth::guard('api')->user()->id);
    }

    /**
     * Determine whether the user can delete the event.
     *
     * @param  int  $id
     * @return mixed
     */
    public function delete($id)
    {
	    return $this->event->find($id)->where('user_id', Auth::guard('api')->user()->id);
    }
}
