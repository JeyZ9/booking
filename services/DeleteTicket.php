<?php 
    require '../connect.php';
    // echo "test params : " . $_GET["ticket_id"];
    
    // $sql_b = 'DELETE FROM booking_detail where ticket_id=:ticket_id';
    // $stmt_b = $conn->prepare($sql_b);
    // $stmt_b->bindParam(":ticket_id",$_GET['ticket_id']);

    $sql_t = 'DELETE FROM ticket where ticket_id=:ticket_id';
    $stmt = $conn->prepare($sql_t);
    $stmt->bindParam(":ticket_id",$_GET['ticket_id']);

    if($stmt->execute()){
        echo "Delete success!";
        echo'
            <script type="text/javascript">
                window.location.href = "../index.php/dev";
            </script>
        ';
    }else{
        echo "Not Found!";
    }
?>