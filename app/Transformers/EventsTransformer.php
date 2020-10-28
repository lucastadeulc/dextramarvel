<?php

namespace App\Transformers;

use App\Event;
use League\Fractal\TransformerAbstract;

class EventsTransformer extends TransformerAbstract
{
    public function transform(Event $event)
    {
        return [
            'name'          => $event->name,
            'resourceURI'   => $_ENV['APP_URL'].'/v1/public/events/'.$event->id,
        ];
    }
}