<?php ob_start(); ?>
<?php include "../includes/db.php" ?>
<?php include "functions.php" ?>


<?php session_start(); ?>

<?php 

    $query = "SELECT * from site_settings ";
    $siteInfoQuery = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($siteInfoQuery)) {
        $siteName = $row['site_name'];
        $siteAdminEmail = $row['site_admin_email'];
        $googleAnalyticsIsEnabled = $row['googleAnalyticsIsEnabled'];
        $tracking_code = $row['tracking_code'];
    }

?>



<?php //Checks if logged in user has role of Admin and if not redirects them to root index

    if(!isset($_SESSION['user_role'])) {        
        header("Location: ../index.php");
    } 
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    
    <link href="css/pace.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery-3.1.0.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- TinyMCE -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="js/tinymce.js"></script>
    <script src="js/pace.js"></script>


</head>

<body>