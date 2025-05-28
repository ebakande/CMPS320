<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        /* Basic styling for the body and table */
        body { font-family: Arial, sans-serif; margin: 40px; }
        table, th, td { 
            border: 1px solid black; 
            border-collapse: collapse; 
            padding: 8px; 
        }
    </style>
</head>
<body>

<!-- Page heading -->
<h2>------------------------------BMI Calculator----------------------------------</h2>

<!-- Table displaying BMI categories and their corresponding ranges -->
<table>
    <tr><th>Category</th><th>BMI Range (kg/m²)</th></tr>
    <tr><td>Severe Thinness</td><td>&lt; 16</td></tr>
    <tr><td>Moderate Thinness</td><td>16 - 17</td></tr>
    <tr><td>Mild Thinness</td><td>17 - 18.5</td></tr>
    <tr><td>Normal</td><td>18.5 - 25</td></tr>
    <tr><td>Overweight</td><td>25 - 30</td></tr>
    <tr><td>Obese Class I</td><td>30 - 35</td></tr>
    <tr><td>Obese Class II</td><td>35 - 40</td></tr>
    <tr><td>Obese Class III</td><td>&gt; 40</td></tr>
</table>

<!-- Form to input personal information and calculate BMI -->
<form method="post">
    <!-- User inputs -->
    <p><label>Name: <input type="text" name="name" required></label></p>
    <p><label>Age: <input type="number" name="age" required></label></p>
    <p><label>Gender: <input type="text" name="gender" required></label></p>
    <p><label>Height (feet): <input type="number" name="htft" step="any" required></label></p>
    <p><label>Height (inches): <input type="number" name="htin" step="any" required></label></p>
    <p><label>Weight (pounds): <input type="number" name="weight" step="any" required></label></p>
    <input type="submit" value="Calculate BMI">
</form>

<?php
// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize user input
    $name = htmlspecialchars($_POST["name"]);
    $age = (int)$_POST["age"];
    $gender = htmlspecialchars($_POST["gender"]);
    $htft = (float)$_POST["htft"];
    $htin = (float)$_POST["htin"];
    $weight = (float)$_POST["weight"];

    // Convert height to inches
    $inches = ($htft * 12) + $htin;

    // Calculate BMI using formula for imperial units
    $bmi = (703 * $weight) / pow($inches, 2);
    $bmi = round($bmi, 1); // Round BMI to one decimal place

    // Determine BMI category based on calculated value
    if ($bmi <= 16) {
        $mbmi = "Severe Thinness";
    } elseif ($bmi > 16 && $bmi <= 17) {
        $mbmi = "Moderate Thinness";
    } elseif ($bmi > 17 && $bmi <= 18.5) {
        $mbmi = "Mild Thinness";
    } elseif ($bmi > 18.5 && $bmi <= 25) {
        $mbmi = "Normal";
    } elseif ($bmi > 25 && $bmi <= 30) {
        $mbmi = "Overweight";
    } elseif ($bmi > 30 && $bmi <= 35) {
        $mbmi = "Obese Class I";
    } elseif ($bmi > 35 && $bmi <= 40) {
        $mbmi = "Obese Class II";
    } else {
        $mbmi = "Obese Class III";
    }

    // Display results to the user
    echo "<hr>";
    echo "<p>Hi <strong>$name</strong>,</p>";
    echo "<p>You are a $gender. You are $age years old. You are currently $htft' $htin\" and you currently weigh " . number_format($weight, 1) . " pounds.</p>";
    echo "<p>Your BMI is <strong>$bmi</strong>, which is categorized as <strong>$mbmi</strong>.</p>";
    echo "<p>Thank you for using the BMI Calculator!</p>";
}
?>

</body>
</html>
