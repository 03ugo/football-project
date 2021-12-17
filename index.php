<!DOCTYPE html>
<html lang="en">

<?php
require_once './php/structure/head.php';
?>


<body>
    <div class="container">
        <!-- Navbar Bootstrap  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">That Football <i class="fas fa-futbol"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./php/articles.php">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./php/account.php">Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Fin Navbar -->
    </div>
</body>

</html>