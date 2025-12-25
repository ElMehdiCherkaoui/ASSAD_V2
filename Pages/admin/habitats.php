<?php
require_once '../../models/Habitat.php';
require_once '../../config.php';

if (isset($_POST['add_habitat'])) {

    $habitat = new Habitat();
    $habitat->setName($_POST['habitatsName']);
    $habitat->setTypeClimat($_POST['typeClimat']);
    $habitat->setZoneZoo($_POST['zoo_zone']);
    $habitat->setDescription($_POST['descriptionHab']);

    $habitat->createHabitat();

    header("Location: habitats.php");
    exit;
}
if (isset($_POST['update_habitat'])) {

    $habitat = new Habitat();
    $habitat->setName($_POST['habitatsName']);
    $habitat->setTypeClimat($_POST['typeClimat']);
    $habitat->setZoneZoo($_POST['zoo_zone']);
    $habitat->setDescription($_POST['descriptionHab']);

    $habitat->updateHabitat($_POST['Hab_id']);

    header("Location: habitats.php");
}
if (isset($_POST['delete_id'])) {
    $habitatToDelete = new Habitat();

    if ($habitatToDelete->deleteHabitat($_POST['delete_id'])) {
        header("Location: habitats.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Habitats Management | ASSAD Admin</title>
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
            <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
            <a href="habitats.php" class="block px-6 py-3 bg-gray-800 font-semibold">Habitats</a>
            <a href="stats.php" class="block px-6 py-3 hover:bg-gray-800">Statistics</a>
            <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
        </nav>
    </aside>

    <main class="ml-64 p-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Habitats Management</h1>
            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" id="openHabitatsPopup">
                + Add New Habitat
            </button>
        </div>

        <section class="bg-white rounded-xl shadow p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Climate Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Zone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="habitatContainer">
                    <?php
                    require_once '../../models/Habitat.php';
                    require_once '../../config.php';

                    $habitatModel = new Habitat();
                    $habitats = $habitatModel->findAll();

                    foreach ($habitats as $habitat) {
                        echo '<tr>';

                        echo '<td class="px-6 py-4">' . $habitat->Hab_id . '</td>';
                        echo '<td class="px-6 py-4">' . htmlspecialchars($habitat->habitatsName) . '</td>';
                        echo '<td class="px-6 py-4">' . htmlspecialchars($habitat->typeClimat) . '</td>';
                        echo '<td class="px-6 py-4">' . htmlspecialchars($habitat->zoo_zone) . '</td>';
                        echo '<td class="px-6 py-4 w-[30em]">' . htmlspecialchars($habitat->descriptionHab) . '</td>';

                        echo '<td class="px-6 py-4 space-x-2">';

                        echo '
                        <button
                            class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 editHabitatBtn"
                            data-id="' . $habitat->Hab_id . '"
                            data-name="' . htmlspecialchars($habitat->habitatsName) . '"
                            data-climat="' . htmlspecialchars($habitat->typeClimat) . '"
                            data-zone="' . htmlspecialchars($habitat->zoo_zone) . '"
                            data-desc="' . htmlspecialchars($habitat->descriptionHab) . '">
                            Edit
                        </button>
                        ';



                        echo '
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete_id" value="' . $habitat->Hab_id . '">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="return confirm(\'Are you sure you want to delete this habitat?\')">
                                Delete
                            </button>
                        </form>
                        ';


                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>

            </table>
        </section>

    </main>


    <div id="addHabitatsPopup"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 overflow-auto">
        <div class="bg-white rounded-xl p-6 w-full max-w-lg relative">
            <button id="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">&times;</button>

            <h2 class="text-2xl font-bold mb-4">Add New Habitat</h2>

            <form method="POST" action="" class="space-y-4">

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="habitatsName" required class="mt-1 block w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Type Climat</label>
                    <input type="text" name="typeClimat" required class="mt-1 block w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Zoo Zone</label>
                    <input type="text" name="zoo_zone" required class="mt-1 block w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <input type="text" name="descriptionHab" required
                        class="mt-1 block w-full border rounded px-3 py-2">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelBtn" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" name="add_habitat"
                        class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600">
                        Add
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div id="editHabitatsModal"
        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-full max-w-lg relative">
            <button id="closeEditModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Edit Habitat</h2>
            <form method="POST" class="space-y-4">
                <input type="hidden" name="Hab_id" id="edithabId">
                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="habitatsName" id="editHabitatName" required
                        class="mt-1 block w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Type Climat</label>
                    <input type="text" name="typeClimat" id="edittypeClimat" required
                        class="mt-1 block w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Zoo Zone</label>
                    <input type="text" name="zoo_zone" id="editzoo_zone" required
                        class="mt-1 block w-full border rounded px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <input type="text" name="descriptionHab" id="editDescription" required
                        class="mt-1 block w-full border rounded px-3 py-2">
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelEditBtn"
                        class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                    <button type="submit" name="update_habitat"
                        class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
const addHabitatsPopup = document.getElementById("addHabitatsPopup");
const openHabitatsPopup = document.getElementById("openHabitatsPopup");
const closeModal = document.getElementById("closeModal");
const cancelBtn = document.getElementById("cancelBtn");
cancelBtn.addEventListener("click", () => {
    addHabitatsPopup.classList.add("hidden");
})
closeModal.addEventListener("click", () => {
    addHabitatsPopup.classList.add("hidden");
})
openHabitatsPopup.addEventListener("click", () => {
    addHabitatsPopup.classList.remove("hidden");
})

const editModal = document.getElementById('editHabitatsModal');
const closeEditBtn = document.getElementById('closeEditModal');
const cancelEditBtn = document.getElementById('cancelEditBtn');

const editButtons = document.querySelectorAll('.editHabitatBtn');

editButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('edithabId').value = btn.dataset.id;
        document.getElementById('editHabitatName').value = btn.dataset.name;
        document.getElementById('edittypeClimat').value = btn.dataset.climat;
        document.getElementById('editzoo_zone').value = btn.dataset.zone;
        document.getElementById('editDescription').value = btn.dataset.desc;

        editModal.classList.remove('hidden');
    });
});

closeEditBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
});

cancelEditBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
});
</script>

</html>