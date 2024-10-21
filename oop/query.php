<?php

class crud extends Koneksi
{
    public function lihatData()
    {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT INTO user_detail(user_email, user_password, user_fullname, level) VALUES(:email, :pass, :name, 4)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            return $result->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getDataByEmail($email)
    {
        try {
            $sql = "SELECT * FROM user_detail WHERE user_email = :email";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->execute();

            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
