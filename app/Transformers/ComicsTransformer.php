<?php

namespace App\Transformers;

use App\Comic;
use League\Fractal\TransformerAbstract;

class ComicsTransformer extends TransformerAbstract
{
    public function transform(Comic $comic)
    {
        return [
            'name'          => $comic->name,
            'resourceURI'   =>  $_ENV['APP_URL'].'/v1/public/comics/'.$comic->id,
        ];
    }
}