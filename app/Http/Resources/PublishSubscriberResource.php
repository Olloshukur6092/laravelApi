<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublishSubscriberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'publish_id' => $this->publish_id,
            'subscriberFizik_id' => $this->subscriberFizik_id,
            'subscriberYuridik_id' => $this->subscriberYuridik_id,
            'subscriber_date' => $this->subscriber_date,
            'muddati' => $this->muddati,
            'summa' => $this->summa,
            'ispaid' => $this->ispaid
        ];
    }
}
