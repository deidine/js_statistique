<?php
  $username = "root";
  $password = "";  
  $host = "localhost";
  $database="hospital";
  $sym=$_POST['symptom'];
  // connect to database
  $conx = mysqli_connect("localhost","root","","hospital");

$rtSql = "Select  symptom,email  from appointments where symptom='$sym'";
    $resultrtSql = mysqli_query($conx, $rtSql);
    $arr = array();
    $json = array();
    if(mysqli_num_rows($resultrtSql)){
        while($row = mysqli_fetch_assoc($resultrtSql))
        $row2[]=$row;
        // array_push($json, array($row['Seat_No'], $row['Occupied'],$row['Gender']));
        // $routeJson = json_encode($arr);
    }
    if(!empty($row2)){
        $result['type'] = "success";
        $result['result'] = $row2;
        }else{
        $result['type'] = "error";
        $result['result'] = "No result found";
        }

        echo json_encode($row2);
      
        ?>