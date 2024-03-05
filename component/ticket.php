<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="flex gap-5 border border-gray-400 my-5 p-5 rounded-[5px] hover:shadow-xl duration-300 delay-250  ease-in-out">
        <img src="../image/<?= $r['image_path'] ?>" class="w-[5vw] rounded-[5px]" alt="" />
        <div class="w-full flex flex-col justify-between">
            <h1 class="text-2xl font-semibold text-gray-700"><?= $r['airline_name'] ?></h1>
            <ul class="flex justify-between items-center">
                <li class="text-gray-700 text-[.7rem]">
                    <p><?= $r['departure_time'] ?></p>
                    <p><?= $r['origin_airport_code'] ?></p>
                </li>
                <li class="text-gray-400 text-sm ">
                    <i class="fa-solid fa-plane-departure"></i>
                </li>
                <li class="text-gray-700 text-[.7rem]">
                    <p><?= $r['arrival_time'] ?></p>
                    <p><?= $r['destination_airport_code'] ?></p>
                </li>
                <li class="text-gray-400 text-sm ">
                    <p><i class="fa-solid fa-cart-flatbed-suitcase"></i>
                </li>
                <li class="flex items-center gap-4 text-gray-700">
                    <p>฿<?= $r['price']?></p>
                    <a class="px-2 py-1 bg-orange-500 text-white rounded-[5px] font-semibold" href="">Select</a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>