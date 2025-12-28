<?php
require_once "../../config.php";
require_once "../../models/VisiteGuidee.php";

$visit = new VisiteGuidee();
$visits = $visit->findAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ASSAD Zoo – Guided Visits</title>
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
            <h1 class="text-4xl font-bold text-primary mb-4">Guided Visits</h1>
            <p class="text-gray-700 mb-6">
                Explore and book virtual guided tours led by professional guides.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="grid md:grid-cols-3 gap-8" id="GuidesBookContainner">

            <?php if (!empty($visits)): ?>
            <?php foreach ($visits as $v): ?>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">
                        <?php echo $v->title; ?>
                    </h3>

                    <p class="text-gray-600 mb-2">
                        Date: <?php echo $v->date_time; ?> |
                        Duration: <?php echo $v->duree; ?> hours
                    </p>

                    <p class="text-gray-600 mb-4">
                        Price: $<?php echo $v->price; ?> |
                        Language: <?php echo $v->languages; ?> |
                        Remaining: <?php echo $v->max_capacity; ?> seats
                    </p>

                    <a href="book.php?id=<?php echo $v->guided_id; ?>"
                        class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-900">
                        Book Now
                    </a>
                </div>
            </div>

            <?php endforeach; ?>
            <?php else: ?>
            <p class="col-span-3 text-center text-gray-500">
                No visits available
            </p>
            <?php endif; ?>

        </div>
    </section>


    <footer class="bg-gray-900 text-gray-300 py-6 mt-16">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>
<script>

</script>

</html>