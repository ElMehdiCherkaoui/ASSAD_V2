<?php
require_once "../../config.php";
require_once "../../models/Animal.php";
require_once "../../models/Habitat.php";

$animal = new Animal();
$habitatModel = new Habitat();

$habitatId = isset($_POST['habitat']) ? $_POST['habitat'] : "";
$country   = isset($_POST['country']) ? $_POST['country'] : "";

$animals = $animal->findAll();

if ($habitatId != "") {
    $animals = $animal->findByHabitat($habitatId);
}

if ($country != "") {
    $animals = $animal->findByCountry($country);
}

$habitats = $habitatModel->findAll();

$countries = [];
$allAnimals = $animal->findAll();

foreach ($allAnimals as $a) {
    if (!in_array($a->paysOrigine, $countries)) {
        $countries[] = $a->paysOrigine;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ASSAD Zoo – Animals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#14532d',
                    secondary: '#f59e0b',
                }
            }
        }
    }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold">ASSAD Zoo</span>
            </div>

            <nav class="space-x-6 text-sm font-medium">
                <a href="homeLogged.php" class="hover:text-secondary">Home</a>
                <a href="animalsLogged.php" class="hover:text-secondary">Animals</a>
                <a href="create.php" class="hover:text-secondary">Guided Visits</a>
                <a href="my-reservations.php" class="hover:text-secondary">My Reservations</a>
                <a href="../../logout.php" class="hover:text-red-400 font-semibold">Logout</a>
            </nav>
        </div>
    </header>

    <section class="bg-green-100 py-16">

        <div class="max-w-5xl mx-auto text-center px-6">
            <h1 class="text-4xl font-bold text-primary mb-4">Explore African Animals</h1>
            <p class="text-gray-700 mb-6">
                Browse all animals by habitat, country, and species.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10">

        <form method="POST" class="flex flex-col md:flex-row gap-4 mb-8">

            <select name="habitat" class="p-3 rounded-lg border border-gray-300">
                <option value="">All Habitats</option>
                <?php foreach ($habitats as $h): ?>
                <option value="<?php echo $h->Hab_id; ?>">
                    <?php echo $h->habitatsName; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <select name="country" class="p-3 rounded-lg border border-gray-300">
                <option value="">All Countries</option>
                <?php foreach ($countries as $c): ?>
                <option value="<?php echo $c; ?>">
                    <?php echo $c; ?>
                </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-900">
                Filter
            </button>

        </form>

        <div class="grid md:grid-cols-3 gap-8">

            <?php foreach ($animals as $ani): ?>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="<?php echo $ani->Image; ?>" class="w-full h-48 object-cover">

                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">
                        <?php echo $ani->animalName; ?>
                    </h3>

                    <p class="text-gray-600 mb-4">
                        Species: <?php echo $ani->espèce; ?> |
                        Country: <?php echo $ani->paysOrigine; ?>
                    </p>
                </div>
            </div>

            <?php endforeach; ?>

        </div>


    </section>


    <footer class="bg-gray-900 text-gray-300 py-6 mt-16">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>
<script src="../../asset/js/AnimalVisitPage.js"></script>

</html>