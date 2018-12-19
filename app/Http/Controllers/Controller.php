<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    var $model;

    public function renderView($strView) {
        $this->model['csrfToken'] = csrf_token();

        if (!empty($strView) && view()->exists($strView)) {
            return view($strView, $this->model);
        }

        abort(500);
    }

    public function renderJson($data = [], $code = 200) {
        if ($code == 401) {
            $this->model['user'] = null;
        }

        $this->model['data'] = $data;
        $this->model['csrfToken'] = csrf_token();
        return response()->json($this->model, $code);
    }

}
