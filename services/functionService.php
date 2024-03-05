<?php

require '../connect.php';
$sql = 'SELECT * from ticket
        INNER JOIN flight ON ticket.flight_num = flight.flight_num
        INNER JOIN image ON image.image_id = ticket.image_id
        INNER JOIN stop ON stop.stop_id = ticket.stop_id
        INNER JOIN ticket_type ON ticket_type.ticket_type_id = ticket.ticket_type_id';
$stmt = $conn->prepare($sql);
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);

class FunctionService{
    public $ticket_id;
    public $price;
    public $image_id;
    public $stop_id;
    public $ticket_type_id;
    public $flight_num;

    public function __construct($r){
        $this->ticket_id = $r['ticket_id'];
        $this->price = $r['price'];
        $this->image_id = $r['image_id'];
        $this->stop_id = $r['stop_id'];
        $this->ticket_type_id = $r['ticket_type_id'];
        $this->flight_num = $r['flight_num'];
    }
}

// $obj = new FunctionService($r);
// echo "test = " . $obj->image_id;

?>
