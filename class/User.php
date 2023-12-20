<?php

/**
 *
 */
class User extends DB implements Rules
{
    //  [private /  public / protected]
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $image;
    private $role_id;
    private $password;
    public $table = "users";

    public static $name = "This is User  Class";


    public function __construct()
    {
        parent::__construct($this->table);
    }

    public static function tableName()
    {
        return "user";
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * @param mixed $role_id
     */
    public function setRoleId($role_id): void
    {
        $this->role_id = $role_id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }


    public function get()
    {
        $user =  $this->selectOne($this->id);

        $this->setFirstName($user->first_name);
        $this->setLastName($user->last_name);
        $this->setEmail($user->email);
        $this->setPassword($user->password);
        $this->setRoleId($user->role_id);
        $this->setImage($user->image);

        return $this;

    }

    public function save()
    {
        $data = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image,
            "role_id" => $this->role_id
        ];

        return $this->insertRow($data);
    }

    public function update()
    {
        $data = [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "password" => $this->password,
            "image" => $this->image,
            "role_id" => $this->role_id
        ];

        return $this->updateRow($data, $this->id);
    }


    public function delete()
    {
        return $this->deleteRow($this->id);
    }

    public function all()
    {
         $users =  $this->selectAll();
         $result = [];
         foreach($users as $user)
         {
             $result[] = [
                 "id" => $user->id,
                 "first_name" => $user->first_name,
                 "last_name" => $user->last_name,
                 "email" => $user->email,
                 "password" => $user->password,
                 "image" => $user->image,
                 "role_id" => $user->role_id
             ];

         }

         return $result;

    }



}