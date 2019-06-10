<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'article_id' => $this->id,
            'article_title' => $this->title,
            'article_body' => $this->body,
            'article_user_id' => $this->user_id,
        ];
    }

}
