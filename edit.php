<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Record</h1>
    <?php
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id = $id");
    $row = $result->fetch_assoc();
    ?>
    <form method="POST" action="">
        <input type="text" name="firstname" value="<?= $row['firstname'] ?>" required>
        <input type="text" name="middlename" value="<?= $row['middlename'] ?>">
        <input type="text" name="lastname" value="<?= $row['lastname'] ?>" required>
        <input type="number" name="age" value="<?= $row['age'] ?>" required>
        <input type="text" name="address" value="<?= $row['address'] ?>" required>
        <input type="text" name="course_section" value="<?= $row['course_section'] ?>" required>
        <button type="submit" name="update" class="btn">Update</button>
    </form>
    <a href="index.php" class="btn">Back</a>
    <?php
    if (isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $course_section = $_POST['course_section'];

        $sql = "UPDATE students SET 
                firstname = '$firstname', middlename = '$middlename',
                lastname = '$lastname', age = '$age',
                address = '$address', course_section = '$course_section'
                WHERE id = $id";
        if ($conn->query($sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }
    ?>
</body>
</html>
