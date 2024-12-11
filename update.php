<?php

session_start();
include("config.php");
$c1 = new Config();

$id = $_SESSION['id'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$phone = $_SESSION['phone'];
$course = $_SESSION['course'];


if(isset($_POST['button']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];


    $c1->update($id,$name,$age,$course,$phone);
    header("Location: index.php");
    exit();
}


?>



<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-container {
            background-image: url('https://static.vecteezy.com/system/resources/previews/023/392/348/non_2x/cricket-league-concept-with-cartoon-cricketer-players-in-action-pose-on-white-and-red-ball-background-vector.jpg');
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            width: 500px;
            height: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .form-box {
            background-color: rgba(254, 254, 254, 0.7);
            padding: 20px;
            width: 500px;
            height: 500px;
            border-radius: 8px;
            border: none;
        }

        .heading {
            color: black;
            height: 80px;
            text-align: center;
            padding: 10px;
            font-size: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.9);
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .table-box {
            border: 2px solid #f5c6cb;  
            border-radius: 8px;
            background-color: #f8d7da;
            padding: 20px;
        }

    </style>

  </head>
<body>
  <div class="form-container">
    <h1 class="heading">Update Form</h1>
    <div class="form-box">
    <form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Full Name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">
  </div>
  <div class="mb-3">
    <label for="age" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Age</label>
    <input type="number" class="form-control" id="age" name="age" value="<?php echo $age?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone?>">
  </div>
  <div class="mb-3">
    <label for="course" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Course</label>
    <input type="text" class="form-control" id="course" name="course" value="<?php echo $course?>">
  </div>
  
  <button type="submit" class="btn btn-primary" name="button">Update</button>
</form>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
