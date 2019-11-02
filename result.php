<?php
    /*
        Subject    : DATA ANALYSER – Linguagem PHP (OYSTR)
        Created on : 31-Oct-2019, 07:56:25 PM
        Author     : Marcos Freire
    */
?>

<?php

    session_start();
    if (isset($_SESSION['session_result_site_url']) || isset($_SESSION['session_result_site_title']) || isset($_SESSION['session_html_version']) || isset($_SESSION['session_result_site_external_links']) || isset($_SESSION['session_result_site_internal_links']))
    {
        // Print all the content of the sessions
        echo '<p><span>Analysing \'' . $_SESSION['session_result_site_url'] . '\'' . '</span></p>';
        echo '<p><span>HTML Version</span> ' . $_SESSION['session_html_version'] . '</p>';
        echo '<p><span>Page Title</span> ' . $_SESSION['session_result_site_title'] . '</p>';
        echo '<p><span>External Links</span> ' . $_SESSION['session_result_site_external_links'] . '</p>';
        echo '<p><span>Internal Links</span> ' . $_SESSION['session_result_site_internal_links'] . '</p>';
        session_destroy();
    }
    else
    {
        echo '<p>You need to return and try again.</p>';
        echo '<form action="./controllers/ControllerReturn.php" method="post">
        <input type="submit" name="btn_return" value="Return">
        </form>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style_result.css">
    <title>Result</title>
</head>
<body>
    
</body>
</html>