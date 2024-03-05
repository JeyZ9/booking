<?php

if(isset($_POST['submit'])):
    $sql_up = "UPDATE ticket set ticket_id = :ticket_id, price = :price, flight_num = :flight_num, stop_id = :stop, ticket_type_id = :ticket_type WHERE ticket_id = :ticket_id";
    $stmt_up = $conn->prepare($sql_up);
    $stmt_up->bindParam(":flight_num",$_POST['flight_num']);
    $stmt_up->bindParam(":stop",$_POST['stop']);
    // $stmt_up->bindParam(":image_id",$_POST['image_id']);
    $stmt_up->bindParam(":ticket_type_id",$_POST['ticket_type']);
    $stmt_up->bindParam(":price",$_POST['price']);
    $stmt_up->bindParam(":ticket_id",$_POST['ticket_id']);
    echo 'flight_num = '.$_POST['flight_num']. "<br>";
    echo 'stop = '.$_POST['stop']. "<br>";
    echo 'ticket_type_id = '.$_POST['ticket_type']. "<br>";
    echo 'price = '.$_POST['price'] . "<br>";
    echo 'ticket_id = '.$_POST['ticket_id'] . "<br>";
    // echo 'image_id = '.$_POST['image_id'] . "<br>";
        if($stmt_up->execute()){
            echo '
                <script>
                    alert("success!")
                </script>
            ';
        }
endif;

?>