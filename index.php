<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
         <?php
                include 'inc_js.php';
                include 'tools/db_tools.php';
                include 'tools/genToken.php';
                include 'connect.php';

                include 'tools/stock.php';
                include 'form/main_form.php';
          ?>
        <title>Friendship</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/floating-labels.css">
        <link rel="stylesheet" href="CSS/sticky-footer.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/sb-admin.css">
        <link rel="stylesheet" href="CSS/sweetalert2.min.css">
        <link rel="stylesheet" href="CSS/main.css">

    </head>

    <body class="bg">
        <?php
            include  'login.php';
        ?>
    </body>
</html>
