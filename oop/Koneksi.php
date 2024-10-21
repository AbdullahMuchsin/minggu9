<?php

class Koneksi
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $db = "acara13";
    protected $koneksi;

    public function __construct()
    {
        try {
            $this->koneksi = new PDO("mysql:host=$this->host; dbname=$this->db", $this->user, $this->pass);
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->koneksi;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
