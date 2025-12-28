<?php

session_start();
require_once "../../config.php";
require_once "../../models/VisiteGuidee.php";
require_once "../../models/etapVisits.php";

if (!empty($_POST['title']) && !empty($_POST['date'])) {

    header("Location: list.php");
    exit;
}
if (!empty($_POST['cancel_id'])) {
    $visit = new VisiteGuidee();
    $visit->cancel($_POST['cancel_id'], 'Desactive');
    header("Location: list.php");
    exit;
}
if (!empty($_POST['titles'])) {

    $idVisite  = $_POST['ediguiId'];
    $title     = $_POST['titles'];
    $date      = $_POST['date'];
    $duration  = $_POST['duration'];
    $language  = $_POST['language'];
    $capacity  = $_POST['capacity'];
    $price     = $_POST['price'];


    $visit = new VisiteGuidee();
    $visit->idVisite  = $idVisite;
    $visit->title     = $title;
    $visit->dateTime  = $date;
    $visit->duration  = $duration;
    $visit->language  = $language;
    $visit->capacity  = $capacity;
    $visit->price     = $price;


    if ($visit->update()) {
        header("Location: list.php");
        exit;
    }
}
if (
    isset($_POST['add_step']) &&
    !empty($_POST['visit_id']) &&
    !empty($_POST['step_order']) &&
    !empty($_POST['step_title'])
) {


    $etape = new EtapVisits();
    $etape->__set('id_visite', $_POST['visit_id']);
    $etape->__set('ordreEtape', $_POST['step_order']);
    $etape->__set('titreEtape', $_POST['step_title']);
    $etape->__set('descriptionEtape', $_POST['step_description']);

    $etape->ajouterEtape();

    $_POST['currentVisitId'] = $_POST['visit_id'];
}
?>

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
            <a href="../../logout.php" class="block px-6 py-3 hover:bg-red-600 text-red-300 rounded-lg">Logout</a>
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
                        <?php

                        require_once "../../models/VisiteGuidee.php";
                        require_once "../../config.php";

                        $visit = new VisiteGuidee();
                        $visits = $visit->listGuideVisit($_SESSION['user_id']);


                        if (!empty($visits)) :
                            foreach ($visits as $v) :

                                $statusClass = $v['statut'] === 'Open' ? 'text-green-600' : 'text-red-600'; ?>

                                <tr>
                                    <td class="px-6 py-4"><?= $v['title'] ?></td>
                                    <td class="px-6 py-4"><?= $v['date_time'] ?></td>
                                    <td class="px-6 py-4"><?= $v['languages'] ?></td>
                                    <td class="px-6 py-4"><?= $v['max_capacity'] ?></td>
                                    <td class="px-6 py-4"><?= $v['price'] ?> MAD</td>
                                    <td class="px-6 py-4"><span
                                            class="<?= $statusClass ?> font-semibold"><?= $v['statut'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 space-x-2">
                                        <button onclick="openForm(<?= $v['guided_id'] ?>)"
                                            class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 EtapsGuide">Etapes</button>
                                        <button
                                            class="px-3 py-1 bg-secondary text-black rounded hover:bg-amber-400 editVisitGuide"
                                            data-id="<?= $v['guided_id'] ?>" data-title="<?= $v['title'] ?>"
                                            data-date="<?= $v['date_time'] ?>" data-duration="<?= $v['duree'] ?>"
                                            data-language="<?= $v['languages'] ?>" data-capacity="<?= $v['max_capacity'] ?>"
                                            data-price="<?= $v['price'] ?>">
                                            Edit
                                        </button>



                                        <?php if ($v['statut'] == 'Open'): ?>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="cancel_id" value="<?= $v['guided_id'] ?>">
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to cancel this visit?')"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Cancel
                                                </button>
                                            </form>
                                        <?php endif ?>
                                    </td>

                                </tr>
                            <?php
                            endforeach;
                            ?>
                        <?php endif; ?>

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
    <div id="stepsModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6">
            <input type="hidden" id="edietapId" name="edietapId">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Guide Visit Steps</h2>
                <button id="closeModal" class="text-gray-500 hover:text-black text-2xl">&times;</button>
            </div>

            <button onclick="openAddStepModal()"
                class="mb-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                ➕ Add new étape
            </button>

            <form method="POST" id="stepsForm">
                <input type="hidden" id="currentVisitId" name="currentVisitId">
            </form>

            <?php if (!empty($_POST['currentVisitId'])): ?>
                <div id="stepsList" class="space-y-3 overflow-auto max-h-[30em]">
                    <?php
                    require_once "../../models/etapVisits.php";

                    $steps = (new EtapVisits())->listEtaps($_POST['currentVisitId']);

                    if (!empty($steps)):
                        foreach ($steps as $step): ?>
                            <div class="flex gap-3 p-4 bg-gray-100 rounded-lg">
                                <div
                                    class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full font-bold">
                                    <?= ($step['step_order']) ?>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg"><?= ($step['step_title']) ?></h3>
                                    <p class="text-gray-600 text-sm"><?= ($step['step_description']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <p class="text-gray-500">No steps found for this visit.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>



        </div>
    </div>

    </div>
    <div id="addStepModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Add Step</h2>
                <button onclick="closeAddStepModal()" class="text-gray-500 text-xl">&times;</button>
            </div>

            <form method="POST" class="space-y-4">

                <input type="hidden" name="visit_id" value="<?= $_POST['currentVisitId'] ?? '' ?>">

                <div>
                    <label class="block text-sm font-medium">Step Order</label>
                    <input type="number" name="step_order" min="1" required class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium">Step Title</label>
                    <input type="text" name="step_title" required class="w-full mt-1 p-2 border rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="step_description" class="w-full mt-1 p-2 border rounded-lg"></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeAddStepModal()" class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button type="submit" name="add_step"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Save Step
                    </button>
                </div>
            </form>

        </div>
    </div>



</body>
<script>
    const editButtons = document.querySelectorAll('.editVisitGuide');

    editButtons.forEach((button) => {
        button.addEventListener('click', () => {

            document.getElementById('ediguiId').value = button.dataset.id;
            document.getElementById('titles').value = button.dataset.title;
            document.getElementById('date').value = button.dataset.date;
            document.getElementById('duration').value = button.dataset.duration;
            document.getElementById('language').value = button.dataset.language;
            document.getElementById('capacity').value = button.dataset.capacity;
            document.getElementById('price').value = button.dataset.price;

            document.getElementById('formPopup').classList.remove('hidden');
        });
    });


    document.getElementById('closeEditModal').addEventListener('click', () => {
        document.getElementById('formPopup').classList.add('hidden');
    });

    function openForm(id) {
        document.getElementById('currentVisitId').value = id;
        document.getElementById('stepsForm').submit();
    }

    document.getElementById('closeModal').addEventListener("click", () => {
        document.getElementById('stepsModal').classList.add('hidden');
    });

    function openAddStepModal() {
        document.getElementById('addStepModal').classList.remove('hidden');
    }

    function closeAddStepModal() {
        document.getElementById('addStepModal').classList.add('hidden');
    }
</script>

<?php if (!empty($_POST['currentVisitId'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById('stepsModal').classList.remove('hidden');


        });
    </script>
<?php endif; ?>






</html>