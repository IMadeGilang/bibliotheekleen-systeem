<?php
    $conn = require_once "partials/dbconn.php";

     $stmt = $conn->prepare("SELECT * FROM lening");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0)
            exit('No rows');
        $row = $result->fetch_assoc();

        echo $row['student_id'];

        $stmt->close();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultaat</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    </form>
</body>
</html>

<?php
// source testoverview.php
// now make a sql for showing the aantaal
?>