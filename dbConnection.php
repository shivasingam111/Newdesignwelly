<?php

class Database
{
    
    // DB configs to work locally
    private static $user = 'root';
    private static $password = '';
    private static $dbname = 'wellytails';
    private static $dsn = 'mysql:host=localhost;dbname=wellytails';

    private static $dbcon;

    private function __construct()
    {
    }

    //get pdo connection
    public static function getDb()
    {
        if (!isset(self::$dbcon)) {

            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                
                exit();

            }
        }
        return self::$dbcon;
    }
    public static function connectDB(){
        if(!isset(self::$dbcon)){
            try {
                self::$dbcon = new PDO(self::$dsn, self::$user, self::$password);
                self::$dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                $msg = $e->getMessage();
                echo $msg;
            }
        }
        return self::$dbcon;
    }
    public static function checkUserCreds($email, $password){
        $users = self::$dbcon->prepare("SELECT * FROM users");
        $users->execute();
        $users = $users->fetchAll();
        foreach($users as $user){
            if($user->email == $email and password_verify($password, $user->password))
                return $user;
        }
        return null;
    }

    public static function registerUser($fname, $lname, $email, $password){
        $query = 'INSERT INTO users (fname, lname, email, password, isAdmin)
                    VALUES (?,?,?,?,?);';
        $newUser = self::$dbcon->prepare($query);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $newUser->execute([$fname, $lname, $email, $password, 0]);
        if($newUser)
            return self::$dbcon->lastInsertId();
        
        return false;
    }

    
}
?>