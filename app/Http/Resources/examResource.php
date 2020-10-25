<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class examResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'option_1' => $this->option_1,
            'option_2' => $this->option_2,
            'option_3' => $this->option_3,
            'option_4' => $this->option_4,
            'category' => $this->category,
            'updated_at' => $this->updated_at,
        ];
    }
}
