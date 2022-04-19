<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

     public static $wrap = 'Knjiga';

    public function toArray($request)
    {
        return [
            'ID:' => $this->resource->id,
            'Naslov:' => $this->resource->naslov,
            'Zanr:' => $this->resource->zanr,
            'Autor:'=> new AutorResource($this->resource->autor)
        ];
        
    }
}
