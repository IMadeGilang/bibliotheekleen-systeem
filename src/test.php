<?php
$conn = require_once "partials/dbconn.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $studentnummer = htmlspecialchars(trim($_POST["student_nummer"]));
        $boekid = htmlspecialchars(trim($_POST["boek_id"]));

        $stmt = $conn->prepare("INSERT INTO lening (student_id, book_id) 
                                VALUES (?,?)");
        $stmt->bind_param("ss", $studentnummer, $boekid);
        $stmt->execute();
        $stmt->close();
        header("Location: resultaat.php");
        exit;

        echo $studentnummer;
        echo $boekid;
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow a Book</title>
</head>
<body>

    <h2>BiBliotheek-systeem</h2>

    <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">

        <label>Student Nummer:</label><br>
        <input type="text" name="student_nummer" required>
        <br><br>

        <label>Boek ID:</label><br>
        <input type="text" name="boek_id" required>
        <br><br>

        <button type="submit" name="submit">Submit</button>

    </form>

</body>
</html>

