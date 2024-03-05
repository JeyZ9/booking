<?php
    require './connect.php';

    $dblist = ['image','stop','flight','ticket_type'];
    foreach($dblist as $list){
        $sql = "SELECT * FROM $list";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result[$list] = $stmt->fetchAll();
    }

    $sql_is = "INSERT INTO ticket values (:ticket_id, :price, :flight_num, :image_id, :stop_id, :ticket_type_id)";
    $stmt_is = $conn->prepare($sql_is);
    $stmt_is->bindParam(":ticket_id",$_POST['ticket_id']);
    $stmt_is->bindParam(":price",$_POST['price']);
    $stmt_is->bindParam(":image_id",$_POST['image']);
    $stmt_is->bindParam(":flight_num",$_POST['flight_num']);
    $stmt_is->bindParam(":stop_id",$_POST['stop']);
    $stmt_is->bindParam(":ticket_type_id",$_POST['ticket_type']);
    if (isset($_POST['submit'])) {
        try {
            if ($stmt_is->execute()) {
                echo 'Success!';
                header("Location: create");
                exit();
            } else {
                throw new Exception("Error executing SQL statement");
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="uppercase text-2xl font-semibold">Create Ticket</h1>
    <form action="create" method="post" class="h-[80vh] relative">
        <div class="grid grid-cols-2 gap-5 my-10">
            <div class="flex flex-col">
                <label for="ticket_id">TICKET ID</label>
                <input name="ticket_id" id="ticket_id" type="text" maxlength="5" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1" required/>
            </div>
            <div class="flex flex-col">
                <label for="price">PRICE</label>
                <input name="price" id="price" type="text" maxlength="5" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1" required/>
            </div>
            <div class="flex flex-col">
                <label for="image">IMAGE</label>
                <select name="image" id="image" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1">
                    <option selected hidden></option>
                    <?php foreach($result["image"] as $rim){?>
                        <option value="<?= $rim['image_id']?>"><?= $rim['image_path']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="flight_num">FLIGHT NUM</label>
                <select name="flight_num" id="flight_num" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1">
                    <option selected hidden></option>    
                    <?php foreach($result["flight"] as $rf){?>
                            <option value="<?= $rf['flight_num']?>"><?= $rf['flight_num']?></option>
                        <?php } ?>
                    </select>
            </div>
            <div class="flex flex-col">
                <label for="stop">STOP</label>
                <select name="stop" id="stop" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1">
                    <option selected hidden></option>
                    <?php foreach($result["stop"] as $rs){?>
                        <option value="<?= $rs['stop_id']?>"><?= $rs['stop_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="ticket_type">TICKET TYPE</label>
                <select name="ticket_type" id="ticket_type" class="border-b hover:border-orange-500 delay-250 duration-300 ease-in-out focus:outline-none px-2 py-1">
                    <option selected hidden></option>
                    <?php foreach($result["ticket_type"] as $rttk){?>
                        <option value="<?= $rttk['ticket_type_id']?>"><?= $rttk['ticket_type_name']?></option>
                    <?php } ?>
                </select>
            </div>
            <button name="submit" type="submit" class="border-4 border-orange-400 text-orange-400 text-lg font-semibold py-2 hover:bg-orange-400 hover:text-white delay-250 duration-300 ease-in-out">ADD</button>
        </div>
    </form>
    <?php
    echo isset($_POST['submit']);
    if (isset($_POST["submit"]) && $_POST['submit']) {
        ?>
        <div class="fixed right-0 min-w-[30vw] translate-y-[15vh]">
            <?php require "./component/alert.php" ?>
        </div>
        <?php
    }
    ?>

    <script>
        
    </script>
</body>
</html>