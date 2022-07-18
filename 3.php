<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   include "connection.php";
    if (isset($_REQUEST['auditorium'])) {
    $auditorium = $_REQUEST['auditorium'];
    $cursor = $collection->find(['auditorium' => $auditorium]
    );
    $result = "<table border=1><tr><th>Group</th><th>Day</th><th>Date</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th><th>Teacher</th></tr>";
    foreach ($cursor as $document) {
    $group = $document['group'];
    $date = $document['date'];
    $day = $document['day'];
    $number = $document['number'];
    $teacher = $document['teacher'];
    $disciple = $document['disciple'];
    $type = $document['type'];
    if (is_object($group)) {
        $group = (array)$group;
        $group = (implode('</br>', $group));
    }

    if (is_object($teacher)) {
        $teacher = (array)$teacher;
        $teacher = (implode('</br>', $teacher));
    }
    $result = $result . "<tr><td>$group</td><td>$day</td><td>$date</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>"; 
}
echo $result;
echo "<script> sessionStorage.setItem('$auditorium', '$result'); </script>";
}
   ?> 
</body>
</html>