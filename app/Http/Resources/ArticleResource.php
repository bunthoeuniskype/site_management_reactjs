<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

use Illuminate\Support\Collection;

class ArticleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {   

        return [
            'type'          => 'articles',
            'id'            => (string)$this->id,
            'attributes'    => [
                'title' => $this->title,   
                'content' => $this->content,               
            ],
            'image' => $this->ConvertArr($this->image),
            'relationships' => new ArticleRelationshipResource($this),
            'links'         => [
                'self' => route('articles.show', ['article' => $this->id]),
            ],
        ];
    }

    public function ConvertArr($ar)
    {  
        $arr = [];
        if($ar != ''){
            if(count(json_decode($ar)) > 0){
           foreach (json_decode($ar) as $key => $value) {
            $arr[] = array('image' => $value);
          }
          return $arr;
          }
        }
    }
}
