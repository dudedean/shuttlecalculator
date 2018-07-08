<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Player extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id ,
            'event_id'=> $this->event_id ,
            'name'=> $this->name ,
            'shuttlecocks'=> $this->shuttlecocks ,
            'totalFee'=> $this->totalFee,
        ];
    }


}
