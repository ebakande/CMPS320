<!DOCTYPE html>
<html>
<head>
    <title>Basic Math Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        input, select { margin: 10px 0; padding: 5px; }
    </style>
</head>
<body>

<h2>Basic Math Calculator</h2>

<!-- Calculator input form -->
<form method="post">
    <!-- Input for the first number -->
    <label>First number: <input type="number" name="num1" step="any" required></label><br>

    <!-- Operator selection dropdown -->
    <label>Operator:
        <select name="operator" required>
            <!-- Basic arithmetic and advanced math options -->
            <option value="+">Addition (+)</option>
            <option value="-">Subtraction (-)</option>
            <option value="*">Multiplication (*)</option>
            <option value="/">Division (/)</option>
            <option value="%">Modulus (%)</option>
            <option value="^">Exponent (^)</option>
            <option value="sin">sin()</option>
            <option value="asin">asin()</option>
            <option value="cos">cos()</option>
            <option value="acos">acos()</option>
            <option value="tan">tan()</option>
            <option value="atan">atan()</option>
            <option value="atan2">atan2()</option>
            <option value="sqrt">sqrt()</option>
            <option value="ceil">ceil()</option>
            <option value="abs">abs()</option>
            <option value="floor">floor()</option>
            <option value="max">max()</option>
            <option value="min">min()</option>
            <option value="log">log()</option>
            <option value="log10">log10()</option>
            <option value="log2">log2()</option>
            <option value="round">round()</option>
        </select>
    </label><br>

    <!-- Input for the second number (optional depending on operation) -->
    <label>Second number (if needed): <input type="number" name="num2" step="any"></label><br>

    <!-- Submit button -->
    <input type="submit" value="Calculate">
</form>

<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and convert the first number
    $num1 = floatval($_POST["num1"]);

    // Get the selected operator
    $operator = $_POST["operator"];

    // Get and convert the second number if provided
    $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : null;

    // Initialize result and error variables
    $result = null;
    $error = null;

    // Perform calculation based on selected operator
    switch ($operator) {
        case "+": $result = $num1 + $num2; break;
        case "-": $result = $num1 - $num2; break;
        case "*": $result = $num1 * $num2; break;

        // Handle division with zero check
        case "/":
            if ($num2 == 0) {
                $error = "Cannot divide by zero.";
            } else {
                $result = $num1 / $num2;
            }
            break;

        // Handle modulus with zero check
        case "%":
            if ($num2 == 0) {
                $error = "Cannot perform modulus by zero.";
            } else {
                $result = fmod($num1, $num2);
            }
            break;

        case "^": $result = pow($num1, $num2); break;

        // Trigonometric and math functions
        case "sin": $result = sin($num1); break;
        case "asin": $result = asin($num1); break;
        case "cos": $result = cos($num1); break;
        case "acos": $result = acos($num1); break;
        case "tan": $result = tan($num1); break;
        case "atan": $result = atan($num1); break;
        case "atan2": $result = atan2($num1, $num2); break;

        // Square root with negative check
        case "sqrt":
            if ($num1 < 0) {
                $error = "Cannot take square root of a negative number.";
            } else {
                $result = sqrt($num1);
            }
            break;

        // Rounding and absolute value functions
        case "ceil": $result = ceil($num1); break;
        case "abs": $result = abs($num1); break;
        case "floor": $result = floor($num1); break;
        case "round": $result = round($num1); break;

        // Max and min between two numbers
        case "max": $result = max($num1, $num2); break;
        case "min": $result = min($num1, $num2); break;

        // Logarithmic functions with domain checks
        case "log":
            if ($num1 <= 0) {
                $error = "Logarithm undefined for non-positive numbers.";
            } else {
                $result = log($num1); // Natural log
            }
            break;
        case "log10":
            if ($num1 <= 0) {
                $error = "Log10 undefined for non-positive numbers.";
            } else {
                $result = log10($num1);
            }
            break;
        case "log2":
            if ($num1 <= 0) {
                $error = "Log2 undefined for non-positive numbers.";
            } else {
                $result = log($num1, 2); // Base-2 log
            }
            break;

        // Default error for unknown operators
        default:
            $error = "Invalid operator selected.";
    }

    // Display the result or error message
    if ($error) {
        echo "<p style='color:red;'>Error: $error</p>";
    } else {
        echo "<h3>Result: $result</h3>";
    }
}
?>

</body>
</html>
