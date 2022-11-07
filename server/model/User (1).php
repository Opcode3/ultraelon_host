<?php

namespace app\product;

use app\config\DatabaseHandler;
use app\dto\Response;

    class Product{

        private $dbconnector = null;
        private $table_name = 'products';

        function __construct(DatabaseHandler $databaseHandler)
        {
            $this->dbconnector = $databaseHandler->connection();
        }

        // set a product

        function setProduct(array $new_product){

            if( $this->isProductExisting($new_product["name"], $new_product["userid"]) ) return true;

            $new_product["slug"] = $this->generateSlug();
            $sql = "INSERT INTO $this->table_name(slug, name, categoryid, brand, size, colour, userid, price, oldprice, images, content) 
            VALUES(:slug, :name, :categoryid, :brand, :size, :colour, :userid, :price, :oldprice, :images, :content)";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->execute($new_product);
            if($stmt->rowCount() == 1){
                return $this->getProductBySlug($new_product["slug"]);
            }

            return false;
        }


        private function isProductExisting($name, $userId){
            $sql = "SELECT slug FROM $this->table_name WHERE name = ? AND userid=?"; 
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->execute([$name, $userId]);
            return $stmt->rowCount() != 0;
        }

        private function generateSlug(): string{
            return uniqid(time());
        }

        // get all products
        function getProducts(){
            $sql = "SELECT * FROM $this->table_name";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute([]);
            return $stmt->fetchAll();
        }


        // get product by slug id
        function getProduct(string $slug){
            $sql = "SELECT * FROM $this->table_name WHERE slug=?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute([$slug]);
            return $stmt->fetch();
        }

        // get product by user id
        function getProductByUser($userId){
            $sql = "SELECT * FROM $this->table_name WHERE userid=?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        }

        // get product by slug
        function getProductBySlug(string $slug){
            $sql = "SELECT * FROM $this->table_name WHERE slug=?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute([$slug]);
            return $stmt->fetch();
        }

        // delete product
        function deleteProduct($id){
            try {
                $sql = "delete FROM $this->table_name WHERE id=?";
                $stmt = $this->dbconnector->prepare($sql);
                $stmt->execute([$id]);
                return "product deletion was successful!";
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }

        // update product by id

        // get product by other parameters




        // private methods

        

        // managed saved products
        // get all products
        function getSavedProducts($userId){
            $sql = "SELECT choices.*, $this->table_name.name, $this->table_name.slug,
            $this->table_name.price, $this->table_name.images FROM choices LEFT JOIN 
            $this->table_name ON $this->table_name.id = choices.productid WHERE userid=?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            $stmt->execute([$userId]);
            return $stmt->fetchAll();
        }

        function setSavedProduct($userId, $productId): bool{
            if($this->getExistingChoice($userId, $productId)){
                $sql = "INSERT INTO choices(userid, productid) VALUES(?,?)";
                $stmt = $this->dbconnector->prepare($sql);
                $stmt->execute([$userId, $productId]);
                return $stmt->rowCount() == 1;
            }
            return false;
        }

        private function getExistingChoice($userId, $productId): bool{
            $sql = "SELECT id FROM choices WHERE userid=? AND productid=?";
            $stmt = $this->dbconnector->prepare($sql);
            $stmt->execute([$userId, $productId]);
            return $stmt->rowCount() == 0;
        }

    }

?>
