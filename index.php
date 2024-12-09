<?php 

    include("config.php");

    $c1 = new Config();


    $is_btn_set = isset($_POST['button']);

    if($is_btn_set)
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $course = $_POST['course'];
        $phone = $_POST['phone'];

        $c1->insert($name,$age,$course,$phone);
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <center>
    <h1>Student Registraion Form</h1>
    <form method="POST">
        <input placeholder="Name" name = "name"><br><br>
        <input type="number" placeholder="Age" name = "age"><br><br> 
        <input type="number" placeholder="Phone" name = "phone"><br><br> 
        <input placeholder="Course" name = "course"><br><br> 
        <button name="button" type= "submit">Submit</button>
    </form>
    </center>
</body>
</html>
