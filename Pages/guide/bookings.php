<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Bookings | ASSAD Guide</title>
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

<body class="bg-gray-50 font-sans">

    <aside class="w-64 bg-primary text-white min-h-screen fixed">
        <div class="p-6 text-xl font-bold border-b border-green-700">
            ASSAD Guide
        </div>
        <nav class="mt-6 space-y-1">
            <a href="dashboard.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">Dashboard</a>
            <a href="list.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">My Visits</a>
            <a href="create.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">Create Visit</a>
            <a href="bookings.php" class="block px-6 py-3 bg-green-800 font-semibold rounded-lg">Bookings</a>
            <a href="logout.php" class="block px-6 py-3 hover:bg-red-600 text-red-300 rounded-lg">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <h1 class="text-3xl font-bold text-gray-800">My Bookings</h1>
        <p class="text-gray-500 mt-1 mb-6">Here are the reservations for your guided visits</p>

        <section class="bg-white rounded-xl shadow p-6">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-4 py-2 text-left">Visitor Name</th>
                        <th class="px-4 py-2 text-left">Visit Title</th>
                        <th class="px-4 py-2 text-left">Date & Time</th>
                        <th class="px-4 py-2 text-left">Number of People</th>
                        <th class="px-4 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800" id="UserContainer">
                    <tr class="border-b">
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">African Safari Tour</td>
                        <td class="px-4 py-2">2025-12-20 10:00</td>
                        <td class="px-4 py-2">3</td>
                        <td class="px-4 py-2"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded">Confirmed</span></td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">Sarah Smith</td>
                        <td class="px-4 py-2">Atlas Lion Experience</td>
                        <td class="px-4 py-2">2025-12-21 14:00</td>
                        <td class="px-4 py-2">2</td>
                        <td class="px-4 py-2"><span
                                class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

</body>
<script src="../../asset/js/bookingGuide.js"></script>

</html>