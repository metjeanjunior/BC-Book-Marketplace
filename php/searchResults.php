<!-- Inspired by: http://bootsnipp.com/snippets/featured/list-grid-view -->
<!DOCTYPE html>
<html>
    <head>
        <title>Search Results</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="../js/marquee.js"></script>
        <script src="../js/viewRes.js"></script>
        <script src="../js/searchbar.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/global.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" type="text/css" href="../css/viewRes.css">
    </head>
    <body>
        <marquee>Thanks for visiting so soon!
        But we are under construction
        Here is something to keep you happy until launch :)</marquee><br>

        <div class="container">
            <div class="row">
                <form method="get" action="searchResults.php">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="imaginary_container"> 
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control"  placeholder="Search" 
                                    name="search-bar" id="search-bar-1" onkeyup="search(this.value)">
                                <span class="input-group-addon">
                                    <button type="submit" onclick="">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>  
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="container results">
            <div class="well well-sm res-header">
                <strong>Category Title</strong>
                <div class="btn-group">
                    <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
                    </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                        class="glyphicon glyphicon-th"></span>Grid</a>
                </div>
            </div>
            <div id="products" class="row list-group">
                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        $21.000</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        $21.000</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                Product title</h4>
                            <p class="group inner list-group-item-text">
                                Product description... Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        $21.000</p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>
<?php
    $tofind = $_GET['search-bar']
    $dbc = connectToDB();

    if ($dbc == 'bad')
        header("Location: login.php?error=true&redirect=".$_POST['redirect']);

    $query = "select * from book where book_name like %$tofind% or book_description like %$tofind% 
        or book_ibsn like %$tofind%";
    $result = performQuery($dbc, $query);

    for ($result as $row)
    {
        ?>
            <script type="text/javascript">
                var newDiv = `
                    <div class="item  col-xs-4 col-lg-4">
                    <div class="thumbnail">
                        <img class="group list-group-image" src="http://placehold.it/400x250/000/fff" alt="" />
                        <div class="caption">
                            <h4 class="group inner list-group-item-heading">
                                <?php echo $row[2].'-'.$row[1]; ?></h4>
                            <p class="group inner list-group-item-text">
                                <?php echo $row[3]; ?></p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        <?php echo $row[4]; ?></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-success" href="http://www.jquery2dotnet.com">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
                $("#results").append(newDiv);
            </script>
        <?php
    }

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