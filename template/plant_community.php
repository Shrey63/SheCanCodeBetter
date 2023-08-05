<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plant Community Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
      }

      header {
        background-color: #007b3e;
        color: #fff;
        padding: 20px;
        text-align: center;
      }

      .community-info {
        display: flex;
        align-items: center;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 20px;
      }

      .community-info img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-right: 20px;
      }

      .community-info .details {
        font-size: 18px;
      }

      .community-info .details p {
        margin: 0;
        padding: 5px 0;
      }

      .notifications {
        margin: 20px;
      }

      .notification {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }

      .plant-background {
        background-image: url("plant_background.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }
      .comment-section {
        margin-top: 20px;
      }

      .comment-form {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
      }

      .comment-form label {
        font-weight: bold;
        margin-bottom: 5px;
      }

      .comment-form textarea {
        resize: vertical;
        min-height: 50px;
        padding: 5px;
        transition: height 0.2s;
      }

      .comment-form button {
        background-color: #007b3e;
        color: #fff;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
        align-self: flex-end;
      }

      .comment {
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
      }

      .comment .user {
        font-weight: bold;
        margin-bottom: 5px;
      }
    </style>
  </head>
  <body class="plant-background">
    <header>
      <!-- <h1>Plant Community</h1> -->
    </header>

    <?php
require('connection.php');
session_start();


  
  include 'head.php'; 
$sql = "SELECT * FROM community WHERE com_id = ".$_GET['com_id'];
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();  
?>

    <div class="community-info">
    <img src="<?php echo "comm_pics/".$row['com_logo']?>" class="team-image" />';
                
                <div class="details">
        <p><strong>Community Name:</strong> <?php echo $row['com_name'] ?></p>

<?php

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
    ?>
    <p><strong>Head:</strong> <?php echo $headUsername ?></p>
        <p><strong>Date of Formation:</strong> <?php echo $row['creation_date'] ?></p>
        <p>
          <strong>Agenda:</strong> <?php echo $row['agenda'] ?>
        </p>
<?php
        $membersSql = "SELECT COUNT(*) AS member_count FROM member where community_id = ".$_GET['com_id'];
        $membersResult = $con->query($membersSql);

        if ($membersResult && $membersResult->num_rows > 0) {
            $memberRow = $membersResult->fetch_assoc();
            $memberCount = $memberRow['member_count'];
    ?>
    <p><strong>Number of Members:</strong> <?php echo $memberCount ?></p>
       <?php } ?>
      </div>
    </div>

    <div class="notifications">
      <div class="notification">
        <h2>Notification Title 1</h2>
        <p>
          Notification content here. This could be an important update or
          announcement related to plants.
        </p>
        <div class="comment-section">
          <form class="comment-form">
            <label for="comment">Leave a comment:</label>
            <textarea
              id="comment"
              name="comment"
              placeholder="Type your comment here..."
              rows="1"
            ></textarea>
            <button type="submit">Submit</button>
          </form>
          <div class="comment">
            <p class="user">John Doe</p>
            <p>Great news! Thanks for the update.</p>
          </div>
          <div class="comment">
            <p class="user">Jane Smith</p>
            <p>Looking forward to the event!</p>
          </div>
          <!-- Add more comments here as needed -->
        </div>
      </div>
      <div class="notification">
        <!-- ... (second notification content) ... -->
      </div>
      <!-- Add more notifications here as needed -->

      <!-- Add more notifications here as needed -->
    <?php } ?>
    </div>
  </body>
</html>