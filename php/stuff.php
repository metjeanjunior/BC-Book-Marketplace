<?php
include ('../include/dbconn.php');
$dbc = connect_to_db("metelusj");
$q = $_GET["search"];


$array = array_values($_COOKIE);
/*if ($q == "") {
  $result = perform_query($dbc, "SELECT * from book");

}*/
  $result = perform_query($dbc, "SELECT * from book WHERE book_name LIKE '%$q%' or book_id LIKE '%$q%'
    or book_description like '%$q%' limit 5");


echo "
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>
<script src=\"js/marquee.js\"></script>
<script src=\"js/searchbar.js\"></script>
<link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap.min.css\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\"css/index.css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"css/global.css\">


<table class=\"table\">
  <thead class=\"thead-inverse\">
    <tr>
      <th>Book ID</th>
      <th>Book Name</th>
      <th>Category ID</th>
      <th>Book Description</th>
    </tr>
  </thead>
  <tbody>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['book_id'] . "</td>";
    echo "<td>" . $row['book_name'] . "</td>";
    echo "<td>" . $row['book_description'] . "</td>";
    echo "</tr>";
  }
}
echo "</tbody>";
echo "</table>";

?>
