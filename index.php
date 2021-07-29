<?php
  require_once("./php/component.php");
  require_once("./php/operation.php");
  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

  <link rel="stylesheet" href="style.css" />
    <title>Book Store</title>
  </head>
  <body>


    <h1 class="text-center py-4 text-info">
      <i class="fas fa-book-reader text-dark px-3"></i> Book Store
    </h1>

    <div class="d-flex justify-content-center">
      <form action="" method="POST" class=" book-form">

        <div class="input-group mb-3">
          <?php formElement(icon:"<i class=\"fas fa-id-badge\"></i>",placeholder:"Book ID",name:"id",value:"",attr:"") ?>
        </div>
        <div class="input-group mb-3">
          <?php formElement(icon:"<i class=\"fas fa-book\"></i>",placeholder:"Book Title",name:"title",value:"",attr:"") ?>
        </div>
        <div class="row">
          <div class="col">
            <div class="input-group mb-3">
              <?php formElement(icon:"<i class=\"fas fa-people-carry\"></i>",placeholder:"Book Author",name:"author",value:"",attr:"") ?>
            </div>
          </div>
          <div class="col">
            <div class="input-group mb-3">
              <?php formElement(icon:"<i class=\"fas fa-dollar-sign\"></i>",placeholder:"Book Price",name:"price",value:"",attr:"") ?>
            </div>
          </div>  
        </div>

        <div class="btn-container p-2 d-flex justify-content-between">

          <div>
            <?php btnElement(btnid:"read",class:"bg-info",icon:"Show Records",name:"read") ?>
          </div>

          <div>
            <?php btnElement(btnid:"create",class:"bg-success",icon:"<i class=\"fas fa-plus\"></i>",name:"create") ?>

            <?php btnElement(btnid:"update",class:"bg-secondary",icon:"<i class=\"fas fa-pen\"></i>",name:"update") ?>

            <?php btnElement(btnid:"delete",class:"bg-danger",icon:"<i class=\"fas fa-trash\"></i>",name:"delete") ?>    
          </div>    
        </div>

      </form>
    </div>
  <div class="table-container d-flex justify-content-center mt-5">
    <table class="table table-striped border"  style="width:70%;">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Book Name</th>
          <th scope="col">Author</th>
          <th scope="col">Price</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody id="tbody">
        
        <?php
          if(isset($_POST['read'])){
            $result = getData();

            if($result){
              while($row=mysqli_fetch_assoc($result)){?>
                
              <tr>
                <td  class="td-row" data-id="<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
                <td  class="td-row" data-id="<?php echo $row['id'];?>"><?php echo $row['book_name']; ?></td>
                <td  class="td-row" data-id="<?php echo $row['id'];?>"><?php echo $row['book_author']; ?></td>
                <td  class="td-row" data-id="<?php echo $row['id'];?>"><?php echo '$'.$row['book_price']; ?></td>
                <td class='btnedit'><i class='fas fa-edit td-row' data-id="<?php echo $row['id'];?>"></i></td>
              </tr>

              <?php
              }
            }
          }
        ?>        
      </tbody>
    </table>
</div>  
  


    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <script src="./php/main.js"></script>
          

  </body>
</html>
