<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    //protected PDO $pdo;
    const TABLE = 'user';

    public function selectOneByEmail(string $email)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE email=:email");
        $statement->bindValue('email', $email, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

    public function insert(array $credentials): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . static::TABLE .
            " (`email`, `password`, `pseudo`, `firstname`, `lastname`, `city`)
        VALUES (:email, :password, :pseudo, :firstname, :lastname, :city)");
        $statement->bindValue(':email', $credentials['email']);
        $statement->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':pseudo', $credentials['pseudo']);
        $statement->bindValue(':firstname', $credentials['firstname']);
        $statement->bindValue(':lastname', $credentials['lastname']);
        $statement->bindValue(':city', $credentials['city']);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(int $id, array $credentials): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . static::TABLE . "
            SET email = :email, password = :password, pseudo = :pseudo, firstname = :firstname, lastname = :lastname, city = :city
            WHERE id = :id");
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->bindValue(':email', $credentials['email']);
        $statement->bindValue(':password', password_hash($credentials['password'], PASSWORD_DEFAULT));
        $statement->bindValue(':pseudo', $credentials['pseudo']);
        $statement->bindValue(':firstname', $credentials['firstname']);
        $statement->bindValue(':lastname', $credentials['lastname']);
        $statement->bindValue(':city', $credentials['city']);
        return $statement->execute();
    }
}
