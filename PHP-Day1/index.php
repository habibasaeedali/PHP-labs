<?php

$data = [
    ["name" => "basmala", "address" => "cairo"],
    ["name" => "habiba", "address" => "sadat"],
    ["name" => "mohammed", "address" => "menoufia"]
];

echo "<table border='1' class='table table-striped'>";

echo "<thead>";

echo "<tr>";

echo "<td>";
echo "Name";
echo "</td>";

echo "<td>";
echo "Address";
echo "</td>";

echo "</tr>";

echo "</thead>";

echo "<tbody>";

for ($i = 0; $i < count($data); $i++) {

    echo "<tr>";

    echo "<td>";
    echo $data[$i]["name"];
    echo "</td>";

    echo "<td>";
    echo $data[$i]["address"];
    echo "</td>";

    echo "</tr>";
}

echo "</tbody>";

echo "</table>";

?>





