<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <aside class="w-64 bg-gray-900 text-gray-100 min-h-screen fixed">
        <div class="p-6 text-xl font-bold tracking-wide border-b border-gray-700">
            ASSAD Admin
        </div>

        <nav class="mt-6 space-y-1">

            <a href="dashboard.php" class="block px-6 py-3 bg-gray-800">Dashboard</a>
            <a href="users.php" class="block px-6 py-3 hover:bg-gray-800">Users</a>
            <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
            <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
            <a href="stats.php" class="block px-6 py-3 hover:bg-gray-80 font-semibold">Statistics</a>
            <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>

        </nav>
    </aside>


    <main class="ml-64 p-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>
        <p class="text-gray-500 mt-1">
            Welcome back, Administrator
        </p>

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Total Users</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">124</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Pending Guides</p>
                <p class="text-3xl font-bold text-yellow-500 mt-2">5</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Animals</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">32</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">Guided Tours</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">18</p>
            </div>

        </section>

        <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistics Overview</h2>

                <ul class="space-y-4 text-gray-700">
                    <li class="flex justify-between items-center">
                        <span>Total Users</span>
                        <span class="font-bold text-gray-800">124</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span>Pending Guide Approvals</span>
                        <span class="font-bold text-yellow-500">5</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span>Total Animals</span>
                        <span class="font-bold text-gray-800">32</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span>Total Habitats</span>
                        <span class="font-bold text-gray-800">10</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span>Guided Tours</span>
                        <span class="font-bold text-gray-800">18</span>
                    </li>
                    <li class="flex justify-between items-center">
                        <span>Total Reservations</span>
                        <span class="font-bold text-green-500">42</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h2>

                <ul class="space-y-4 text-gray-700 text-sm">
                    <li class="flex justify-between">
                        <span>New visitor <strong>Ahmed B.</strong> registered</span>
                        <span class="text-gray-400">10 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Guide <strong>Fatima Z.</strong> awaiting approval</span>
                        <span class="text-gray-400">30 min ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Reservation made for <strong>Atlas Lion Tour</strong></span>
                        <span class="text-gray-400">1 hour ago</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Animal <strong>Barbary Monkey</strong> added to zoo</span>
                        <span class="text-gray-400">Yesterday</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Guide <strong>Omar S.</strong> approved</span>
                        <span class="text-gray-400">Yesterday</span>
                    </li>
                </ul>
            </div>

        </section>



    </main>

</body>

</html>