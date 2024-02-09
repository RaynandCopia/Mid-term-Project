
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
    
    <title>Final Output CrudApp</title>

</head>
<style>
  body {
    height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  }
  img{
    width: 50px;
        height:50px;
        margin: none;
        padding: none;
       border-radius: 200px;
            margin-left: none;
            
  }
  nav{
font-size: 20px;

  }
  .navbar{
    font-size: 25px;
    background-color: white ;
    border: 10px;
  }
</style>

<body background="123.jpg">
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: violet">
        PHP Crud Website 
         <img src="CPSU.jpg" alt="CPSU">
<nav clas="nav" >
       <form action="" method="post">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" name="submit_search">Search</button>
</form>
<?php
include "db_conn.php";

if(isset($_POST['submit_search'])) {
  $search = $_POST['search'];
  $sql = "SELECT * FROM `crud` WHERE `first_name` LIKE '%$search%' OR `last_name` LIKE '%$search%'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "First Name: " . $row['first_name'] . "<br>";
      echo "Last Name: " . $row['last_name'] . "<br><br>";
    }
  } else {
    echo "No results found for '$search'.";
  }
}
?>

</nav>
    </nav>

     

    <div class="container">
      <?php
      if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
       <a href="about.php" class="btn btn-dark mb-3" >About</a>

        <table class="table table-hover text-center " style="background-color: violet">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    
    <?php
    include "db_conn.php";
    

    ?>
    

<?php
   $results_per_page = 5;


$sql = "SELECT * FROM crud";
$result = $conn->query($sql);
$num_of_results = $result->num_rows;


$num_of_pages = ceil($num_of_results / $results_per_page);


if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}


$this_page_first_result = ($page - 1) * $results_per_page;


$sql = "SELECT * FROM crud LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = $conn->query($sql);

echo "<ul>";
while ($row = $result->fetch_assoc()) {
  ?>
  <tr>
  <td><?php echo $row['id'] ?></td>
  <td><?php echo $row['first_name'] ?></td>
  <td><?php echo $row['last_name'] ?></td>
  <td><?php echo $row['email'] ?></td>
  <td><?php echo $row['gender'] ?></td>
  <td>
    <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
    <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
  </td>

</tr> 

<?php
}
?>
<div class="navbar justify-content-center">
  <p> Page
<?php



for ($page = 1; $page <= $num_of_pages; $page++) {
  
    echo '<a href="index.php?page=' . $page . '"> ' . $page . '</a> ';
}

$conn->close();



?>
</p>
</div>

    
    
  </tbody>
</table>
    </div>




   <!--Bootstrap-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>