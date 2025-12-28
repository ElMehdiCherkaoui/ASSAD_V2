<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Guided Visit Details | ASSAD Zoo</title>
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

<body class="bg-gray-50 font-sans text-gray-800">

    <header class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <span class="text-xl font-bold">ASSAD Zoo</span>
            <nav class="space-x-6 text-sm font-medium">
                <a href="../../index.php" class="hover:text-secondary">Home</a>
                <a href="animals.php" class="hover:text-secondary">Animals</a>
                <a href="visits.php" class="hover:text-secondary">Guided Visits</a>
                <a href="logout.php" class="hover:text-secondary">Logout</a>
            </nav>
        </div>
    </header>

    <?php
    require_once "../../config.php";
    require_once "../../models/VisiteGuidee.php";

    $visitModel = new VisiteGuidee();
    $visitId = isset($_GET['id']);
    $visit = $visitModel->findById($visitId);
    ?>

    <main class="max-w-5xl mx-auto px-6 py-12">
        <?php if ($visit): ?>
            <div class="bg-white rounded-xl shadow p-8 space-y-6">
                <h1 class="text-3xl font-bold text-primary"><?php echo $visit->title; ?></h1>
                <p class="text-gray-700">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere unde nulla sit in
                    tempore, animi aliquam harum nihil, id ad alias. Quibusdam, ipsum explicabo temporibus non placeat
                    aliquam? Aliquam, amet?</p>

                <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                    <div>
                        <p><strong>Date:</strong> <?php echo $visit->date_time; ?></p>
                        <p><strong>Duration:</strong> <?php echo $visit->duree; ?> hours</p>
                        <p><strong>Language:</strong> <?php echo $visit->languages; ?></p>
                    </div>
                    <div>
                        <p><strong>Capacity:</strong> <?php echo $visit->max_capacity; ?> remaining</p>
                        <p><strong>Price:</strong> <?php echo $visit->price; ?> MAD per person</p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="../register.php"
                        class="bg-secondary text-black px-6 py-3 rounded-lg font-semibold hover:bg-amber-400">
                        Book Now
                    </a>
                </div>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500">Visit not found</p>
        <?php endif; ?>
    </main>


    <footer class="bg-gray-900 text-gray-300 py-6 mt-12">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>

</html>