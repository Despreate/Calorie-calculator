<html>
<link rel="stylesheet" href="./manage.css" />

<body>
    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container">
        <h1> Manage persons </h1>
        <br>
        <h1>-------------------------</h1>
        <br>
        <h3> List of Persons </h3>
        <br>

        <?php

        $conn = new mysqli("localhost", "root", "", "st_base");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM person";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "Id: " . $row["id"] . "- Name: " . $row["name"] . "- Age: " .
                    $row["age"] . "- Height:" . $row["height"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        ?>
        <br>
        ---------------------------------------------
        <br>
        <h3> Delete one person </h3>
        <form action="" method="post">
            Enter the id: <input type="text" name="id" /><br>
            <br>
            <input class="del" type="submit" name="submit" value="delete" />
        </form>
        <?php
        if (isset($_POST['submit'])) {

            $del = "DELETE FROM person WHERE id=" . $_POST['id'];
            if ($conn->query($del) === TRUE) {
                echo "Record deleted successfully";
                header("location:manage.php");
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
        $conn->close();
        ?>
        <a class="btn" href="./main.html">Home</a>
    </div>
</body>

</html>