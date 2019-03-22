<?php
    define( "TITLE", "Loops" );
?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo TITLE; ?></title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <h1><?php echo TITLE; ?></h1>

            <?php

                // WHILE LOOP
                $startingNum = 50;

                while ( $startingNum <= 100 ) {
                    echo "$startingNum &nbsp;";

                    // increment by 1
                    $startingNum++;
                }

                // FOR LOOP
                for ( $a = 30; $a <= 40; $a++) {
                    echo "Number $a <br>";
                }

                // FOREACH LOOP
                $friends = array( "Jim", "Sandra", "Kyle", "Cassandra" );

                foreach ( $friends as $friend ) {

                    // output each individual value in the array
                    echo "$friend is my friend! <br>";

                }

                // DO WHILE LOOP
                $foo = 10;

                do {

                    // do this code
                    echo "Numero $foo <br>";

                    // increment by 1
                    $foo++;

                } while ( $foo <= 50 );


            ?>

        </div>

        <!-- jQuery -->
        <script src="bootstrap/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
