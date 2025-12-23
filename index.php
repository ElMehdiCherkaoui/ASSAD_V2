<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ASSAD Virtual Zoo – CAN 2025</title>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-secondary" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2c2.5 0 4.5 2 4.5 4.5S14.5 11 12 11 7.5 9 7.5 6.5 9.5 2 12 2zM4 20c0-4 4-7 8-7s8 3 8 7" />
                </svg>
                <span class="text-xl font-bold">ASSAD Zoo</span>
            </div>

            <nav class="space-x-6 text-sm font-medium">
                <a href="index.php" class="hover:text-secondary">Home</a>
                <a href="Pages/visiteuNotLogged/animals.php" class="hover:text-secondary">Animals</a>
                <a href="Pages/visiteuNotLogged/visits.php" class="hover:text-secondary">Guided Visits</a>
                <a href="Pages/login.php" class="hover:text-secondary">Login</a>
                <a href="Pages/register.php"
                    class="bg-secondary text-black px-4 py-2 rounded-lg font-semibold hover:bg-amber-400">
                    Register
                </a>
            </nav>
        </div>
    </header>

    <section class="bg-green-100 py-24">
        <div class="max-w-5xl mx-auto text-center px-6">

            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6">
                Virtual Zoo ASSAD – CAN 2025 Morocco
            </h1>

            <p class="text-lg text-gray-700 mb-10">
                Explore African wildlife and the legendary Atlas Lion through an
                interactive virtual zoo created for families and football supporters.
            </p>

            <div class="flex justify-center gap-4">
                <a href="animals/list.php"
                    class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-900 flex items-center gap-2">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13c0 1.5 1.5 3 3 3s3-1.5 3-3-1.5-3-3-3-3 1.5-3 3zM13 13c0 1.5 1.5 3 3 3s3-1.5 3-3-1.5-3-3-3-3 1.5-3 3zM9 18c0 2 6 2 6 0" />
                    </svg>

                    Explore Animals
                </a>

                <a href="visits/list.php"
                    class="border-2 border-primary text-primary px-6 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white flex items-center gap-2">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A2 2 0 013 15.382V5.618a2 2 0 011.553-1.894L9 1m0 19l6-3m-6 3V1m6 16l5.447 2.724A2 2 0 0021 18.382V8.618a2 2 0 00-1.553-1.894L15 5m0 12V5m0 12l-6 3" />
                    </svg>

                    View Guided Visits
                </a>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-20">

        <h2 class="text-3xl font-bold text-center mb-12">
            Discover the ASSAD Experience
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-secondary mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2c2.5 0 4.5 2 4.5 4.5S14.5 11 12 11 7.5 9 7.5 6.5 9.5 2 12 2zM4 20c0-4 4-7 8-7s8 3 8 7" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Atlas Lion – Asaad</h3>
                <p class="text-gray-600">
                    A dedicated page presenting the Atlas Lion with images and information.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-secondary mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h18M4 7h16M6 11h12M9 15h6" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">African Animals</h3>
                <p class="text-gray-600">
                    Browse animals by habitat and country with filters.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow p-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-secondary mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2z" />
                </svg>
                <h3 class="text-xl font-semibold mb-2">Guided Visits</h3>
                <p class="text-gray-600">
                    Book and explore virtual visits guided by professionals.
                </p>
            </div>

        </div>
    </main>

    <section class="bg-primary text-white py-16">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-3xl font-bold mb-4">
                Start Your Virtual Zoo Journey
            </h2>
            <p class="text-gray-200 mb-8">
                Create an account to reserve guided visits and share your experience.
            </p>
            <a href="Pages/register.php"
                class="bg-secondary text-black px-8 py-3 rounded-lg font-semibold hover:bg-amber-400">
                Create an Account
            </a>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>

</html>