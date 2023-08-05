<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plants Community Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url("img/bgg.jpg"); /* Replace 'background.jpg' with your background image URL */
        background-size: cover;
        background-position: center;
      }

      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .team-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 250px; /* Increased the width to accommodate the additional information */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
      }

      .team-name {
        font-size: 18px;
        margin-bottom: 5px;
      }

      .team-head {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .team-city {
        font-size: 14px;
        color: #888;
        margin-bottom: 5px;
      }

      .team-agenda {
        font-size: 14px;
        margin-bottom: 10px;
        text-align: center;
      }

      .team-members {
        font-size: 12px;
        color: #888;
      }

      .team-button {
        background-color: #4caf50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
      }

      .team-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    
    <div class="container">
      
        <?php
        require('connection.php');
        // include "head.php";
        // Fetch data from the 'communities' table
        $sql = "SELECT * FROM community";
        $result = $con->query($sql);

        // Check if there are any rows in the result
        if ($result->num_rows > 0) {
            // Loop through the data and display each community card
            while ($row = $result->fetch_assoc()) {
              echo '<div class="team-card">';
        ?>
        <img src="<?php echo "comm_pics/".$row['com_logo']?>" class="team-image" />';
                <?php echo '<div class="team-card">';
                echo '<div class="team-name">' . $row['com_name'] . '</div>';

                
$headUsername = '';
if (!empty($row['head_id'])) {
    $headId = $row['head_id'];
    $headSql = "SELECT user_name FROM users WHERE user_id =".$headId;
    $headResult = $con->query($headSql);
    if ($headResult && $headResult->num_rows > 0) {
        $headRow = $headResult->fetch_assoc();
        $headUsername = $headRow['user_name'];
    }
}
                echo '<div class="team-head">Head: ' .$headUsername. '</div>';
                echo '<div class="team-city">City: ' . $row['city'] . '</div>';
                echo '<div class="team-agenda">Agenda: ' . $row['agenda'] . '</div>';
                ?>
                <!-- Use an anchor tag instead of a button -->
<a class="team-button" href="plant_community.php?com_id=<?php echo $row['com_id']; ?>">Join Team</a>

                <?php echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No communities found.</p>';
        }

        // Close the database connection
        $con->close();
        ?>
      </div>

      <!-- Add more team cards as needed -->
    </div>
  </body>
</html>