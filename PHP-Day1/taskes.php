1- Print “Welcome to php” 
 <?php
 echo ("Welcome to php");
 ?>

<!-- ============== -->

<!-- 
2- Define the below variables  $x=5 
$y=’Welcome ’ 
$z=True  -->

<?php

$x = 5;
$y = "Welcome";
$z = true;

?>
<!-- =================== -->
<!-- 3- Display the type of each variable  -->

<!-- 
 <?php
$x = 5;
$y = "Welcome";
$z = true;

echo gettype($x) . "<br>";
echo gettype($y) . "<br>";
echo gettype($z) . "<br>";

?>

<!-- ================= -->

 <!-- 4- Write a php script to print numbers from 0 to 15 using 2 methods  -->
                      <!-- //one methods -->
<?php

for ($i = 0; $i <= 15; $i++) {
    echo $i . "<br>";
}

?>
                 <!-- // two methods -->
     <?php

$i = 0;

while ($i <= 15) {
    echo $i . "<br>";
    $i++;
}

?>

<!-- ============================ -->
         <!-- 5- Define a constant with value “ITI”  -->
<?php

const ITI = "ITI";

echo ITI;

?>

<!-- ==================== -->
          <!-- 6- Print the gettype of all variables  -->
 <?php

$x = 10;
$y = "Welcome";
$z = true;

echo gettype($x) . "<br>";
echo gettype($y) . "<br>";
echo gettype($z) . "<br>";

?> 

<!-- =============== -->
    <!-- 7- Print the isset of all variables  -->
<?php

$x = 5;
$y = "Welcome";
$z = true;

var_dump(isset($x));
echo "<br>";

var_dump(isset($y));
echo "<br>";

var_dump(isset($z));

?>

<!-- ==================== -->
   <!-- 8- Print the empty of all variables  -->
  <?php

$x = 5;
$y = "";
$z = true;

var_dump(empty($x));
echo "<br>";

var_dump(empty($y));
echo "<br>";

var_dump(empty($z));

?>
<!-- ======================== -->
<!-- 9- Add two numbers m and n and store them in result -then check if 
result > 50 print Accepted else print Not accepted  -->

<?php

$m = 30;
$n = 25;

$result = $m + $n;

if ($result > 50) {
    echo "Accepted";
} else {
    echo "Not accepted";
}

?>
<!-- ========================= -->
   <!-- 10- Write a e PHP script to display string, values within a table.  -->
 <?php

$name = "Habiba";
$age = 19;
$city = "Sadat";

echo "
<table border='1'>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
    </tr>
    <tr>
        <td>$name</td>
        <td>$age</td>
        <td>$city</td>
    </tr>
</table>
";

?>
<!-- =============================    -->
   <!-- We need a function that can transform a number into a string. 
     What ways of achieving this do you know?  -->
   
 $num = 123;

$str = (string)$num;

echo $str; 

<!-- ======================== -->

$num = 123;

$str = strval($num);

echo $str;