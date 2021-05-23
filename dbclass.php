<?php
class Database{
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'jl';
    protected $_db_connect;
    protected $_sql;
    protected $_result;
    protected $_row;

    function db_connect(){
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }

    function slect_db(){
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }

    function sql($query){
        $this->_sql =$query;
    }

    function query(){
        $this->_result = mysql_query($this->_sql);
        }
    function insert_reg($name,$email,$password,$address,$user){
    $sql = "INSERT into reg set name = '".$name."',email = '".$email."',password = '".$password."',address = '".$address."',user_type = '".$user."'";
    $result = mysql_query($sql);
    return true;
}

    function fetch_array_user(){
        while($this->_row = mysql_fetch_array($this->_result)){
             $user_id = $this->_row['user_id'];
            $name = $this->_row['name'];
            $email = $this->_row['email'];
            $password = $this->_row['password'];
            $address = $this->_row['address'];
            echo "<tr>";
            echo "<td>";
            echo $user_id;
            echo "</td>";
            echo "<td>";
            echo $name;
            echo "</td>";
            echo "<td>";
            echo $email;
            echo "</td>";
            echo "<td>";
            echo $password;
            echo "</td>";
            echo "<td>";
            echo $address;
            echo "</td>";
            echo "<td>";
            echo '<a href="delete.php?action=delete & id='.$this->_row['user_id'].'" class="btn btn-danger">delete</a>';
            echo "</td>";
            echo "</tr>";
    }
}
function db_close(){
        mysql_close($this->_db_connect);
    }
}
?>