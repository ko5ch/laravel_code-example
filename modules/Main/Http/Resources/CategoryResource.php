<?php

namespace Modules\Main\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        self::withoutWrapping();

        return [
            'id'    => $this->id,
            'name'  => $this->name,
        ];
    }
}