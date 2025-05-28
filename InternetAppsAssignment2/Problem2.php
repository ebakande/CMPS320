<!DOCTYPE html>
<html>
<head>
    <title>Birthday Meaning Generator</title>
    <style>
        /* Basic styling for layout and form elements */
        body { font-family: Arial, sans-serif; padding: 20px; }
        label, select, input { margin: 5px 0; display: block; }
    </style>
</head>
<body>

<!-- Heading for the app -->
<h2>Welcome to Birthday Meaning Generator!</h2>

<!-- Form to collect birth month, day, and year -->
<form method="post">
    <label>Enter your birth month (1-12): <input type="number" name="month" min="1" max="12" required></label>
    <label>Enter your birth day (1-31): <input type="number" name="day" min="1" max="31" required></label>
    <label>Enter your birth year (2000–2023): <input type="number" name="year" min="2000" max="2023" required></label>
    <input type="submit" value="Generate Meaning">
</form>

<?php
// Check if the form is submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and typecast the form inputs
    $month = (int)$_POST["month"];
    $day = (int)$_POST["day"];
    $year = (int)$_POST["year"];

    // Define meanings for each month
    $monthMeanings = [
        1 => ["Janus", "January"],
        2 => ["Februalia", "February"],
        3 => ["Mars", "March"],
        4 => ["Aperire", "April"],
        5 => ["Maia", "May"],
        6 => ["Youth", "June"],
        7 => ["Julius Caesar", "July"],
        8 => ["Augustus Caesar", "August"],
        9 => ["Seven", "September"],
        10 => ["Eight", "October"],
        11 => ["Eleven", "November"],
        12 => ["Twelve", "December"]
    ];

    // Define meanings for each day of the month
    $dayMeanings = [
        1 => ["1st", "Self-Started"],
        2 => ["2nd", "Solutions"],
        3 => ["3rd", "Expression"],
        4 => ["4th", "Stability"],
        5 => ["5th", "Flexibility"],
        6 => ["6th", "Heart"],
        7 => ["7th", "Refinied Mind"],
        8 => ["8th", "Success"],
        9 => ["9th", "Shine"],
        10 => ["10th", "Leadership"],
        11 => ["11th", "Strong intuition"],
        12 => ["12th", "Creativity"],
        13 => ["13th", "Conscientious worker"],
        14 => ["14th", "Open-minded"],
        15 => ["15th", "Love for others"],
        16 => ["16th", "Inquisitive mind"],
        17 => ["17th", "Quality of work"],
        18 => ["18th", "Open-minded and Open Hearted"],
        19 => ["19th", "Independence and self-sufficiency"],
        20 => ["20th", "Relation to others"],
        21 => ["21st", "Great with connecting with people"],
        22 => ["22nd", "Create great things"],
        23 => ["23rd", "Zest for life"],
        24 => ["24th", "Heart of gold"],
        25 => ["25th", "Ability to take in information"],
        26 => ["26th", "Desire to succeed"],
        27 => ["27th", "Mind is wide open"],
        28 => ["28th", "Compassionate leader"],
        29 => ["29th", "Ability to bring things together"],
        30 => ["30th", "An original"],
        31 => ["31st", "Practicality and imagination"]
    ];

    // Define personality meanings for each supported year
    $yearMeanings = [
        2000 => "Moody and overconfident",
        2001 => "Lots of energy and very passionate about things",
        2002 => "Don't like to be restrained by convention",
        2003 => "The tendency to worry",
        2004 => "Strong-willed, intelligent and creative",
        2005 => "Honest, intelligent, and ambitious",
        2006 => "Straightforward in thought and speech",
        2007 => "People find you honest",
        2008 => "You are easygoing and adaptable",
        2009 => "Silent and hardworking",
        2010 => "Tendency to resist authority",
        2011 => "You are sensitive",
        2012 => "You are impatient and want everything quickly",
        2013 => "You have lot of energy and have difficulty controlling it",
        2014 => "You desire a high-profile career",
        2015 => "You have strong faith",
        2016 => "You have spent your life caring for others",
        2017 => "You show who you really are",
        2018 => "People find you honest",
        2019 => "You are a generation alpha",
        2020 => "You are a survivor",
        2021 => "You are a generation alpha",
        2022 => "You are easygoing and adaptable",
        2023 => "You are Quiet, kind, and polite"
    ];

    // Validate input: check if values exist in the meaning arrays
    if (!isset($monthMeanings[$month], $dayMeanings[$day], $yearMeanings[$year])) {
        echo "<p style='color: red;'>Invalid input detected. Please check your values.</p>";
    } else {
        // Retrieve the meaning values
        list($monthMeaning, $monthFull) = $monthMeanings[$month];
        list($dayAbbrev, $dayMeaning) = $dayMeanings[$day];
        $yearMeaning = $yearMeanings[$year];

        // Display personalized results
        echo "<hr>";
        echo "<p>The month of <strong>$monthFull</strong> means <em>$monthMeaning</em>.</p>";
        echo "<p>The <strong>$dayAbbrev</strong> of $month means <em>$dayMeaning</em>.</p>";
        echo "<p>The year <strong>$year</strong> means that you are <em>$yearMeaning</em>.</p>";
    }
}
?>

</body>
</html>
