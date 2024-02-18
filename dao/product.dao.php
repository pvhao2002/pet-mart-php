<?php
require_once('db.php');
class ProductDAO
{
    private static $instance = NULl;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ProductDAO();
        }
        return self::$instance;
    }

    public function getAll()
    {
        $sql = "SELECT p.*, c.category_name
                FROM products p
                    INNER JOIN categories c ON c.category_id = p.category_id
                WHERE p.status = 'ACTIVE'
                ";
        $db = DB::getInstance();
        $req = $db->query($sql);
        $list = [];
        foreach ($req->fetchAll() as $item) {
            $list[] = Product::fromResultSet($item);
        }
        return $list;
    }

    public function getById($id)
    {
        $sql = "SELECT p.*, c.category_name
                FROM products p
                    INNER JOIN categories c ON c.category_id = p.category_id
                WHERE p.status = 'ACTIVE' AND p.product_id = $id
                ";
        $db = DB::getInstance();
        $req = $db->query($sql);
        $item = $req->fetch();
        return Product::fromResultSet($item);
    }

    public function add($sql)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->execute();
    }
}