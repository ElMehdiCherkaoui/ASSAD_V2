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
                <a href="logout.php" class="hover:text-red-400 font-semibold">Logout</a>
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

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="../assets/visits/lion-tour.jpg" alt="Atlas Lion Tour" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Atlas Lion Virtual Tour</h3>
                    <p class="text-gray-600 mb-2">Date: 2025-12-20 | Duration: 2 hours</p>
                    <p class="text-gray-600 mb-4">Price: $15 | Language: English | Remaining: 8 seats</p>
                    <a href="book.php?id=1"
                        class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-900">Book Now</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="../assets/visits/elephant-tour.jpg" alt="Elephant Tour" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">African Elephant Experience</h3>
                    <p class="text-gray-600 mb-2">Date: 2025-12-22 | Duration: 1.5 hours</p>
                    <p class="text-gray-600 mb-4">Price: $12 | Language: French | Remaining: 5 seats</p>
                    <a href="book.php?id=2"
                        class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-900">Book Now</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="../assets/visits/zebra-tour.jpg" alt="Zebra Tour" class="w-full h-48 object-cover">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold mb-2">Zebra Habitat Tour</h3>
                    <p class="text-gray-600 mb-2">Date: 2025-12-25 | Duration: 1 hour</p>
                    <p class="text-gray-600 mb-4">Price: $10 | Language: English | Remaining: 12 seats</p>
                    <a href="book.php?id=3"
                        class="bg-primary text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-900">Book Now</a>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-6 mt-16">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>
<script src="../../asset/js/guideVisitsPage.js"></script>

</html>