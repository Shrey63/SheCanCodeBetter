<?php
require('connection.php');
session_start();

// Assuming you get the plantid from a form or URL parameter
// if (isset($_GET['plantid'])) {
    // $plantid = $_GET['plantid'];
$plantid=1;

$sql = "SELECT * FROM plants WHERE plant_id = ".$plantid;
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();

        
        echo "<!DOCTYPE html>
            <html>
                <head>
                    <title>Plant Information</title>
                    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap\" />
                    <style>
                        /* Your CSS styles here */

                    </style>
                </head>
                <body>
                    <div class=\"container\">
                        <div class=\"plant-photo\">
                            <img src=\"plant_pics/" . $row['image_url']."\" alt=\"Plant Photo\" />
                        </div>
                        <div class=\"plant-description\">
                            <h2>" . $row['common_name'] . "</h2>
                            <ul>
                                <li><strong>Scientific Name:</strong> " . $row['scientific_name'] . "</li>
                                <li><strong>Family:</strong> " . $row['family'] . "</li>
                                <li><strong>Description:</strong> " . $row['description'] . "</li>
                                <li><strong>Distribution:</strong> " . $row['distribution'] . "</li>
                                <li><strong>Life Cycle:</strong> " . $row['life_cycle'] . "</li>
                                <li><strong>Growth Requirements:</strong> " . $row['growth_requirements'] . "</li>
                                <li><strong>Watering:</strong> " . $row['watering'] . "</li>
                                <li><strong>Sunlight:</strong> " . $row['sunlight'] . "</li>
                                <li><strong>Soil Quality:</strong> " . $row['soil_quality'] . "</li>
                                <li><strong>Plant Selection:</strong> " . $row['plant_selection'] . "</li>
                                <li><strong>Mulching:</strong> " . $row['mulching'] . "</li>
                                <li><strong>Fertilizing:</strong> " . $row['fertilizing'] . "</li>
                                <li><strong>Pruning:</strong> " . $row['pruning'] . "</li>
                                <li><strong>Pest Management:</strong> " . $row['pest_management'] . "</li>
                                <li><strong>Disease Prevention:</strong> " . $row['disease_prevention'] . "</li>
                                <li><strong>Harvesting:</strong> " . $row['harvesting'] . "</li>
                                <li><strong>Uses:</strong> " . $row['uses'] . "</li>
                                <li><strong>Caring Details:</strong> " . $row['caring_details'] . "</li>
                            </ul>
                        </div>
                    </div>
                </body>
            </html>";
    } else {
        echo "Plant with ID $plantid not found.";
    // }

    // Close the prepared statement

}

// Close the database connection
$con->close();
?>
