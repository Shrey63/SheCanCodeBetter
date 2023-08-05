<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
require('connection.php');
session_start();
include 'head.php'; 
// Assuming you get the plantid from a form or URL parameter
// if (isset($_GET['plantid'])) {
    // $plantid = $_GET['plantid'];


$sql = "SELECT * FROM plants WHERE category = '".$_GET['cat_name']."'";
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<div style='margin-top:80px' class='container d-flex flex-row'>";
        while ($row = $result->fetch_assoc()) {
            
?>
    
    
        <div class="col">
            <div class="card h-100">
                <img  src="<?php echo "plant_pics/".$row['image_url']?>" class="card-img-top" alt="..." height="300px" width="300px">
                <div class="card-body">
                  <h5 class="card-title"> 
                    
                 <u> <b><a style="font-size:large" href="plant_details.php?plant_id=<?php echo $row['plant_id']; ?>"></b></u>
                    <?php echo $row['common_name'] ?>
                </a>  
                
                </h5>
                  
                  <p class="card-text"><?php echo $row ['description'] ?></p>
                </div>
            </div>
        
        
        
    </div>
    <?php } ?>
    </div>
    <?php }?>
    <pre>














    </pre>
</body>
</html>
