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
<script>
    var navLinks= document.getElementById("navlinks");
    function showMenu(){
        navLinks.style.right="0";
     }
    function hideMenu(){
        navlinks.style.right="-1000px";
    }
</script>