<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;

class Json extends Controller {

    public function getProducts() {
        $items = collect([]);
        try {
            $model = new Product;
            $items = $model->get_products();
            $items = $items->all();
        } catch (\Exception $e) {
            return $this->renderJson([$e->getMessage()], 500);
        }

        $this->model['items'] = $items;
        return $this->renderJson();
    }

    public function getSaveProduct() {
        try {
            $model = new Product;

            $itm = [];
            $itm["title"] = request('title');
            $itm["stock"] = (int) request('stock');
            $itm["price"] = (double) request('unitPrice');

            $model->add_product($itm);
        } catch (\Exception $e) {
            return $this->renderJson([$e->getMessage()], 500);
        }
        return $this->renderJson();
    }

}
