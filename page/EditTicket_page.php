<?php
    require 'connect.php';

    $dblist = ["image","flight","ticket","stop","ticket_type"];

    foreach($dblist as  $list){
        $sql_select = "SELECT * FROM $list";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->execute();
        $result_select[$list] = $stmt_select->fetchAll();
    }

    $sql = 'SELECT * FROM ticket
    INNER JOIN flight ON ticket.flight_num = flight.flight_num
    INNER JOIN image ON image.image_id = ticket.image_id
    INNER JOIN stop ON stop.stop_id = ticket.stop_id
    INNER JOIN ticket_type ON ticket_type.ticket_type_id = ticket.ticket_type_id';

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tk_all = $stmt->fetchAll();

    $sql_all = 'SELECT * FROM ticket WHERE ticket_id = :ticket_id';
    $stmt_all = $conn->prepare($sql_all);
    $stmt_all->bindParam(":ticket_id",$_GET['ticket_id']);
    $stmt_all->execute();
    $results_all = $stmt_all->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="text-gray-700 h-[80vh]">
        <form action="/booking/services/EditTicket.php" method="post" class="grid grid-cols-3 w-full h-full gap-3">
            <!-- container one -->
            <div class="col-span-2 border border-gray-300 p-5 h-[80vh]">
                <h1 class="text-2xl my-auto font-bold text-center">EDIT TICKET</h1>
                <div class=" grid grid-cols-2 gap-x-4 my-10 gap-y-10">
                    
                    <div class="flex flex-col my-auto">
                        <label class="text-lg font-semibold" for="">TICKET ID</label>
                        <input type="text" name="ticket_id" value="<?= $results_all['ticket_id'] ?>" readonly class="focus:outline-none min-w-[15vw] rounded-[5px] border-b border-gray-300 px-4 py-2 hover:border-orange-500 delay-250 duration-300 ease-in-out" />
                    </div>
                    
                    <div class="flex flex-col my-auto">
                        <label class="text-lg font-semibold" for="">FLIGHT NUM</label>
                        <select name="flight_num" id="" class="focus:outline-none min-w-[15vw] rounded-[5px] border-b border-gray-300 px-4 py-2 hover:border-orange-500 delay-250 duration-300 ease-in-out">
                            <?php foreach($result_select["flight"] as $rf) { ?>
                                <option value="<?= $rf['flight_num'] ?>" <?= $results_all['flight_num'] === $rf['flight_num'] ? 'selected' : '' ?>><?= $rf['flight_num']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="flex flex-col my-auto">
                            <label class="text-lg font-semibold" for="">STOP</label>
                            <select name="stop_id" id="" class="focus:outline-none min-w-[15vw] rounded-[5px] border-b border-gray-300 px-4 py-2 hover:border-orange-500 delay-250 duration-300 ease-in-out">
                                <?php foreach($result_select["stop"] as $rs) { ?>
                                    <option value="<?= $rs['stop_id'] ?>" <?= $results_all['stop_id'] === $rs['stop_id'] ? 'selected' : '' ?>><?= $rs['stop_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="flex flex-col my-auto">
                            <label class="text-lg font-semibold" for="">TICKET TYPE</label>
                            <select name="ticket_type_id" id="" class="focus:outline-none min-w-[15vw] rounded-[5px] border-b border-gray-300 px-4 py-2 hover:border-orange-500 delay-250 duration-300 ease-in-out">
                            <?php foreach($result_select["ticket_type"] as $rtt) { ?>
                                <option value="<?= $rtt['ticket_type_id']?>"<?= $results_all['ticket_type_id'] === $rtt['ticket_type_id'] ? 'selected' : '' ?>><?= $rtt['ticket_type_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                            
                        <div class="flex flex-col my-auto">
                            <label class="text-lg font-semibold" for="">PRICE</label>
                            <input type="text" name="price" value="<?= $results_all['price'] ?>" class="focus:outline-none min-w-[15vw] rounded-[5px] border-b border-gray-300 px-4 py-2 hover:border-orange-500 delay-250 duration-300 ease-in-out" />
                        </div>
                    </div>
                </div>
            <!-- container two -->
            <div class="col-span-1 flex-col justify-between flex overflow-x-hidden overflow-y-auto" >
                <div class="border border-gray-300 py-5 px-1 h-[60vh] flex flex-col items-center gap-y-5">
                    <h1 class="text-lg font-semibold">List Ticket</h1>
                    <table class="text-xs text-gray-700 uppercase bg-gray-50">
                        <thead>
                            <tr>
                                <th class="py-1 px-[6px]"><h1>FLIGHT NUM</h1></th>
                                <th class="py-1 px-[6px]"><h1>STOP</h1></th>
                                <th class="py-1 px-[6px]"><h1>TICKET TYPE</h1></th>
                                <th class="py-1 px-[6px]"><h1>PRICE</h1></th>
                                <th class="py-1 px-[6px]"><h1>SELECT</h1></th>
                            </tr>
                        </thead>
                        <tbody class="text-[10px]">
                            <?php foreach($tk_all as $ra){?>
                                <tr class="odd:bg-white even:bg-gray-50 border-b">
                                    <td class="px-[6px] text-center py-2"><?= $ra['flight_num']?></td>
                                    <td class="px-[6px] text-center py-2"><?= $ra['stop_name']?></td>
                                    <td class="px-[6px] text-center py-2"><?= $ra['ticket_type_name']?></td>
                                    <td class="px-[6px] text-center py-2"><?= $ra['price']?></td>
                                    <td class="px-[6px] text-center py-2"><a href="edit?ticket_id=<?= $ra['ticket_id']?>" class="hover:text-orange-500 delay-250 duration-300 ease-in-out"><i class="fa-solid fa-ticket"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button name="submit" type="submit" class="flex items-center justify-center border-4 border-orange-400 hover:bg-orange-400 hover:text-white w-full text-orange-400 py-5 my-auto font-semibold delay-250 duration-300 ease-in-out">Confirm</button>
            </div>
        </form>
    </div>
</body>
</html>