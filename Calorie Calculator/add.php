<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['height']) || empty($_POST['weight'])) {
        echo "Non-valid input";
    } else {
        //ok, insert data to database
        // Create connection
        $conn = new mysqli("localhost", "root", "", "st_base");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $name = $_POST['name'];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $sql = "INSERT INTO person (name, age,height,weight) VALUES ('$name',$age,$height,$weight)";
        if ($conn->query($sql) === TRUE) {
            header("Location: index2.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    //end insert in database
}