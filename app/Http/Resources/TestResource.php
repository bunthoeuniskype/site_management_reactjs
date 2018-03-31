<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class TestResource extends Resource
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
            'title' => $this->title,
            'image' => $this->ConvertArr($this->image),
        ];
    }

      public function ConvertArr($ar)
    {  
        $arr = [];
        foreach (json_decode($ar) as $key => $value) {
            $arr[] = array('image' => url($value));
          }
        return $arr;
    }
}
