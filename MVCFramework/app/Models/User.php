<?php

class User{
    
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    // Tüm kullanıcıları çekiyoruz.
    public function getUsers()
    {
        $this->db->query("SELECT * FROM tblUsers");
        $result = $this->db->resultSet();

        return $result;
    }

    public function userRegister($data)
    {
        //SQL sorgumuzu yazıyoruz.
        $this->db->query('INSERT INTO tblUsers (username, email, password)
        VALUES (:username, :email, :password)');

        //Parametreler ile birbirine bağlıyoruz.
        $this->db->bind(':username' , $data['username']);
        $this->db->bind(':email' , $data['email']);
        $this->db->bind(':password' , $data['password']);

        if($this->db->execute())
            return true;
        else
            return false;
    }

    public  function userLogin($username, $password)
    {
        //SQL sorgumuzu yazıyoruz.
        $this->db->query("SELECT * FROM tblUsers WHERE username = :username");

        //Parametreleri eşliyoruz.
        $this->db->bind(':username',$username);

        //Tek bir satırlık veri çekeceğimiz için singleRow function'ını kullandık.
        $row = $this->db->singleRow();
        
        //Şifrelenmiş parolayı databaseden çekip değişkene aktarıyoruz.
        $hashedPassword = $row->password;

        if(password_verify($password , $hashedPassword)) //Parolaların eşleşmesini sorguladık
            return $row;
        else
            return false;
    }
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM tblUsers WHERE email = :email');

        //:email ile parametreyi birbirine bağlıyoruz.
        $this->db->bind(':email',$email);

        //Emailin önceden alınıp alınmadığını kontrol ediyoruz.
        if($this->db->rowCount() < 0)
            return true;
        else
            return false;
    }
}