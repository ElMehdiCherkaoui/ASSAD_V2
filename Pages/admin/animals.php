<?php
require_once '../../models/Animal.php';
require_once '../../config.php';

$animalModel = new Animal();

// ====== ADD ANIMAL ======
if (isset($_POST['animalName'])) {
    $animal = new Animal(
        null,
        $_POST['animalName'],
        $_POST['espece'],
        $_POST['alimentation'],
        $_POST['Image'],
        $_POST['paysOrigine'],
        $_POST['Description'],
        $_POST['habitat_id']
    );

    if ($animal->createAnimal()) {
        header("Location: animals.php");
        exit;
    } else {
        echo "<p class='text-red-500'>Error adding animal. Please try again.</p>";
    }
}

// ====== EDIT ANIMAL ======
if (isset($_POST['editAniId'])) {
    $animal = new Animal(
        $_POST['editAniId'],
        $_POST['editAnimalName'],
        $_POST['editEspece'],
        $_POST['editAlimentation'],
        $_POST['editImage'],
        $_POST['editPaysOrigine'],
        $_POST['editDescription'],
        $_POST['editHabitat']
    );

    if ($animal->updateAnimal()) {
        header("Location: animals.php");
        exit;
    } else {
        echo "<p class='text-red-500'>Error updating animal</p>";
    }
}

// ====== DELETE ANIMAL ======
if (isset($_POST['delete_id'])) {
    $animalToDelete = new Animal();

    if ($animalToDelete->deleteAnimal($_POST['delete_id'])) {
        header("Location: animals.php");
        exit;
    } else {
        echo "<p class='text-red-500'>Failed to delete animal.</p>";
    }
}


