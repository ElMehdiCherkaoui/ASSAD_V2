<?php
session_start();
require_once "../../config.php";
require_once "../../models/VisiteGuidee.php";
require_once "../../models/Reservation.php";

$visitModel = new VisiteGuidee();
$reservationModel = new Reservation();

$visitId = isset($_GET['id']);

$visit = null;
if ($visitId) {
    $visit = $visitModel->findById($visitId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numberOfPeople = (int)$_POST['people'];
    $userId = $_SESSION['user_id']; 
    $id = $_GET['id'];

    $reservationModel->addReservation($id, $userId, $numberOfPeople);
    header("location: create.php");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Guided Visit | ASSAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#14532d',
                    secondary: '#f59e0b'
                }
            }
        }
    }
    </script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="bg-primary text-white py-4 px-6 flex justify-between items-center">
        <span class="text-xl font-bold">ASSAD Zoo</span>
        <nav class="space-x-4">
            <a href="homeLogged.php" class="hover:text-secondary">Home</a>
            <a href="animalsLogged.php" class="hover:text-secondary">Animals</a>
            <a href="create.php" class="hover:text-secondary">Guided Visits</a>
            <a href="my-reservations.php" class="hover:text-secondary">My Reservations</a>
            <a href="../../logout.php" class="hover:text-red-400 font-semibold">Logout</a>
        </nav>
    </header>

    <main class="max-w-4xl mx-auto p-6 mt-10">

        <h1 class="text-3xl font-bold text-primary mb-6">
            Book Guided Visit
        </h1>

        <?php if ($visit): ?>

        <div class="bg-white p-6 rounded-xl shadow" id="bookFormContainer">

            <h2 class="text-xl font-semibold mb-4">
                <?php echo $visit->title; ?>
            </h2>

            <p class="mb-2"><strong>Date:</strong> <?php echo $visit->date_time; ?></p>
            <p class="mb-2"><strong>Duration:</strong> <?php echo $visit->duree; ?> hours</p>
            <p class="mb-2"><strong>Language:</strong> <?php echo $visit->languages; ?></p>
            <p class="mb-2"><strong>Remaining Capacity:</strong> <?php echo $visit->max_capacity; ?></p>

            <form method="POST" class="mt-4">


                <input type="hidden" name="visitid" value="<?php echo $visit->guided_id; ?>">

                <label class="block mb-2 font-medium">Number of People:</label>
                <input type="number" name="people" min="1" max="<?php echo $visit->max_capacity; ?>"
                    class="border px-3 py-2 rounded-lg w-full mb-4" required>

                <button type="submit"
                    class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-900">
                    Confirm Booking
                </button>
            </form>

        </div>

        <?php else: ?>
        <p class="text-center text-gray-500">Visit not found</p>
        <?php endif; ?>

    </main>


</body>
<script src="../../asset/js/guideVisitsPage.js"></script>

</html>