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

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
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
