<?php

namespace App\Http\Controllers;


class APIController extends Controller {

    public function simpleArray() {
        return ["name"=>"bob", "from"=>"simpleArray"];
    }

    public function responseObject() {
        return response()->json(["name"=>"bob", "from"=>"responseObject"]);
    }

}
