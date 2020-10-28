<?php

namespace App\Transformers;

use App\Url;
use League\Fractal\TransformerAbstract;

class UrlsTransformer extends TransformerAbstract
{
    public function transform(Url $url)
    {
        return [
            'type'  => $url->type,
            'url'   => $url->url,
        ];
    }
}