<?php

namespace App\Transformers;

use App\Serie;
use League\Fractal\TransformerAbstract;

class SeriesTransformer extends TransformerAbstract
{
    public function transform(Serie $serie)
    {
        return [
            'name'          => $serie->name,
            'resourceURI'   =>  $_ENV['APP_URL'].'/v1/public/series/'.$serie->id,
        ];
    }
}