<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>首頁</title>
        <link rel="stylesheet" href="CYA/style/test.css"/>
        <link rel="stylesheet" href="CYA/style/anime.css" />
    </head>

    <body>
        <?php include_once 'CYA/inc/bg.inc.php'; ?>



        <div class="tm-container">
            <div> 
                <div class="tm-row pt-4">
                    <div class="tm-col-left"></div>
                    <div class="tm-col-right">
                        <nav class="navbar navbar-expand-lg" id="tm-main-nav">
                            <div class="collapse navbar-collapse tm-nav" id="navbar-nav">
                                <ul class="navbar-nav text-uppercase">
                                    <li <?php if(basename($_SERVER['SCRIPT_NAME'])=='index.php'){echo 'class="nav-item active"';}else{echo 'class="nav-item"';}?>>
                                        <a class="nav-link tm-nav-link" href="index.php">Home</a>
                                    </li>
                                    <li <?php if(basename($_SERVER['SCRIPT_NAME'])=='about.php'){echo 'class="nav-item active"';}else{echo 'class="nav-item"';}?>>
                                        <a class="nav-link tm-nav-link" href="about.php">About</a>
                                    </li>
                                    <li <?php if(basename($_SERVER['SCRIPT_NAME'])=='services.php'){echo 'class="nav-item active"';}else{echo 'class="nav-item"';}?>>
                                        <a class="nav-link tm-nav-link" href="services.php">Services</a>
                                    </li>                            
                                    <li <?php if(basename($_SERVER['SCRIPT_NAME'])=='contact.php'){echo 'class="nav-item active"';}else{echo 'class="nav-item"';}?>>
                                        <a class="nav-link tm-nav-link" href="contact.php">Contact</a>
                                    </li>
                                    <li>
                                        <a class="main-button-red" href="PPT.php">Join Us Now!</a>
                                    </li>
                                </ul>                            
                            </div>                        
                        </nav>
                    </div>
                </div>