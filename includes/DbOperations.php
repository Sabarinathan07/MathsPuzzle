<?php
session_start();
class DbOperations
{

    public $con;

    function __construct()
    {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->con = $db->connect();
    }

    public function createUserPlayer($name, $email, $password)
    {
        if ($this->isPlayerExist($email)) {
            return 0;
        } else {
            $_SESSION["NAME"] = $name;
            $stmt = $this->con->prepare("INSERT INTO `user`(`id`, `name`, `email`, `password`) VALUES (NULL, ?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $password);

            if ($stmt->execute()) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    public function playerLogin($email, $password)
    {
        $query = "SELECT id FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {


            $records = mysqli_query($this->con, "SELECT name from user WHERE email = '$email'"); // fetch data from database

            while ($data = mysqli_fetch_array($records)){
                $_SESSION["NAME"] = $data['name'];
            }

            //echo $_SESSION['NAME'];

            return 1;
        } else {
            return 2;
        }
    }

    public function updateScore($puzzle_id, $score)
    {
        // echo "db worked";
        $name = $_SESSION["NAME"];
        echo $_SESSION['NAME'];

        $sql = "INSERT INTO `score`(`id`, `puzzle_id`, `name`, `score`) VALUES (NULL,'$puzzle_id','$name', '$score')";

        mysqli_query($this->con, $sql);
    }


    private function isPlayerExist($email)
    {
        $stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
}
