<?php

function createDB(){
  $hostname="localhost";
  $username="root";
  $password="";
  $dbname="bookstore";

  //create connection bw php script and sql
  $con = mysqli_connect($hostname,$username,$password);

  //check connection
  if(!$con){
    die("Connection Failed: ".mysqli_connect_error());
  }

  //create db-> write query
  $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

  if(mysqli_query($con,$sql)){
    //for using the created database
    $con = mysqli_connect($hostname,$username,$password,$dbname);

    //writing query to create table

    $sql = "
      CREATE TABLE IF NOT EXISTS books(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        book_name VARCHAR(25) NOT NULL,
        book_author VARCHAR(20),
        book_price FLOAT
      );
    ";

    if(mysqli_query($con,$sql)){
      return $con;
    }else{
      echo "Error in Creating table";
    }

  }
  else{
    echo "db not created: ".mysqli_connect_error($con);
  }


}

?>