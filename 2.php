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
    if (isset($_REQUEST['teacher']) && isset($_REQUEST['disciple'])) {
        $teacher = $_REQUEST['teacher'];
        $disciple = $_REQUEST['disciple'];
        $cursor = $collection->find(
            [
                'teacher' => $teacher,
                'disciple' => $disciple
            ]
        );
        $key = $teacher."&".$disciple;
        $result = "<table border=1><tr><th>Group</th><th>Day</th><th>Date</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th><th>Teacher</th></tr>";
        foreach ($cursor as $document) {
            $date = $document['date'];
            $group = $document['group'];
            $day = $document['day'];
            $number = $document['number'];
            $auditorium = $document['auditorium'];
            $type = $document['type'];
        
        if (is_object($group)) {
            $group = (array)$group;
            $group = (implode('</br>', $group));
        }
        $result = $result . "<tr><td>$group</td><td>$day</td><td>$date</td><td>$number</td><td>$auditorium</td><td>$disciple</td><td>$type</td><td>$teacher</td></tr>"; 
    }
    echo $result;
    echo "<script> sessionStorage.setItem('$key', '$result'); </script>";
    }
    ?>
</body>
</html>