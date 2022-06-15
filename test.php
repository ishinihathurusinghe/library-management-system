<?php
 include "connection.php";

?>
<!DOCTYPE html>	 
<html>
<head>
    <title>Books</title>
    <style type="text/css">

.srch
{
    padding-left:1000px;
}

    </style>
    </head>
    <body>
    <!--____________________________________search bar________________________-->

    <div class="srch">
      <form class="navbar-form" method="post" name="form1">
    
       <input  type="text" name="search" placeholder="Search Your Books.." required="">
       <button  style="background-color:brown;" type="submit" name="submit" class="btn btn-default">
       <span class="glyphicon glyphicon-search"></span>
       </button>
       </form>
   </div>
<h2>List Of Books</h2>
<?php

if(isset($_POST['submit']))
{
   $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' "); 

   if(mysqli_num_rows($q)==0)
   {
     echo " Sorry No Books Found,Try Searching Again.";
   }
   else
   {
     echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: brown;'>";
        echo "<th>";  echo "ID" ;echo "</th>";
        echo "<th>";  echo " Book-Name" ;echo "</th>";
        echo "<th>";  echo "Author-Name" ;echo "</th>";
        echo "<th>";  echo "Edition" ;echo "</th>";
        echo "<th>";  echo "Status" ;echo "</th>";
        echo "<th>";  echo "Quantity" ;echo "</th>";
        echo "<th>";  echo "Department" ;echo "</th>";
    echo"</tr>"; 
    while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      }
    echo "</table>";
   }
}
/* if button is not pressed.*/
else
{
  
       $res=mysqli_query($db,"SELECT * FROM `books`ORDER BY `books`.`name` ASC;");

       echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: brown;'>";
        echo "<th>";  echo "ID" ;echo "</th>";
        echo "<th>";  echo " Book-Name" ;echo "</th>";
        echo "<th>";  echo "Author-Name" ;echo "</th>";
        echo "<th>";  echo "Edition" ;echo "</th>";
        echo "<th>";  echo "Status" ;echo "</th>";
        echo "<th>";  echo "Quantity" ;echo "</th>";
        echo "<th>";  echo "Department" ;echo "</th>";
    echo"</tr>"; 
    while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>";

        echo "</tr>";
      } 
    echo "</table>"; 

}
   ?>   
</body>
</html> 
