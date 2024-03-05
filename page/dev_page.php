<?php

    require './connect.php';

    $sql = "SELECT * FROM ticket
            INNER JOIN flight ON ticket.flight_num = flight.flight_num
            INNER JOIN image ON image.image_id = ticket.image_id
            INNER JOIN stop ON stop.stop_id = ticket.stop_id
            INNER JOIN ticket_type ON ticket_type.ticket_type_id = ticket.ticket_type_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        input{
            border: 1px solid #808080;
            border-radius: 5px;
            padding: 1px 2px;
            transition-duration: 300;
            transition-delay: 250;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        input:focus{
            outline: none;
        }
        input:hover{
            border-color: orange;
        }
    </style>
</head>
<body>
    <div class="h-[80vh]">
        <div class="flex justify-between items-center my-5">
            <h1 class="text-[2rem] font-semibold">TICKET LIST</h1>
            <a href="dev/ticket/create" class="mx-10 text-sm border-2 delay-250 duration-300 ease-in-out border-orange-400 text-orange-400 hover:text-white hover:bg-orange-400 px-3 py-1"><i class="fa-solid fa-plus">TICKET</i></a>
        </div>
        <form method="post">
            <table id="ticketTable" class="min-w-full w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="py-3 px-5">
                            <h1>ID</h1>
                        </th>
                        <th class="py-3 px-5">
                            <h1>Flight Num</h1>
                        </th>
                        <th class="py-3 px-5">
                            <h1>Price</h1>
                        </th>
                        <th class="py-3 px-5 text-center">
                            <h1>Image</h1>
                        </th>
                        <th class="py-3 px-5">
                            <h1>Stop</h1>
                        </th>
                        <th class="py-3 px-5">
                            <h1>Ticket Type</h1>
                        </th>
                        <th class="py-3 px-5 text-center">
                            <h1>Edit</h1>
                        </th>
                        <th class="py-3 px-5 text-center">
                            <h1>Delete</h1>
                        </th>
                    </tr>
                </thead>
                <tBody>
                    <?php foreach($results as $r){?>
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <td class="px-5 py-2"><?=$r['ticket_id'] ?></td>
                            <td class="px-5 py-2"><?=$r['flight_num']?></td>
                            <td class="px-5 py-2"><?=$r['price']?></td>
                            <td class="px-5 py-2 flex justify-center items-center"><img class="w-[2em] my-auto" src="../image/<?=$r['image_path']?>" alt=""></td>
                            <td class="px-5 py-2"><?=$r['stop_name']?></td>
                            <td class="px-5 py-2"><?=$r['ticket_type_name']?></td>
                            <td class="px-5 py-2"><a href="../index.php/dev/ticket/edit?ticket_id=<?= $r['ticket_id']?>" class="flex justify-center hover:text-orange-500 delay-250 duration-300 ease-in-out"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td class="px-5 py-2"><a href="../services/DeleteTicket.php?ticket_id=<?= $r['ticket_id']?>" class="flex justify-center hover:text-red-500 delay-250 duration-300 ease-in-out"><i class="fa-regular fa-trash-can"></i></a></td>
                        </tr>
                    <?php } ?>
                </tBody>
            </table>
        </form>
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                var dataTable = $('#ticketTable').DataTable({
                    "paging": true,         // Enable pagination
                    "ordering": true,       // Enable ordering (sorting)
                    "searching": true,      // Enable search functionality
                    "info": true,           // Enable table information display
                    "responsive": true 
                });

                $('#ticketTable').on('keyup', function() {
                    dataTable.search(this.value).draw();
                })
            });
        </script>
    </div>
</body>
</html>