<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    return [
		    'id' => $this->id,
		    'title' => $this->title,
		    'user_id' => $this->user_id,
		    'startDate' => $this->date,
		    'endDate' => $this->date,
	    ];
    }
}
