<?php
    include 'config.php';

class database{
    public $dbhost = db_host;
    public $dbuser = db_user;
    public $dbpass = db_pass;
    public $dbname = db_name;

    public $link;
    public $error;

function __construct(){
    $this->connectDb();
}

private function connectDb(){
    $this->link = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
    if(!$this->link){
        $this->error = "Connenction failed!" . $this->link->connect_error;
        return false;
    }
}

public function select($query){
    $result  = $this->link->query($query) or die ($this->link->error . __LINE__);
    if($result->num_rows > 0){
        return $result;
    }else{
        return false;
    }
}

public function insert($query){
    $insert_row = $this->link->query($query) or die ($this->link->error . __LINE__);
    if($insert_row){
        header("Location: index.php?msg=".urlencode('Data Inserted Successfully!'));
    } else {
        die("Insertion failed!");
    }

}

public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if($update_row){
        header("Location: index.php?msg=".urlencode('Data Updated Successfully!'));
    } else{
        die("Update Failed!");
    }
}

public function delete($query){
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($delete_row){
        header("Location: index.php?msg=".urlencode("Data Deleted Successfully!"));
    } else {
        die("failed!");
    }
}

}