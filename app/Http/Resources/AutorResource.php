<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AutorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'Autori';//ne radi?

    
    public function toArray($request)
    {
        return [
            'ID:' => $this->resource->id,
            'Ime:' => $this->resource->ime,
            'Prezime:' => $this->resource->prezime,
            'Godina_rodjenja:' => $this->resource->godina_rodjenja,
            'Drzava:' => new DrzavaResource($this->resource->drzava)
            
        ];
    }
}
