<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Users Management | ASSAD Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <aside class="w-64 bg-gray-900 text-gray-100 min-h-screen fixed">
        <div class="p-6 text-xl font-bold tracking-wide border-b border-gray-700">
            ASSAD Admin
        </div>
        <nav class="mt-6 space-y-1">
            <a href="dashboard.php" class="block px-6 py-3 hover:bg-gray-800">Dashboard</a>
            <a href="users.php" class="block px-6 py-3 bg-gray-800">Users</a>
            <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
            <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
            <a href="stats.php" class="block px-6 py-3 hover:bg-gray-800 font-semibold">Statistics</a>
            <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <h1 class="text-3xl font-bold text-gray-800">Users Management</h1>
        <p class="text-gray-500 mt-1">Manage all visitors and guides</p>

        <section class="mt-8 bg-white rounded-xl shadow p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="profileContainer">
                    <tr>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Ahmed B.</td>
                        <td class="px-6 py-4">ahmed@example.com</td>
                        <td class="px-6 py-4">Visitor</td>
                        <td class="px-6 py-4 text-green-500 font-semibold">Active</td>
                        <td class="px-6 py-4 space-x-2">
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deactivate</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Fatima Z.</td>
                        <td class="px-6 py-4">fatima@example.com</td>
                        <td class="px-6 py-4">Guide</td>
                        <td class="px-6 py-4 text-yellow-500 font-semibold">Pending</td>
                        <td class="px-6 py-4 space-x-2">
                            <button
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deactivate</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">3</td>
                        <td class="px-6 py-4">Omar S.</td>
                        <td class="px-6 py-4">omar@example.com</td>
                        <td class="px-6 py-4">Guide</td>
                        <td class="px-6 py-4 text-green-500 font-semibold">Active</td>
                        <td class="px-6 py-4 space-x-2">
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deactivate</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

</body>
<script src="../../asset/js/userAdminPage.js"></script>

</html>