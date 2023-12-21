<?php
    require_once '../scripts/connect.php';
    $sql = "SELECT * FROM cars";
    $all_products = $conn->query($sql); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/offers.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
<section class="header">
        <nav>
            <a href="index.php"><img src="../images/carlogo.png" alt=""></a>
            <div class="nav-links" id="navlinks">              
                    <i class='bx bx-x' onclick="hideMenu()"></i>    
                    <ul>
                        <li><a href="index.php">Strona Główna</a></li>
                        <li><a href="offers.php">Oferta</a></li>
                        <li><a href="#">Regulamin</a></li>
                        <li><a href="logandreg.php">Zaloguj się</a></li>
                        
                    </ul>
            </div>
            <i class='bx bx-menu' onclick="showMenu()"></i>
        </nav>
        <hr>
        <div class="content">           
            <h1>Samochody w naszej ofercie </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus officiis maxime maiores cum excepturi nam! Perspiciatis, tenetur voluptatem? Excepturi magnam incidunt sequi laborum voluptate explicabo quia rem voluptates at asperiores!</p>          
            <div class="row">
                <?php
                    while($row = mysqli_fetch_assoc($all_products)){
                ?>   
                <div class="card-body">
                    <div class="image">
                        <img src="<?php echo $row["img"];?>" alt="">
                    </div>
                    <hr>
                    <p class="brand"><?php echo $row["brand"];?></p>
                    <p class="Model"><?php echo $row["model"];?></p>
                    <a href="" class="text-btn">Zaloguj się i sprawdź naszą oferte</a>                    
                </div> 
                <?php 
                    }
                ?> 
            </div>
        </div> 
    </section>
<!--JS--ToggleMenu--->
<script>
    var navLinks= document.getElementById("navlinks");
    function showMenu(){
        navLinks.style.right="0";
     }
    function hideMenu(){
        navlinks.style.right="-1000px";
    }
</script>
</body>
</html>