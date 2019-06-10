<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ErrorResource;

class ErrorAnnouncementController extends Controller
{   
    public function errorCreator($error, $code, $type){
        $raiseError = (object) [
            "error_code" => $code,
            'error_message' => $error, 
            "error_type" => $type,
        ];
        return $raiseError;
    }

    public function accessDenied(){
        $error = "Access Denied";
        $code = 0;
        $type = "auth";
        return new ErrorResource($this->errorCreator($error, $code, $type));
    }
    
}
