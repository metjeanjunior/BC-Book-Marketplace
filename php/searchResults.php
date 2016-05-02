<!-- Inspired by: http://bootsnipp.com/snippets/featured/list-grid-view -->
<!DOCTYPE html>
<html>
    <head>
        <title>Search Results</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="../js/marquee.js"></script>
        <script src="../js/viewRes.js"></script>
        <script src="../js/searchbar.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/global.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/viewRes.css">
    </head>
</html>
<?php
    $tofind = $_GET['search-bar'];
    $dbc = connectToDB();

    if ($dbc == 'bad')
        header("Location: ../index.php");

    $query = "select * from book where book_name like '%$tofind%' or book_description like '%$tofind%' 
        or book_ibsn like '%$tofind%'";
    $result = performQuery($dbc, $query);

    if (mysqli_num_rows($result) == 0)
    {
        echo 'empty';
        return -1;
    }

    $arrayRes = array();
    while ( $obj = mysqli_fetch_object( $result ) )
        $arrayRes[] = $obj;

    $res = json_encode($arrayRes);
    ?>
        <script type="text/javascript">
            $.each(<?php echo $res; ?>, function(i, info)
            {
                var newDiv = "\
                    <div class=\"item  col-xs-4 col-lg-4\">\
                    <div class=\"thumbnail\">\
                        <img class=\"group list-group-image\" src=\"http://placehold.it/400x250/000/fff\"/>\
                        <div class=\"caption\">\
                            <h4 class=\"group inner list-group-item-heading\">\
                                "+ info.book_name + "-" + info.book_ibsn +"</h4> \
                            <p class=\"group inner list-group-item-text\">\
                                "+ info.book_description +"</p>\
                            <div class=\"row\">\
                                <div class=\"col-xs-12 col-md-6\">\
                                    <p class=\"lead\">\
                                        $"+ info.book_price +"</p>\
                                </div>\
                                <div class=\"col-xs-12 col-md-6\">\
                                    <form method=\"post\" action=\"viewBook.php\">\
                                        <input type=\"text\" name=\"bookID\" value=\""+ info.book_id +"\" hidden=\"hidden\">\
                                        <input type=\"submit\" class=\"btn btn-success\" value=\"View Book\">\
                                    </form>\
                                </div>\
                            </div>\
                        </div>\
                    </div>\
                </div>";
                $("#result").append(newDiv);
                
            });
        </script>
    <?php

    function connectToDB()
    {
        $dbc= @mysqli_connect("localhost", "metelusj", "23JD5h5z", "metelusj") or
            $dbc = 'bad';
        return ($dbc);
    }

    function performQuery($dbc, $query)
    {
        $result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
        return $result;
    }

    function disconnectFromDB($dbc)
    {
        mysqli_close($dbc);
    }