<?php
require_once 'Database.php';

class MenuController
{
    public $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //CRUD

    public function readData()
    {
        $query = $this->db->pdo->query('SELECT * from users');

        return $query->fetchAll();
    }

    public function insert($request)
    {
        $query = $this->db->pdo->prepare('INSERT INTO users (username, email, password)
        VALUES (:username, :email, :password)');

        $query->bindParam(':username', $request['username']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $request['password']);
        //$query->bindParam(':role', $request['role']);
        $query->execute();

        return header('Location: accounts.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * from users WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch();
    }

    public function update($request, $id)
    {
        $query = $this->db->pdo->prepare('UPDATE users SET username = :username,
        email = :email, password = :password WHERE id = :id');
        $query->bindParam(':username', $request['username']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $request['password']);
        //$query->bindParam(':role', $request['role']);
        $query->bindParam(':id', $id);
        $query->execute();

    }

    public function delete($id)
    {
        $query = $this->db->pdo->prepare('DELETE from users WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();

        return header("Location: accounts.php");
    }
}
