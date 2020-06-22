<?php

namespace App\Repository\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseObject;
use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Response as FacadeResponse;

class ValidationRepositoryAPI {

    public function checkRequest($validate){
        $response = new ResponseObject;
        if($validate->fails()){
            $response->status = $response::status_failed;
            $response->code = $response::code_failed;
            foreach ($validate->errors()->getMessages() as $item) {
                array_push($response->messages, $item);
            }
        }else{
            $response->status = $response::status_ok;
            $response->code = $response::code_ok;
        }
        return $response;
    }
}


?>
