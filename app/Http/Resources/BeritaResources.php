<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'judul'=>$this->judul,
            'foto'=>$this->foto,
            'tanggal'=>$this->tanggal,
            'deskripsi'=>Str::limit($this->deskripsi,100,'.....')
        ];
    }
}
