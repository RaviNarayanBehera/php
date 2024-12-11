<?php 

    // config - backend work...

    class Config{
        //hostname
        //username
        //password
        //database
        private $host = "localhost";
        private $usermane = "root";
        private $password = "";
        private $datbase = "demo";
        private $connection;

        public function connect()
        {
          $this->connection = mysqli_connect($this->host,$this->usermane,$this->password,$this->datbase);
            
          // if($res)
          // {
          //   echo "Database connected Succesfully...!";
          // }
          // else
          // {
          //   echo "Database connection Failed...!";
          // }
        }

        public function __construct()
    {
      $this->connect();
    }

    public function insert ($name,$age,$course,$phone)
    {
      $query = "INSERT INTO students (name,age,course,phone) VALUES('$name',$age,'$course',$phone)";
      $res = mysqli_query($this->connection,$query);
        if($res)
          {
            echo "Data Inserted Succesfully...!";
          }
          else
          {
            echo "Data Insertion Failed...!";
          }
    }   


    public function fetch()
    {
      $query = "SELECT * FROM students";
      $res = mysqli_query($this->connection, $query);
      return $res;
    }

    public function delete($id)
    {
        $query = "DELETE FROM students WHERE id = $id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function update($id, $name, $age, $course, $phone)
    {
        $query = "UPDATE students SET name='$name', age=$age, course='$course', phone=$phone WHERE id=$id";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

}

?>