<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro व्यंजन</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <nav class="navbar navbar-expand-lg  px-3 sticky-top fw-bold" style="font-size: 0.8em;background:#8B0000 ">
        <a class="navbar-brand" href="index1.html" style="text-decoration:none;">
            <h1 class="m-0" style="color: green;">Hamro <span style="color: yellow;">व्यंजन</span></h1>
        </a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <h2 class="m-0" style="color:yellow;">Home</h2>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="index3.php">
                        <h2 class="m-0 text-white">Recipe</h2>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        <h2 class="m-0 text-white">Contact</h2>
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <main class="main bg-custom-gray fw-bold" style="background-color: white;">
        <div style="height: 100vh; width: 100%; overflow: hidden;">
            <img src="/food/website/template/food1.png" style="width: 100%; height: 100vh; object-fit: cover;">
            <div class="position-relative" style="height: 200px;">
                <p class="position-absolute z-5 text-center"
                    style="top: -320px; left: 37%; transform: translateX(-30%); z-index: 100; 
            font-size: clamp(30px, 5vw, 70px); 
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    Welcome to <span style="color: #04A956;">Hamro</span>
                    <span style="color: #D3C500;">व्यंजन</span>
                </p>
            </div>

        </div>

        <div class="container-fluid bg-custom-gray p-5" style="background-color: #D9D9D9; height:auto; width: 98.5vw;">
            <h2 class="text-center mb-4 text-dark fw-bold">Featured Restaurants</h2>

            <div class="d-flex overflow-auto bg-warning">
                <div class="flex-shrink-0  p-3 me-3" style="width: 250px;">
                    <img src="/food/website/template/Rectangle 1.png" alt="_Fire And Ice Pizzeria - Thamel" class="img-fluid rounded shadow">
                    <div class="mt-2 fw-semibold text-truncate">Fire And Ice Pizzeria- Thamel</div>
                </div>
                <div class="flex-shrink-0  p-3 me-3" style="width: 250px;">
                    <img src="/food/website/template/Rectangle 2.png" alt="_Burger Shack - Kamaladi" class="img-fluid rounded shadow">
                    <div class="mt-2 fw-semibold text-truncate">Burger Shack- Kamaladi</div>
                </div>
                <div class="flex-shrink-0  p-3 me-3" style="width: 250px;">
                    <img src="/food/website/template/Rectangle 3.png" alt="_Kathmandu Marriott" class="img-fluid rounded shadow">
                    <div class="mt-2 fw-semibold text-truncate">Kathmandu Marriott</div>
                </div>
                <div class="flex-shrink-0  p-3 me-3" style="width: 250px;">
                    <img src="/food/website/template/Rectangle 4.png" alt="_4 Corners - Detroit Style Pizza" class="img-fluid rounded shadow">
                    <div class="mt-2 fw-semibold text-truncate">4 Corners - Detroit Style Pizza</div>
                </div>


            </div>
        </div>
        <div class="container mt-4 d-flex justify-content-center" style="height: 500px;">
            <div class="bg-warning text-dark d-flex flex-column justify-content-center align-items-center text-center"
                style="width: 50%; height: 450px; background-color: #D3C500; border-radius:20px;">

                <h3 class="text-success mb-3" style="font-size: 40px;">About Us</h3>
                <p class="p-1 text-dark fw-bold" style="font-size: 30px;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                    This is the best platform from where you can make your own food in a beginner-friendly way.
                </p>

            </div>
        </div>

        <div class="container-fluid bg-custom-gray p-5" style="background-color: #D9D9D9;">
            <h2 class="text-center mb-4 text-dark fw-bold">Explore Our Sections</h2>
            <div class="d-flex justify-content-center align-items-stretch gap-4 flex-wrap">

               


                <a href="index3.php" class="flex-shrink-0 p-3 text-center"
                    style="width: 300px; text-decoration: none; color: inherit;">
                    <img src="/food/website/template/Rectangle 9.png" alt="Burger Shack - Kamaladi" class="img-fluid"
                        style="max-height: 300px; object-fit: cover;">
                    <div class="mt-2 fw-bold">Recipes</div>
                </a>
            </div>
        </div>
        <footer>
            <div class="position-relative" style="height: 200px; width: 100%;">
                <div class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: rgba(0, 0, 0, 0.1); backdrop-filter: blur(5px); z-index: 1;">
                </div>


                <div class="position-relative z-2 container h-100 d-flex justify-content-center align-items-center">
                    <div class="row w-100 text-center bg-white bg-opacity-75 p-3 rounded">

                        <div class="col-md-6 mb-2 mb-md-0">
                            <h5>Email</h5>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>

                        <div class="col-md-6">
                            <h5>Phone</h5>
                            <p><a href="tel:+1234567890">+1 234 567 890</a></p>
                        </div>
                    </div>
                </div>
            </div>


        </footer>



    </main>




</body>

</html>