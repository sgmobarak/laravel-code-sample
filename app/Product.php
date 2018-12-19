<?php

namespace App;

class Product {

    const DATA_SOURCE_PATH = "data/products.json";

    public $products;

    public function __construct() {
        $this->products = collect([]);
        $items = collect(json_decode(file_get_contents(self::getDataPath()), true));
        $this->products = $items;
    }

    public static function getDataPath() {
        return base_path(self::DATA_SOURCE_PATH);
    }

    public function get_products() {
        return $this->products;
    }

    public function add_product($itm) {
        $dt = \Carbon\Carbon::now();
        $itm["timestamp"] = $dt->timestamp;
        $itm["formattedDate"] = $dt->format(\DateTime::ATOM);
        $itm["total"] = (int) $itm['stock'] * (double) $itm["price"];

        $this->products->push($itm);
        $jsondata = $this->products->toJson();
        file_put_contents(self::getDataPath(), $jsondata);
    }

}
