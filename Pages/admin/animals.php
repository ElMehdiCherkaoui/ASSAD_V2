<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Animals Management | ASSAD Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <aside class="w-64 bg-gray-900 text-gray-100 min-h-screen fixed">
        <div class="p-6 text-xl font-bold tracking-wide border-b border-gray-700">
            ASSAD Admin
        </div>
        <nav class="mt-6 space-y-1">
            <a href="dashboard.php" class="block px-6 py-3 hover:bg-gray-800">Dashboard</a>
            <a href="users.php" class="block px-6 py-3 hover:bg-gray-800">Users</a>
            <a href="animals.php" class="block px-6 py-3 bg-gray-800 font-semibold">Animals</a>
            <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
            <a href="stats.php" class="block px-6 py-3 hover:bg-gray-800">Statistics</a>
            <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Animals Management</h1>
            <button id="addAnimalBtn" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                + Add New Animal
            </button>
        </div>

        <section class="bg-white rounded-xl shadow p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Species</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Habitat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">paysOrigine</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="animalContainer">
                    <tr>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">Asaad</td>
                        <td class="px-6 py-4">Lion</td>
                        <td class="px-6 py-4">African Savanna</td>
                        <td class="px-6 py-4">test</td>
                        <td class="px-6 py-4">
                            <img src="https://via.placeholder.com/50" alt="Asaad" class="w-12 h-12 rounded">
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Kifaru</td>
                        <td class="px-6 py-4">Rhinoceros</td>
                        <td class="px-6 py-4">Grasslands</td>
                        <td class="px-6 py-4">test</td>
                        <td class="px-6 py-4">
                            <img src="https://via.placeholder.com/50" alt="Kifaru" class="w-12 h-12 rounded">
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <div id="addAnimalPopup"
            class="hidden fixed flex inset-0 bg-black bg-opacity-50 items-center justify-center z-50 overflow-auto h-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-lg relative">
                <button id="closeModal"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">&times;</button>

                <h2 class="text-2xl font-bold mb-4">Add New Animal</h2>

                <form id="addAnimalForm" class="space-y-4">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="animalName" id="animalName" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Species</label>
                        <input type="text" name="espece" id="espece" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">alimentation</label>
                        <input type="text" name="alimentation" id="alimentation" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Habitat</label>
                        <select name="habitat_id" id="habitatSelect" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                            <option value="">Select Habitat</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Country of Origin</label>
                        <input type="text" name="paysOrigine" id="paysOrigine" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image URL</label>
                        <input type="text" name="Image" id="Image" class="mt-1 block w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="Description" id="Description"
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" id="cancelBtn" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                            Cancel
                        </button>
                        <button type="submit" id="addAnimalForm"
                            class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="editAnimalModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 ">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg relative h-[40em] overflow-auto">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Edit Animal</h2>
                    <button id="closeEditModal" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                </div>

                <form id="editAnimalForm" class="space-y-4">

                    <input type="hidden" id="editAniId">

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Animal Name</label>
                        <input type="text" id="editAnimalName"
                            class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Species</label>
                        <input type="text" id="editEspece" class="w-full mt-1 px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Alimentation</label>
                        <input type="text" id="editAlimentation" class="w-full mt-1 px-4 py-2 border rounded-lg"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Habitat</label>
                        <select id="editHabitatSelect" class="w-full mt-1 px-4 py-2 border rounded-lg">
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Country of Origin</label>
                        <input type="text" id="editPaysOrigine" class="w-full mt-1 px-4 py-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Image (URL or name)</label>
                        <input type="text" id="editImage" class="w-full mt-1 px-4 py-2 border rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600">Description</label>
                        <textarea id="editDescription" rows="3"
                            class="w-full mt-1 px-4 py-2 border rounded-lg"></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" id="cancelEditBtn"
                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>

                </form>
            </div>
        </div>

</body>

<script src="../../asset/js/AnimalAdminPage.js"></script>

</html>