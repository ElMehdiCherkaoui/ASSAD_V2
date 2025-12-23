<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Statistics | ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 font-sans">

    <aside class="w-60 bg-gray-900 text-gray-100 min-h-screen fixed">
        <div class="p-6 text-xl font-bold border-b border-gray-700">ASSAD Admin</div>
        <nav class="mt-6 space-y-1">
            <a href="dashboard.php" class="block px-6 py-3 hover:bg-gray-800">Dashboard</a>
            <a href="users.php" class="block px-6 py-3 hover:bg-gray-800">Users</a>
            <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
            <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
            <a href="stats.php" class="block px-6 py-3 bg-gray-800 font-semibold">Statistics</a>
            <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
        </nav>
    </aside>

    <main class="ml-60 p-8">
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Total Users</p>
                <p id="totalVisitors" class="text-3xl font-bold text-gray-800 mt-2">0</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Animals</p>
                <p id="totalAnimals" class="text-3xl font-bold text-gray-800 mt-2">0</p>
            </div>
        </section>

        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-2">Visitors by Country</h2>
            <table class="min-w-full bg-white shadow rounded">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Country</th>
                        <th class="px-4 py-2">Visitors</th>
                    </tr>
                </thead>
                <tbody id="visitorsByCountry">
                </tbody>
            </table>
        </div>


    </main>

    <script src="../../asset/js/statistique.js">
    </script>

</body>

</html>