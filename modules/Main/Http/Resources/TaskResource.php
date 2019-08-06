<?php

namespace Modules\Main\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        self::withoutWrapping();

        return [
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'category_id'   => $this->category_id,
            'title'         => $this->title,
            'description'   => $this->description,
        ];
    }

}