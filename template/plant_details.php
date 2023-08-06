<!DOCTYPE html>
<html>
  <head>
    <!-- <title>Plant Information</title> -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap"
    />
    <style>
      body {
        font-family: "Montserrat", Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: green;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        justify-content: space-between;
      }

      .plant-photo {
        flex: 1;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
      }

      .plant-photo img {
        max-width: 100%;
        height: auto;
        border: 5px solid #fff;
        transition: transform 0.3s ease;
      }

      .plant-photo img:hover {
        transform: scale(1.1);
      }

      .plant-description {
        flex: 1;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }

      .plant-description h2 {
        color: darkgreen;
        font-size: 2rem;
        margin-bottom: 20px;
        border-bottom: 2px solid darkgreen;
        padding-bottom: 5px;
      }

      .plant-description ul {
        list-style-type: none;
        padding-left: 0;
      }

      .plant-description li {
        margin-bottom: 10px;
      }

      .plant-description li strong {
        color: darkgreen;
        font-weight: 700;
      }

      /* Media query for responsive design */
      @media (max-width: 768px) {
        .container {
          flex-direction: column;
        }

        .plant-photo {
          margin-bottom: 20px;
        }
      }
    </style>
  </head>
  <body>
<?php
require('connection.php');
session_start();

// Assuming you get the plantid from a form or URL parameter
// if (isset($_GET['plantid'])) {
    // $plantid = $_GET['plantid'];

include "head.php";
$sql = "SELECT * FROM plants WHERE plant_id = ".$_GET['plant_id'];
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
    
?>
    <div class="container">
      <div class="plant-photo">
        <!-- Replace the image URL with the actual plant photo URL -->
        <img
          src="<?php echo "plant_pics/".$row['image_url']?>"
          alt="Plant Photo"
        />
      </div>
      <div class="plant-description">
        <h2>Plant Description</h2>
        <ul>
          <li><strong>Category:</strong><?php echo $row['category'] ?></li>
          <li>
            <strong>Scientific Name:</strong><?php echo $row['scientific_name']?>
          </li>
          <li><strong>Common Name:</strong> <?php echo $row['common_name'] ?></li>
          <li><strong>Family:</strong><?php echo $row['family'] ?></li>
          <li><strong>Description:</strong><?php  echo $row['description']?></li>
          <li><strong>Life Cycle:</strong><?php echo $row['life_cycle'] ?> </li>
          <li>
            <strong>Growth Requirements:</strong><?php echo $row['growth_requirements'] ?>
          </li>
          <li><strong>Watering:</strong><?php echo $row['watering'] ?> </li>
          <li><strong>Sunlight:</strong><?php echo $row['sunlight'] ?></li>
          <li>
            <strong>Soil Quality:</strong><?php echo $row['soil_quality'] ?>
          </li>
          <li><strong>Plant Selection:</strong><?php echo $row['plant_selection'] ?></li>
          <li>
            <strong>Pest Management:</strong><?php echo $row['pest_management'] ?>
          </li>
          <li>
            <strong>Plant Harming Insects/ Worms:</strong> <?php echo $row['insects'] ?>
          </li>
          <li>
            <strong>Disease Prevention:</strong> <?php echo $row['disease_prevention'] ?>
          </li>
          
          <li><strong>Uses:</strong> <?php echo $row['uses'] ?></li>
          <li>
            <strong>Conservation Status:</strong> <?php echo $row['conservation_status'] ?>
          </li>
          <li><strong>Toxicity:</strong>  <?php echo $row['toxicity'] ?></li>
          <li>
            <strong>Caring Details:</strong>  <?php echo $row['caring_details'] ?>
          </li>
        </ul>
      </div>
      
      <?php }?>
    </div>
  </body>
</html>