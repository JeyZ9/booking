<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../index.css"> -->
    <style>
        #image-section {
            background-image: url("./image/download.png");
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
    <section id="image-section" class="font-bold text-white h-[40vh] flex justify-center">
        <div class="flex flex-col justify-center items-center text-[2.5rem] gap-5 w-[1024px] h-full bg-[#80808080]">
            <h1 class="hover:border-b-2 hover:text-orange-300 border-orange-300 delay-250 duration-300 ease-in-out">Travel In Thailand</h1>
            <a href="#section-2"><i class="fa-solid fa-arrow-down-long"></i></a>
        </div>
    </section>    
    <section id="section-2" class="my-20 grid grid-cols-2 h-auto">
        <div class="bg-orange-200 group relative flex items-center justify-center z-20">
            <img class="w-full h-full z-20 group-scale-125" src="./image/about.jpg" alt="">
            <div class="absolute text-white text-xl font-bold flex items-center justify-center group-hover:z-30 w-full h-full bg-[#ffffff50]">
                <a href="" class="translate-x-[80vw] group-hover:translate-x-0 transition delay-500 duration-500 ease-in-out z-40">GET START</a>
            </div>
        </div>
        <div class="p-5">
            <h1 class="text-xl font-semibold">ABOUT!</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa tenetur quia eos exercitationem nobis aut, ratione magni ullam officiis excepturi.</p>
        </div>
        <div class="p-5">
            <h1 class="text-xl font-semibold">Description.</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa tenetur quia eos exercitationem nobis aut, ratione magni ullam officiis excepturi.</p>
        </div>
        <div class="bg-orange-200 group relative flex items-center justify-center z-20 overflow-hidden">
            <img class="w-full h-full z-20 group-scale-125" src="./image/description.jpg" alt="">
            <div class="absolute text-white text-xl font-bold flex items-center justify-center group-hover:z-30 w-full h-full bg-[#ffffff50]">
                <a href="" class="translate-x-[80vw] group-hover:translate-x-0 transition delay-500 duration-500 ease-in-out z-40">GET START</a>
            </div>
        </div>
    </section>
</body>
</html>