<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReturnStatusCollection extends Resource
{
    private  $message , $status;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($status,$message)
    {
        $this->status = $status;
        $this->message = $message;
    }
    public function toArray($request)
    {
        return [
           'status'=>$this->status,
           'message'=>$this->message,
        ];
    }
}
