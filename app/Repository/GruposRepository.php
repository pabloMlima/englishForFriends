<?php

namespace App\Repository;
use App\LoginModel;
use App\FrasesModel;

class GruposRepository {

    public function __construct(LoginModel $loginModel, FrasesModel $frasesModel){
        $this->loginModel = $loginModel;
        $this->frasesModel = $frasesModel;
    }


}


?>
