<?php 

    include("config.php");

    $c1 = new Config();

    $res = $c1->fetch();




    $is_btn_set = isset($_POST['button']);

    if($is_btn_set)
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $phone = $_POST['phone'];

        $c1->insert($name,$age,$course,$phone);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }


    if(isset($_POST['delete']))
    {
        $id = $_POST['deleteId'];
        $c1->delete($id);
      
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-box {
            border: 2px solid #f5c6cb;
            padding: 20px;
            border-radius: 8px;
            background-color: #f8d7da;
        }

        .table-box {
            border: 2px solid #f5c6cb;  
            border-radius: 8px;
            background-color: #f8d7da;
            padding: 20px;
        }

        .heading {
          border: 2px solid #f5c6cb;
            background-color: #f8d7da; 
            color: red;              
            padding: 10px;
            text-align: center;
            border-radius: 8px;
        }
    </style>

  </head>
<body>
<div class="mx-auto p-2" style="width: 450px;">
    <h1 class="heading">Red & White Premier League🏏<br> Register Form   </h1>
    

    <div class="form-box">
    <form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Enter Your Full Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label">Enter Your Age</label>
    <input type="number" class="form-control" id="age" name="age">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Enter Your Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="phone">
  </div>
  <div class="mb-3">
    <label for="course" class="form-label">Enter Your Course</label>
    <input type="text" class="form-control" id="course" name="course">
  </div>
  
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
  </div>
</div>

<hr>
<div class="mx-auto p-2" style="width: 700px;">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Student Name</th>
      <th scope="col">Age</th>
      <th scope="col">Course</th>
      <th scope="col">Phone</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    <?php while($data = mysqli_fetch_assoc($res)){ ?>
    <tr>
      <th scope="row"><?php echo $data['id'] ?></th>
      <td><?php echo $data['name'] ?></td>
      <td><?php echo $data['age'] ?></td>
      <td><?php echo $data['course'] ?></td>
      <td><?php echo $data['phone'] ?></td>
      <td>
        <form method="POST">
          <input type="hidden" value="<?php echo $data['id'] ?>" name="deleteId">
          <button type="button" class="btn btn-warning">Update</button>
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
        </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



</body>
</html>
