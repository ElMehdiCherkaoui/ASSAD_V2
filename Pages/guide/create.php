<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Guided Visit | ASSAD Guide</title>
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
            <a href="create.php" class="block px-6 py-3 bg-green-800 font-semibold rounded-lg">Create Visit</a>
            <a href="bookings.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">Bookings</a>
            <a href="logout.php" class="block px-6 py-3 hover:bg-red-600 text-red-300 rounded-lg">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <h1 class="text-3xl font-bold text-gray-800">Create a New Guided Visit</h1>
        <p class="text-gray-500 mt-1 mb-6">Fill out the details below to schedule a new visit</p>

        <section class="bg-white rounded-xl shadow p-6 max-w-3xl">
            <form class="space-y-6" id="formGuide">

                <div>
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Visit Title</label>
                    <input type="text" id="title" name="title"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                        placeholder="African Safari Tour" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1  gap-6">
                    <div>
                        <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                        <input type="date" id="date" name="date"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                            required>
                    </div>
                    <!-- <div>
                        <label for="date" class="block text-gray-700 font-semibold mb-2">Time</label>
                        <input type="time" id="Time" name="Time"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                            required>
                    </div> -->

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="duration" class="block text-gray-700 font-semibold mb-2">Duration (minutes)</label>
                        <input type="number" id="duration" name="duration" min="10" max="180"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                            required>
                    </div>
                    <div>
                        <label for="language" class="block text-gray-700 font-semibold mb-2">Language</label>
                        <select id="language" name="language"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                            required>
                            <option value="">Select a language</option>
                            <option value="English">English</option>
                            <option value="French">French</option>
                            <option value="Arabic">Arabic</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="Status" class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select id="Status" name="Status"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                        required>
                        <option value="">Select a Status</option>
                        <option value="Active">Active</option>
                        <option value="Pending">Pending</option>
                        <option value="Desactive">Desactive</option>
                    </select>
                </div>
                <div>
                    <label for="capacity" class="block text-gray-700 font-semibold mb-2">Maximum Capacity</label>
                    <input type="number" id="capacity" name="capacity" min="1" max="50"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                        required>
                </div>

                <div>
                    <label for="price" class="block text-gray-700 font-semibold mb-2">Price (MAD)</label>
                    <input type="number" id="price" name="price" min="0"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" id="submitButtonGuide"
                        class="bg-secondary text-black px-6 py-2 rounded font-semibold hover:bg-amber-400">Create
                        Visit</button>
                </div>

            </form>
        </section>



    </main>

</body>
<script src="../../asset/js/GuideCreatePage.js"></script>

</html>