?>


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
            <a href="../../logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
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
                    <?php
                    require_once '../../models/Animal.php';
                    require_once '../../config.php';

                    $animalModel = new Animal();
                    $allAnimals = $animalModel->findAll();

                    foreach ($allAnimals as $index => $animal) {
                        echo '<tr>';

                        echo '<td class="px-6 py-4">' . ($index + 1) . '</td>';

                        echo '<td class="px-6 py-4">' . $animal->animalName . '</td>';

                        echo '<td class="px-6 py-4">' . $animal->espece . '</td>';

                        echo '<td class="px-6 py-4">' . $animal->habitatsName . '</td>';

                        echo '<td class="px-6 py-4">' . $animal->descriptionCourte . '</td>';

                        echo '<td class="px-6 py-4">';
                        echo '<img src="' . $animal->Image . '" class="w-12 h-12 rounded">';
                        echo '</td>';

                        echo '<td class="px-6 py-4 space-x-2">';

                        echo '<button 
                        type="button"
                        class="editAnimalBtn bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                        data-id="' . $animal->Ani_id . '"
                        data-name="' . $animal->animalName . '"
                        data-espece="' . $animal->espece . '"
                        data-alimentation="' . $animal->alimentation . '"
                        data-image="' . $animal->Image . '"
                        data-pays="' . $animal->paysOrigine . '"
                        data-description="' . $animal->descriptionCourte . '"
                        data-habitat="' . $animal->Habitat_ID . '"
                        >Edit</button>';

                        echo '<form method="POST" style="display:inline;">
                        <input type="hidden" name="delete_id" value="' . $animal->Ani_id . '">
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Delete
                        onclick="return confirm(\'Are you sure you want to delete this habitat?\')">
                        </button>
                        </form>';

                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>


            </table>
        </section>



        <div id="addAnimalPopup"
            class="hidden fixed flex inset-0 bg-black bg-opacity-50 items-center justify-center z-50 overflow-auto h-50">
            <div class="bg-white rounded-xl p-6 w-full max-w-lg relative">
                <button id="closeModal"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">&times;</button>
                <h2 class="text-2xl font-bold mb-4">Add New Animal</h2>

                <form id="addAnimalForm" method="POST" class="space-y-4">
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
                        <label class="block text-sm font-medium text-gray-700">Alimentation</label>
                        <input type="text" name="alimentation" id="alimentation" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Habitat</label>
                        <select name="habitat_id" id="habitatSelect" required
                            class="mt-1 block w-full border rounded px-3 py-2">
                            <option value="">Select Habitat</option>
                            <?php
                            require_once '../../models/Habitat.php';
                            require_once '../../config.php';
                            $habitatModel = new Habitat();
                            $allHabitats = $habitatModel->findAll();

                            foreach ($allHabitats as $habitat) {
                                echo '<option value="' . $habitat->Hab_id . '">' . htmlspecialchars($habitat->habitatsName) . '</option>';
                            }
                            ?>
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
                        <button type="button" id="cancelBtn"
                            class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 rounded bg-green-500 text-white hover:bg-green-600">Add</button>
                    </div>
                </form>
            </div>
        </div>





        <div id="editAnimalModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg relative h-[40em] overflow-auto">

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Edit Animal</h2>
                    <button type="button" id="closeEditModal"
                        class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
                </div>


                <form id="editAnimalForm" method="POST" class="space-y-4">

                    <input type="hidden" name="editAniId" id="editAniId">

                    <div>
                        <label class="block text-sm font-medium">Animal Name</label>
                        <input type="text" name="editAnimalName" id="editAnimalName" required
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Species</label>
                        <input type="text" name="editEspece" id="editEspece" required
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Alimentation</label>
                        <input type="text" name="editAlimentation" id="editAlimentation" required
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Habitat</label>
                        <select name="editHabitat" id="editHabitatSelect" class="w-full border px-3 py-2 rounded">
                            <?php
                            require_once '../../models/Habitat.php';
                            $habitatModel = new Habitat();
                            $allHabitats = $habitatModel->findAll();

                            foreach ($allHabitats as $habitat) {
                                echo '<option value="' . $habitat->Hab_id . '">' . htmlspecialchars($habitat->habitatsName) . '</option>';
                            }
                            ?>
                        </select>


                    </div>

                    <div>
                        <label class="block text-sm font-medium">Country of Origin</label>
                        <input type="text" name="editPaysOrigine" id="editPaysOrigine"
                            class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Image</label>
                        <input type="text" name="editImage" id="editImage" class="w-full border px-3 py-2 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Description</label>
                        <textarea name="editDescription" id="editDescription"
                            class="w-full border px-3 py-2 rounded"></textarea>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" id="cancelEditBtn" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Save Changes
                        </button>
                    </div>

                </form>
            </div>
        </div>


</body>

<script>
const addModal = document.getElementById('addAnimalPopup');
const openAddBtn = document.getElementById('addAnimalBtn');
const closeAddBtn = document.getElementById('closeModal');
const cancelAddBtn = document.getElementById('cancelBtn');
const addForm = document.getElementById('addAnimalForm');

openAddBtn.addEventListener('click', function() {
    addModal.classList.remove('hidden');
});

closeAddBtn.addEventListener('click', function() {
    addModal.classList.add('hidden');

});

cancelAddBtn.addEventListener('click', function() {
    addModal.classList.add('hidden');

});

const editModal = document.getElementById('editAnimalModal');
const closeEditBtn = document.getElementById('closeEditModal');
const cancelEditBtn = document.getElementById('cancelEditBtn');
const editForm = document.getElementById('editAnimalForm');
const editButtons = document.querySelectorAll('.editAnimalBtn');

editButtons.forEach((button) => {
    button.addEventListener('click', () => {
        document.getElementById('editAniId').value = button.dataset.id;
        document.getElementById('editAnimalName').value = button.dataset.name;
        document.getElementById('editEspece').value = button.dataset.espece;
        document.getElementById('editAlimentation').value = button.dataset.alimentation;
        document.getElementById('editImage').value = button.dataset.image;
        document.getElementById('editPaysOrigine').value = button.dataset.pays;
        document.getElementById('editDescription').value = button.dataset.description;
        document.getElementById('editHabitatSelect').value = button.dataset.habitat;

        editModal.classList.remove('hidden');
    });
});

closeEditBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
    editForm.reset();
});

cancelEditBtn.addEventListener('click', () => {
    editModal.classList.add('hidden');
    editForm.reset();
});
</script>


</html>