<?php

namespace Application\Models;

class Category
{
    // соединение с БД и таблицей "categories"
    private $conn;
    private $table_name = "categories";

    // свойства объекта
    public int $id;
    public string $name;
    public string $description;
    public string $created;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    // метод для получения всех категорий товаров
    public function read()
    {
        $query = "SELECT
                id, name, description
            FROM
                " . $this->table_name . "
            ORDER BY
                name";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}