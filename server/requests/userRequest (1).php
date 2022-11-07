<?php

//     namespace app\product;

// use app\helper\Validation;

//     class ProductData implements ProductDataInterface{

//         private $productData = [];

//         function __construct(array $productInfo)
//         {
//             // prepare product data for query
//             if(
//                 count($productInfo) == 10 &&
//                 Validation::isSize($productInfo["product_name"], 3) &&
//                 Validation::isSize($productInfo["category_id"], 1) &&
//                 Validation::isSize($productInfo["product_images"], 9) &&
//                 Validation::isSize($productInfo["product_desc"], 0) &&
//                 Validation::isSize($productInfo["user_id"], 1)
//             ){
//                 $this->productData["name"] = $productInfo["product_name"];
//                 $this->productData["categoryid"] = (int) $productInfo["category_id"];
//                 $this->productData["brand"] = $productInfo["product_brand"];
//                 $this->productData["size"] = $productInfo["product_size"];
//                 $this->productData["colour"] = $productInfo["product_colour"];
//                 $this->productData["userid"] = (int) $productInfo["user_id"];
//                 $this->productData["price"] = $productInfo["product_price"];
//                 $this->productData["oldprice"] = $productInfo["product_old_price"];
//                 $this->productData["images"] = $productInfo["product_images"];
//                 $this->productData["content"] = $productInfo["product_desc"];
//             }
//         }

//         function get():array { return $this->productData;}

//     }

?>