<?php
include("conn.php");
class user
{
    private $db;
    private $email;
    private $mdp;



    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function newuser($name, $email, $password)
    {
        echo $password;
        if (empty($name) || empty($email) || empty($password)) {
            echo "empty";
        } else {
            $sql = "INSERT INTO users (`user_name`, `user_email`, `user_password`) values(:name , :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                return true;
            }
        }
    }
    public function role($role_id, $user_id)
    {
        try {
            $sql = $this->db->prepare("UPDATE users SET role_id = ? WHERE user_id = ?");
            $sql->execute([$role_id, $user_id]);



            return true;
        } catch (PDOException $e) {

            return false;
        }
    }


    

  

    function get_user_id($email)
    {
        $req = "SELECT user_id FROM users WHERE user_email = '$email'";
        $stmt = $this->db->query($req);

        $result = $stmt->fetch();

        $user_id = $result['user_id'];
        return $user_id;
    }   
    
    /// SETTERS **
    public function set_email($email){
        $this->email = $email;
    }
    public function set_mdp($mdp){
        $this->mdp = $mdp;
    }
                 

    public function userLogin(){
        $sql = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt;
    }
}

?>