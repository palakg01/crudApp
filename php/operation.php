<?php

require_once("db.php");
require_once("component.php");

$con = createDB();

//create button click event
if(isset($_POST['create'])){
  createData();
}

//update btn
if(isset($_POST['update'])){
  updateDbData();
}

//delete btn
if(isset($_POST['delete'])){
  deleteData();
}


//insert data from frontend to db
function createData(){
  $bookname = textboxValue(value:"title"); //title is the name of that textbox
  $author = textboxValue(value:"author");
  $price = textboxValue(value:"price");

  if($bookname && $author && $price){

    $query = "INSERT INTO books(book_name,book_author,book_price)
              VALUES('$bookname','$author','$price')
    ";

    if(mysqli_query($GLOBALS['con'],$query)){
      alerts(msg:"Record Stored Successfully!",class:"bg-success");
    }else{
      alerts(msg:"Error in inserting data",class:"bg-danger");
       
    }

  }else{
    alerts(msg:"Please fill all the fields",class:"bg-info");
  }
}


//validate the vals of the textbox we fetched in createData function and also apply security
function textboxValue($value){

  //global var con cant use directly, trim is use to avoid sql injection
  $textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));

  if(empty($textbox)){
    return false;
  }else{
    return $textbox; 
  }
}

//get dat from db and display it in the table
function getData(){
  $sql = "SELECT * FROM books";

  $result =  mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)>0){
      return $result;
    }

}

//update db data
function updateDbData(){

  $id=textboxValue(value:"id");
  $bookname = textboxValue(value:"title"); 
  $author = textboxValue(value:"author");
  $price = textboxValue(value:"price");

  if($bookname && $price && $author){
    $query="
            UPDATE books SET book_name='$bookname',book_author='$author',book_price='$price' WHERE id='$id'
    ";

    if(mysqli_query($GLOBALS['con'],$query)){
      alerts(msg:"Record updated successfully!",class:"bg-success");
    }else{
      alerts(msg:"Error in updating records. Try again later",class:"bg-danger");
    }

  }else{
    alerts(msg:"Fill all fields",class:"bg-info");
  }

}


//deletedata
function deleteData(){
  $deleteID = textboxValue(value:"id");

  $query="
    DELETE FROM books WHERE id=$deleteID";

  if(mysqli_query($GLOBALS['con'],$query)){
    alerts(msg:"Record deleted successfully",class:"bg-success");
  }else{
    alerts(msg:"Please select a record by clicking on the edit icon of the record",class:"bg-danger text-light");
  }

}


// messages custom styles
function alerts($msg,$class){
  $element = "
    <h6 class='$class text-center p-2'>$msg</h6>
  ";
echo $element;
}

?>


