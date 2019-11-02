<?php
    /*
        Subject    : DATA ANALYSER – Linguagem PHP (OYSTR)
        Created on : 31-Oct-2019, 07:56:25 PM
        Author     : Marcos Freire
    */
?>

<?php
    // If the btn_return is pressed (store its value)
    if (isset($_POST['btn_return']))
    {
        // Returns to the page index.php
        header("location: ../index.php");
    }
?>