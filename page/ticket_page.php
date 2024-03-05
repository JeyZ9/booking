<?php
$search = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send_stop'])) {
    $search_values = array_map('htmlspecialchars', $_POST['send_stop']);    
    $search = "WHERE ticket.stop_id IN ('" . implode("', '", $search_values) . "')";
}

require './connect.php';

$sql = "SELECT * FROM ticket
        INNER JOIN flight ON ticket.flight_num = flight.flight_num
        INNER JOIN image ON image.image_id = ticket.image_id
        INNER JOIN stop ON stop.stop_id = ticket.stop_id
        INNER JOIN ticket_type ON ticket_type.ticket_type_id = ticket.ticket_type_id
        $search";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql_stop = "SELECT * FROM stop";
$stmt_stop = $conn->prepare($sql_stop);
$stmt_stop->execute();
$stops = $stmt_stop->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../index.css" />
</head>
<body>
    <div class="grid grid-cols-4 w-full h-full gap-5">
        <div class="col-span-1"></div>
        
        <div class="col-span-1 overflow-auto on-scrollbar">
            <?php require './component/FilterBar.php'; ?>
        </div>
        
        <div class="col-span-2 overflow-auto on-scrollbar">
            <?php foreach ($results as $r) { ?>
                <?php require './component/ticket.php';?>
            <?php } ?>
        </div>
    </div>
</body>
</html>
