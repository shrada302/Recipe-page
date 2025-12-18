<?php

$conn = mysqli_connect("127.0.0.1", "root", "biralo", "users", 3307);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

session_start();
if (!isset($_SESSION['username'])) {
    // redirect to login if not logged in
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];



if (isset($_POST['post_comment'])) {
    if (!empty($_POST['comment'])) {
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $sql = "INSERT INTO comments (username, comment) VALUES ('$username', '$comment')";
        mysqli_query($conn, $sql);
    }
}
?>



<?php
// Recipe data array
$recipes = [
    [
        'id' => 1,
        'name' => 'Fire & Ice Style Pizza',
        'price' => '1,210.55',
        'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=500&h=300&fit=crop',
        'category' => 'Signature Pizza',
        'ingredients' => [
            'Pizza dough (store bought, makes 2)',
            'Olive oil (about 3-4 tbsp)',
            'Tomato sauce (homemade or store-bought)',
            'Fresh mozzarella (sliced thin)',
            'Parmesan cheese',
            'Fresh basil leaves',
            'Red pepper flakes',
            'Bell peppers (red, yellow, green)',
            'Mushrooms (sliced)',
            'Olives and oregano'
        ],
        'steps' => [
            'Preheat oven to 475°F (245°C)',
            'Roll out pizza dough on floured surface',
            'Transfer dough to pizza pan',
            'Brush with olive oil',
            'Spread tomato sauce evenly',
            'Add mozzarella and toppings',
            'Layer vegetables and cheese',
            'Sprinkle herbs and seasonings',
            'Bake for 12-15 minutes until golden',
            'Let cool 5 minutes, slice and serve!'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Panipuri',
        'price' => '1,210.55',
        'image' => 'https://images.unsplash.com/photo-1606491956689-2ea866880c84?w=500&h=300&fit=crop',
        'category' => 'My Favourite',
        'ingredients' => [
            'Ready-made puris (50-60 pieces)',
            'Boiled potatoes (3-4, mashed)',
            'Boiled chickpeas (1 cup)',
            'Tamarind chutney',
            'Mint-coriander chutney',
            'Spiced water (pani)',
            'Chaat masala',
            'Red chili powder',
            'Black salt',
            'Fresh coriander leaves'
        ],
        'steps' => [
            'Prepare spiced water with mint, coriander, and spices',
            'Mix mashed potatoes with chickpeas and spices',
            'Make a small hole in each puri',
            'Fill puris with potato-chickpea mixture',
            'Add tamarind chutney',
            'Add mint-coriander chutney',
            'Pour spiced water into puris',
            'Garnish with sev and coriander',
            'Serve immediately',
            'Enjoy the burst of flavors!'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Pasta',
        'price' => '1,395.50',
        'image' => 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=500&h=300&fit=crop',
        'category' => 'Pizza',
        'ingredients' => [
            'Pasta (penne or spaghetti - 400g)',
            'Olive oil (3 tbsp)',
            'Garlic (4 cloves, minced)',
            'Cherry tomatoes (2 cups)',
            'Fresh basil leaves',
            'Parmesan cheese (grated)',
            'Heavy cream (1 cup)',
            'Salt and pepper',
            'Red pepper flakes',
            'Italian herbs'
        ],
        'steps' => [
            'Boil pasta in salted water until al dente',
            'Heat olive oil in large pan',
            'Sauté garlic until fragrant',
            'Add cherry tomatoes and cook until soft',
            'Add cream and bring to simmer',
            'Season with salt, pepper, and herbs',
            'Drain pasta and add to sauce',
            'Toss well to coat',
            'Add fresh basil and parmesan',
            'Serve hot with extra cheese!'
        ]
    ],
    [
        'id' => 4,
        'name' => 'Fungina',
        'price' => '1,210.55',
        'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?w=500&h=300&fit=crop',
        'category' => 'Signature Pizza',
        'ingredients' => [
            'Pizza dough',
            'White sauce (bechamel)',
            'Fresh mushrooms (500g, sliced)',
            'Mozzarella cheese',
            'Truffle oil',
            'Fresh thyme',
            'Garlic (minced)',
            'Butter',
            'Parmesan cheese',
            'Black pepper'
        ],
        'steps' => [
            'Preheat oven to 475°F',
            'Sauté mushrooms in butter and garlic',
            'Roll out pizza dough',
            'Spread white sauce on dough',
            'Add sautéed mushrooms',
            'Layer with mozzarella cheese',
            'Drizzle with truffle oil',
            'Add fresh thyme',
            'Bake for 12-15 minutes',
            'Finish with parmesan and serve!'
        ]
    ],
    [
        'id' => 5,
        'name' => 'Home',
        'price' => '1,425.50',
        'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=500&h=300&fit=crop',
        'category' => 'Pizza',
        'ingredients' => [
            'Pizza dough',
            'Tomato sauce',
            'Mozzarella cheese',
            'Pepperoni',
            'Bell peppers',
            'Onions',
            'Black olives',
            'Italian sausage',
            'Fresh oregano',
            'Olive oil'
        ],
        'steps' => [
            'Preheat oven to 450°F',
            'Roll pizza dough on baking sheet',
            'Brush edges with olive oil',
            'Spread tomato sauce evenly',
            'Add layer of mozzarella',
            'Arrange pepperoni and toppings',
            'Add vegetables',
            'Sprinkle with oregano',
            'Bake 15-18 minutes until crispy',
            'Let rest 5 minutes before slicing'
        ]
    ],
    [
        'id' => 6,
        'name' => 'Fire And Ice',
        'price' => '1,225.50',
        'image' => 'https://images.unsplash.com/photo-1571997478779-2adcbbe9ab2f?w=500&h=300&fit=crop',
        'category' => 'Pizza',
        'ingredients' => [
            'Pizza dough',
            'Spicy tomato sauce',
            'Fresh mozzarella',
            'Hot peppers (jalapeño)',
            'Red pepper flakes',
            'Cool ranch drizzle',
            'Chicken pieces (grilled)',
            'Red onions',
            'Cilantro',
            'Lime wedges'
        ],
        'steps' => [
            'Grill chicken with spices',
            'Preheat oven to 475°F',
            'Roll out dough',
            'Spread spicy tomato sauce',
            'Add mozzarella and chicken',
            'Top with jalapeños and onions',
            'Bake for 12-15 minutes',
            'Drizzle with ranch dressing',
            'Garnish with cilantro',
            'Serve with lime wedges!'
        ]
    ]
];


// Get current recipe if ID is passed
$currentRecipe = null;
if (isset($_GET['recipe_id'])) {
    foreach ($recipes as $recipe) {
        if ($recipe['id'] == $_GET['recipe_id']) {
            $currentRecipe = $recipe;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro व्यंजन / Recipes</title>
    <link rel="stylesheet" href="/css/index1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   <nav class="navbar navbar-expand-lg px-3 sticky-top" style="font-size: 0.8em;background:#8B0000; ">
        <a class="navbar-brand" href="/index/index1.html" style="text-decoration:none;">
            <h1 class="m-0" style="color: green;">Hamro <span style="color: yellow;">व्यंजन</span></h1>
        </a>

        <div class="collapse navbar-collapse justify-content-end" >
            <ul class="navbar-nav gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <h2 class="m-0 text-white" >Home</h2>
                    </a>
                </li>

              

                <li class="nav-item">
                    <a class="nav-link" href="index3.php">
                        <h2 class="m-0 "style="color:yellow;">Recipe</h2>
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

    <div class="container my-5">
    <h2 class="text-center mb-4" style="color: #FFD700;">Recipe Collection</h2>
    
    <div class="row">
        <?php foreach ($recipes as $recipe): ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card food-card" data-bs-toggle="modal" data-bs-target="#recipeModal<?php echo $recipe['id']; ?>">
                <img src="<?php echo $recipe['image']; ?>" class="card-img-top" alt="<?php echo $recipe['name']; ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $recipe['name']; ?></h5>
                    <p class="card-text text-muted"><?php echo $recipe['category']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="price-badge">रू <?php echo $recipe['price']; ?></span>
                        <button class="btn btn-sm" style="background-color: #8B0000; color: white;">View Recipe</button>
                    </div>
                </div>
            </div>
        </div>

  
        <div class="modal fade recipe-modal" id="recipeModal<?php echo $recipe['id']; ?>" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">🍕 <?php echo $recipe['name']; ?> Recipe</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="<?php echo $recipe['image']; ?>" class="img-fluid rounded mb-3" alt="<?php echo $recipe['name']; ?>">
                                <h6 style="color: #FFD700;">Ingredients:</h6>
                                <ul class="list-unstyled">
                                    <?php foreach ($recipe['ingredients'] as $ingredient): ?>
                                    <li>✓ <?php echo $ingredient; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6 style="color: #FFD700;">Steps:</h6>
                                <ol class="recipe-steps">
                                    <?php foreach ($recipe['steps'] as $step): ?>
                                    <li><?php echo $step; ?></li>
                                    <?php endforeach; ?>
                                </ol>
                                <div class="mt-3">
                                    <span class="badge bg-info ms-2"><?php echo $recipe['category']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</body>

</html>

