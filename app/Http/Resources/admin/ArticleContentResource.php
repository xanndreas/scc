<?php

namespace App\Http\Resources\admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleContentResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
