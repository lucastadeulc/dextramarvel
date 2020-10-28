<?php

namespace App\Transformers;

use App\Storie;
use League\Fractal\TransformerAbstract;

class StoriesTransformer extends TransformerAbstract
{
    public function transform(Storie $storie)
    {
        return [
            'name'          => $storie->name,
            'type'          => $storie->type,
            'resourceURI'   => $_ENV['APP_URL'].'/v1/public/stories/'.$storie->id,
        ];
    }
}