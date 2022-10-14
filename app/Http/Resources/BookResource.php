<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'book' => $this->resource['book'],
            'rel' => $this->resource['rel'],
            'message' => $this->resource['message'],
        ];
    }
    public function withResponse($request, $response)
    {
        return $response->setStatusCode($this->resource['status']);
    }
}
