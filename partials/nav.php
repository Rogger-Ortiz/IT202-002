<?php
//include functions here so we can have it on every page that uses the nav bar
//that way we don't need to include so many other files on each page
//nav will pull in functions and functions will pull in db
$domain = $_SERVER["HTTP_HOST"];
if(strpos($domiain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; // if i get an error with cookie params, make this false

if(($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60*60,
        "path" => "/Project",
        // "domain => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();

require(__DIR__."/../lib/functions.php");
?>
<nav>
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="home.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>