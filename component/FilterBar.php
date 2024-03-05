<?php 
    $stop_drop = false;
    function handdleStop(){
        global $stop_drop;
        $stop_drop = !$stop_drop;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="h-[80vh]">
        <div class="flex flex-col gap-4">
            <h1 class="text-xl font-semibold">Filter</h1>
            <div class="border-b border-gray-500 flex flex-col gap-2">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold">Stop</h1>
                    <button id="stopDrop" onclick="handleStop()"><i class="fa-solid fa-caret-up"></i></button>
                </div>
                <form id="stop_form" action="ticket" method="post" class="stop_form flex flex-col items-start px-5 text-md mb-4">
                    <?php 
                    $stmt_stop->execute(); 
                    while($rStop = $stmt_stop->fetch(PDO::FETCH_ASSOC)){ 
                        $isChecked = isset($_POST['send_stop']) && in_array($rStop['stop_id'], $_POST['send_stop']) ? 'checked' : '';
                    ?>  
                        <div class="flex-row-reverse flex gap-2">
                            <label for="<?= $rStop['stop_id']?>"><?= $rStop['stop_name']?></label>
                            <input type="checkbox" id="<?= $rStop['stop_id']?>" name="send_stop[]" value="<?= $rStop['stop_id']?>" class="stop_checkbox" <?= $isChecked ?> />
                        </div>   
                    <?php }?>
                </form>
            </div>

            <div class="flex flex-col gap-2 border-b border-gray-500">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold">Airline</h1>
                    <button id="dropAirline" onclick="handleAirline()"><i class="fa-solid fa-caret-up"></i></button>
                </div>    
                <ul class="box-airline flex items-start px-5 flex-col text-md mb-4">
                    <li class="flex flex-row-reverse gap-2">
                        <label for="">Thai airAsia</label>
                        <input type="checkbox" disabled="disabled" checked="checked">
                    </li>
                    <li class="flex flex-row-reverse gap-2">
                        <label for="">Thai airAsia</label>
                        <input type="checkbox" disabled="disabled">
                    </li>
                    <li class="flex flex-row-reverse gap-2">
                        <label for="">Thai airAsia</label>
                        <input type="checkbox" disabled="disabled">
                    </li>
                </ul>
            </div>

            <div class="border-b border-gray-500">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold">Departure Time</h1>
                    <button id="dropDeparture" onclick="handleDeparture()"><i class="fa-solid fa-caret-up"></i></button>
                </div> 
                <ul class="box-departure flex items-start px-5 flex-col text-md mb-4">
                    <li class="flex flex-row-reverse gap-2 ">
                        <div class="flex flex-col">
                            <label for="">Early FLight</label>
                            <p class="text-[.7rem]">(00:00-06:00)</p>
                        </div>
                        <input type="checkbox" class='-translate-y-2' disabled="disabled" checked="checked" />
                    </li>
                    <li class="flex flex-row-reverse gap-2">
                        <div class="flex flex-col">
                            <label for="">Morning Flight</label>
                            <p class="text-[.7rem]">(06:00-12:00)</p>
                        </div>
                        <input type="checkbox" class='-translate-y-2' disabled="disabled" checked="checked" />
                    </li>
                    <li class="flex flex-row-reverse gap-2">
                        <div class="flex flex-col">
                            <label for="">Afternoon Flight</label>
                            <p class="text-[.7rem]">(12:00-18:00)</p>
                        </div>
                        <input type="checkbox" class='-translate-y-2' disabled="disabled" checked="checked" />
                    </li>
                    <li class="flex flex-row-reverse gap-2">
                        <div class="flex flex-col">
                            <label for="" class="">Night Flight</label>
                            <p class="text-[.7rem]">(18:00-00:00)</p>
                        </div>
                        <input type="checkbox" class="-translate-y-2" disabled="disabled" checked="checked" />
                    </li>
                </ul>
            </div>
        </div>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkboxes = document.querySelectorAll(".stop_checkbox");
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener("change", function() {
                document.getElementById("stop_form").submit();
            });
        });
    });

    let stop = true;
    let airline = true;
    let departure = true;
    const handleStop = () => {
        stop = !stop;
        console.log(stop);

        let dropdownContent = document.getElementsByClassName('stop_form')[0];
        let stop_btn = document.getElementById('stopDrop');
        
        while (stop_btn.firstChild) {
            stop_btn.removeChild(stop_btn.firstChild);
        }

        let icon = document.createElement('i');

        if (stop) {
            dropdownContent.style.display = 'flex';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-up');
        } else {
            dropdownContent.style.display = 'none';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-down');
        }
        
        stop_btn.appendChild(icon);
    }

    const handleAirline = () => {
        airline = !airline;
        console.log(airline);

        let dropdownContent = document.getElementsByClassName('box-airline')[0]; // Access the first element in the collection
        let dropdownButton = document.getElementById('dropAirline');
        
        while (dropdownButton.firstChild) {
            dropdownButton.removeChild(dropdownButton.firstChild);
        }

        let icon = document.createElement('i');

        if (airline) {
            dropdownContent.style.display = 'flex';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-up');
        } else {
            dropdownContent.style.display = 'none';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-down');
        }
        
        dropdownButton.appendChild(icon);
    }

    const handleDeparture = () => {
        departure = !departure;
        console.log(departure);

        let dropdownContent = document.getElementsByClassName('box-departure')[0]; // Access the first element in the collection
        let dropdownButton = document.getElementById('dropDeparture');
        
        while (dropdownButton.firstChild) {
            dropdownButton.removeChild(dropdownButton.firstChild);
        }

        let icon = document.createElement('i');

        if (departure) {
            dropdownContent.style.display = 'flex';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-up');
        } else {
            dropdownContent.style.display = 'none';
            icon.classList.add('fa', 'fa-solid', 'fa-caret-down');
        }
        
        dropdownButton.appendChild(icon);
    }
    
    
    

</script>
</body>
</html>
