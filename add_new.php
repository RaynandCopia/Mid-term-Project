<?php
 include "db_conn.php";
 
if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) 
    VALUES (NULL,'[$first_name]','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=New record created successfully");
    }
    else {
echo "Failed: " . mysqli_error($conn);
    }

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/ 6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="crossorigin="anonymous" referrerpolicy="no-referrer" />
     
    <title>Final Output CrudApp</title>

</head>
<style>
    body{
        height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  
 
    }
    h3, p {
        border: solid, 5px;
        border-radius: 10px;
        background-color: #bfc2d2;
        margin-left: 500px;
        margin-right: 500px;     

    }
   
  img{
    width: 50px;
        height:50px;
        margin: none;
        padding: none;
       border-radius: 200px;
            margin-left: none;
            
  }
</style>

<body background="1234.jpg">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: violet">
        PHP CrudApp
        <img src="CPSU.jpg" alt="CPSU">
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add User</h3>
<p class="">Complete the form below to add user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" 
                        placeholder="First Name" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" 
                        placeholder="Last Name" required>
                    </div>
                </div>
                
                <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" 
                        placeholder="Name@Email.com" required>
                    </div>
                    <div class="font-group mb-3">
                        <label >Gender:</label> &nbsp;
                        <input type="radio" class="from-check-input" name="gender" 
                        id="male" value="male">
                        <label for="male" class="form-input-label">Male</label>

                &nbsp;
                        <input type="radio" class="from-check-input" name="gender" 
                        id="female" value="female">
                        <label for="female" class="form-input-label">Famale</label>
                    </div>

                
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>





   <!--Bootstrap-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html> 
