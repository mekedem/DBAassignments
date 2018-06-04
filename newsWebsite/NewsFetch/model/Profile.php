<?php

include("../util/Connection.php");

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

class Profile{

    function __construct($usrname, $password){
        $this->usrname=$usrname;
        $this->password=$password;
    }

    private $usrname = null;
    private $password = null;

    public function register(){

        $query1 = "SELECT * FROM userprofile WHERE usrname='$this->usrname' OR password='$this->password'";
        $check = Connection::query($query1);
        $count_row = $check->num_rows;

        if ($count_row == 0){

        $query = "insert into userprofile values('".$this->usrname."', '".$this->password."')";
        Connection::query($query);
        return true;
        }
			else { return false;}
    }
    public function login(){
        $query1 = "SELECT * FROM userprofile WHERE usrname='$this->usrname' AND password='$this->password'";
        $check = Connection::query($query1);
        $count_row = $check->num_rows;

        if ($count_row == 0){
            return false;
        }
		else {
            return true;
        }
    }

    public function savepic($imago,$description){
        $target = "imagess/".basename($_FILES['uphoto']['description']);
        $query2 = "INSERT INTO images (img,description) VALUES ('$imago','$description')";

        Connection::query($query2);

        if(move_uploaded_file($_FILES('tmp_name','description'),$target)){
            return true;
        }
        else{
            return false;
        }
    }

    static public function uploadpar($title,$description,$date){
          $id = 0;
          $query = "insert into blogpost values('".$id."', '".$title."', '".$description."', '".$date."')";
          Connection::query($query);
    }

    static public function downloadpar(){
        // SELECT * FROM table1 ORDER BY id DESC LIMIT 3
        $query1 = "SELECT * FROM blogpost ORDER BY id DESC LIMIT 5";
        // $query2 = "SELECT * FROM blogpost ORDER BY id DESC LIMIT 2";
        // $query3 = "SELECT * FROM blogpost ORDER BY id DESC LIMIT ";
        // $query1 = "SELECT * FROM blogpost";
        $result = Connection::query($query1);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<thetitle> <strong>" . $row["title"]. "</strong> </thetitle> <br> </t> " . $row["description"]. "<br><br> <thedate>".$row["date"]."</thedate><br>";
            }
        }
        else {
            echo "no new posts ";
    }

    }

        static public function downloadparrec(){
            $query2 = "SELECT * FROM blogpost LIMIT 4";
            $result2 = Connection::query($query2);

if ($result2->num_rows > 1) {
            while($row = $result2->fetch_assoc()) {
                echo "<a> <h4>" . $row["title"]. "</h4> </a> <br> <p> " . $row["description"]. "</p>";
            }
        }
        else {
            echo "no recent posts ";
    }
    //     else {
    //         echo "no new posts ";
    // }


    }

}

?>