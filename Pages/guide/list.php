<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Visits | ASSAD Guide</title>
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
            <a href="list.php" class="block px-6 py-3 bg-green-800 font-semibold rounded-lg">My Visits</a>
            <a href="create.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">Create Visit</a>
            <a href="bookings.php" class="block px-6 py-3 hover:bg-green-800 rounded-lg">Bookings</a>
            <a href="logout.php" class="block px-6 py-3 hover:bg-red-600 text-red-300 rounded-lg">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <h1 class="text-3xl font-bold text-gray-800">My Guided Visits</h1>
        <p class="text-gray-500 mt-1">Manage all the visits you have created</p>

        <section class="mt-8">
            <div class="overflow-x-auto bg-white rounded-xl shadow p-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date & Time</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Language</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Max Capacity</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Price</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" id="guidesContainers">
                        <tr>
                            <td class="px-6 py-4">African Safari Tour</td>
                            <td class="px-6 py-4">2025-01-10 10:00</td>
                            <td class="px-6 py-4">English</td>
                            <td class="px-6 py-4">15</td>
                            <td class="px-6 py-4">price</td>
                            <td class="px-6 py-4"><span class="text-green-600 font-semibold">Active</span></td>
                            <td class="px-6 py-4 space-x-2">
                                <button
                                    class="px-3 py-1 bg-secondary text-black rounded hover:bg-amber-400">Edit</button>
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Cancel</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Lion Exploration</td>
                            <td class="px-6 py-4">2025-01-12 14:00</td>
                            <td class="px-6 py-4">French</td>
                            <td class="px-6 py-4">12</td>
                            <td class="px-6 py-4"><span class="text-yellow-600 font-semibold">Pending</span></td>
                            <td class="px-6 py-4 space-x-2">
                                <button
                                    class="px-3 py-1 bg-secondary text-black rounded hover:bg-amber-400">Edit</button>
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Cancel</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4">Bird Paradise</td>
                            <td class="px-6 py-4">2025-01-15 09:30</td>
                            <td class="px-6 py-4">English</td>
                            <td class="px-6 py-4">20</td>
                            <td class="px-6 py-4"><span class="text-green-600 font-semibold">Active</span></td>
                            <td class="px-6 py-4 space-x-2">
                                <button
                                    class="px-3 py-1 bg-secondary text-black rounded hover:bg-amber-400">Edit</button>
                                <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Cancel</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <div id="formPopup" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow p-6 max-w-3xl w-full relative">
                <input type="hidden" id="ediguiId" name="ediguiId">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Edit Visit Guide</h2>
                    <button id="closeEditModal" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                </div>

                <form class="space-y-6" id="formGuide">
                    <div>
                        <label for="titles" class="block text-gray-700 font-semibold mb-2">Visit Title</label>
                        <input type="text" id="titles" name="titles"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                            placeholder="African Safari Tour" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <div>
                            <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
                            <input type="date" id="date" name="date"
                                class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-secondary"
                                required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="duration" class="block text-gray-700 font-semibold mb-2">Duration
                                (minutes)</label>
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
                            class="bg-secondary text-black px-6 py-2 rounded font-semibold hover:bg-amber-400">Edit
                            Visit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <div id="stepsModal" class="hidden fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <input type="hidden" id="edietapId" name="edietapId">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Guide Visit Steps</h2>
                <button onclick="closeStepsModal()" class="text-gray-500 hover:text-black text-2xl">&times;</button>
            </div>

            <button onclick="openAddStepModal()"
                class="mb-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                ➕ Add new étape
            </button>

            <div id="stepsList" class="space-y-3 overflow-auto max-h-[30em]">
                <div class="flex gap-3 p-4 bg-gray-100 rounded-lg">
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full font-bold">
                        1
                    </div>

                    <div>
                        <h3 class="font-semibold text-lg">Arrival</h3>
                        <p class="text-gray-600 text-sm">
                            Welcome and introduction to the visit
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div id="addStepModal" class="hidden fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">

            <h2 class="text-lg font-semibold mb-4">Create New Étape</h2>

            <form id="addStepForm" class="space-y-4">

                <div>
                    <label class="block text-sm font-medium">Step Order</label>
                    <input type="number" min="1" id="stepOrder"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="1"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium">Step Title</label>
                    <input type="text" maxlength="100" id="stepTitle"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Arrival"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea id="stepDescription"
                        class="w-full mt-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="3"
                        placeholder="Explain what happens in this step"></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeAddStepModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>
                    <button id="SaveButton" type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Step
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
<script src="../../asset/js/ListGuidesPage.js"></script>

</html>