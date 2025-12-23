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

    <main class="max-w-5xl mx-auto px-6 py-12">
        <div class="bg-white rounded-xl shadow p-8 space-y-6">
            <h1 class="text-3xl font-bold text-primary">Atlas Lion Virtual Tour</h1>
            <p class="text-gray-700">
                Explore the majestic Atlas Lion in its habitat. This interactive virtual guided visit includes detailed
                explanations, photos, and fun educational activities.
            </p>

            <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p><strong>Date:</strong> 20 Dec 2025</p>
                    <p><strong>Time:</strong> 10:00 AM</p>
                    <p><strong>Duration:</strong> 1 hour</p>
                    <p><strong>Language:</strong> English</p>
                </div>
                <div>
                    <p><strong>Capacity:</strong> 15 remaining</p>
                    <p><strong>Price:</strong> $10 per person</p>
                    <p><strong>Guide:</strong> John Doe</p>
                </div>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-semibold text-primary mb-3">Reserve Your Spot</h2>
                <form action="book.php" method="POST" class="space-y-4">
                    <div>
                        <label for="num_people" class="block text-gray-700 font-medium">Number of People</label>
                        <input type="number" id="num_people" name="num_people" min="1" max="15"
                            class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-secondary focus:border-transparent">
                    </div>
                    <input type="hidden" name="visit_id" value="1">
                    <a href="../register.php"
                        class="bg-secondary text-black px-6 py-3 rounded-lg font-semibold hover:bg-amber-400">
                        Book Now
                    </a>
                </form>
            </div>


        </div>
    </main>

    <footer class="bg-gray-900 text-gray-300 py-6 mt-12">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>

</html>