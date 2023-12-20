<?php

class Category extends DB implements Rules
{

    private $id;
    private $name;
    private $created_at;
    private $parent_id;

    const table = "categories";

    public function __construct()
    {
        parent::__construct(self::table);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    public function getParentId()
    {
        return $this->parent_id;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function get()
    {
        $category = $this->selectOne($this->id);
        $this->id = $category->id;
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
        $this->created_at = $category->created_at;

        return $this;

    }

    public function save()
    {

        if ($this->parent_id) {
            $data = [
                "name" => $this->name,
                "parent_id" => $this->parent_id
            ];

        } else {
            $data = [
                "name" => $this->name
            ];
        }

        return $this->insertRow($data);
    }

    public function all()
    {
        $categories = $this->selectAll();
        $results = [];

        foreach ($categories as $category) {
            $c = new self();
            $c->setId($category->id);
            $c->get();
            $results[] = $c;
        }

        return $results;
    }

    public function delete()
    {
        return $this->deleteRow($this->id);
    }

    public function update()
    {

        if ($this->parent_id) {
            $data = [
                "name" => $this->name,
                "parent_id" => $this->parent_id
            ];

        } else {
            $data = [
                "name" => $this->name
            ];
        }

        return $this->updateRow($data, $this->id);

    }

    public function getTree($categories)
    {
        foreach ($categories as $category) {
            if ($category->parent_id === null) {
                echo '<ul>';
                echo '<li><a href="categories.php?id='. $category->getId(). '">' . $category->getName() . '</a></li>';
                $this->getList($category);
                echo '</ul>';
            }
        }
    }

    public function getList($category)
    {
        $categories = $this->getCategories($category);

        foreach ($categories as $category) {
            echo '<ul>';
            echo '<li><a href="categories.php?id='. $category->getId(). '">' . $category->getName() . '</a></li>';
            $this->getList($category);
            echo '</ul>';
        }
    }

    public function getCategories($category)
    {
        $categories = [];
        $result = $this->conn->query("SELECT * FROM categories WHERE parent_id = $category->id");
        while ($category = $result->fetch_object()) {
            $c = new self();
            $c->setId($category->id);
            $c->get();
            $categories[] = $c;
        }

        return $categories;
    }
}