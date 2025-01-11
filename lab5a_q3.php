<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab 5a Q3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        h3 {
            font-size: 24px;
        }
        form {
            margin-top: 20px;
            font-size: 18px;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 20px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Define the calculateArea function
    function calculateArea($length, $width) {
        return $length * $width;
    }

    // Check if form is submitted
    $area = null;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $length = isset($_POST['length']) ? $_POST['length'] : 0;
        $width = isset($_POST['width']) ? $_POST['width'] : 0;

        // Calculate the area if both values are valid
        if (is_numeric($length) && is_numeric($width)) {
            $area = calculateArea($length, $width);
        } else {
            $area = "Please enter valid numbers for length and width.";
        }
    }
    ?>

    <h3>Rectangle Area Calculator</h3>
    <!-- Form to input length and width -->
    <form method="POST" action="">
        <label for="length">Length:</label>
        <input type="number" name="length" id="length" required step="0.01"><br>
        
        <label for="width">Width:</label>
        <input type="number" name="width" id="width" required step="0.01"><br>
        
        <button type="submit">Calculate Area</button>
    </form>

    <?php
    // Display the result if the form was submitted
    if ($area !== null) {
        echo '<div class="result">';
        echo is_numeric($area) ? "Area: $area" : $area;
        echo '</div>';
    }
    ?>
</body>
</html>
