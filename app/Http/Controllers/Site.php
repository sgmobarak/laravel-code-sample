<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;

class Site extends Controller {

    public function getHome() {
        $this->model['title'] = "Products";
        return $this->renderView('home');
    }


}
