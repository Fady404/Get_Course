<!DOCTYPE html>
<html>
<head>
    <title>Age Calculator</title>
</head>
<body>
    <form method="post" action="">
        <label for="nationalId">Egyptian National ID:</label>
        <input type="text" id="nationalId" name="nationalId" required>
        <button type="submit">Calculate Age</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nationalId = $_POST['nationalId'];

        // Extract birth date from the ID (assuming a specific format)
        $birthDate = substr($nationalId, 1, 6);
        $birthYear = substr($birthDate, 0, 2);
        $birthMonth = substr($birthDate, 2, 2);
        $birthDay = substr($birthDate, 4, 2);

        // Calculate the birth date as a DateTime object
        $birthDate = new DateTime("$birthYear-$birthMonth-$birthDay");

        // Get the current date
        $currentDate = new DateTime();

        // Calculate the age in years
        $age = $currentDate->diff($birthDate)->y;

        echo "Your age is: " . $age;
    }
    ?>
</body>
</html>