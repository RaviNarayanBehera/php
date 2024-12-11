<?php 

    include("config.php");
    session_start();

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

    if(isset($_POST['update']))
    {
        $id = $_POST['deleteId'];
        $name = $_POST['nameId'];
        $age = $_POST['ageId'];
        $phone = $_POST['phoneId'];
        $course = $_POST['courseId'];     
        
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;
        $_SESSION['phone'] = $phone;
        $_SESSION['course'] = $course;

        header("Location: update.php");
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
    <h1 class="heading">RPL 2024 Register Form</h1>
    <div class="form-box">
    <form method="POST">
  <div class="mb-3">
    <label for="name" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Full Name</label>
    <input type="text" class="form-control" id="name" name="name" required>
    <div class="invalid-feedback">Please enter your full name.</div>
  </div>
  <div class="mb-3">
    <label for="age" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Age</label>
    <input type="number" class="form-control" id="age" name="age" required min="10" max="100">
    <div class="invalid-feedback">Please enter a valid age between 18 and 100.</div>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="phone" required pattern="^\+?[0-9]{10,15}$">
    <div class="invalid-feedback">Please enter a valid phone number (10-15 digits).</div>
  </div>
  <div class="mb-3">
    <label for="course" class="form-label" style="font-size: 16px; font-weight: bold">Enter Your Course</label>
    <input type="text" class="form-control" id="course" name="course" required>
    <div class="invalid-feedback">Please enter your course.</div>
  </div>
  
  <button type="submit" class="btn btn-primary" name="button">Submit</button>
</form>
  </div>
</div>

<hr>
<div class="mx-auto p-2" style="width: 900px;">
<table class="table table-hover ">
  <thead>
    <tr class="table-danger">
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
          <input type="hidden" value="<?php echo $data['name'] ?>" name="nameId">
          <input type="hidden" value="<?php echo $data['age'] ?>" name="ageId">
          <input type="hidden" value="<?php echo $data['phone'] ?>" name="phoneId">
          <input type="hidden" value="<?php echo $data['course'] ?>" name="courseId">
          <button type="submit" class="btn btn-warning" name="update">Update</button> 
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    (function() {
        'use strict'
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation')
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)
    })();
</script>

</body>
</html>
