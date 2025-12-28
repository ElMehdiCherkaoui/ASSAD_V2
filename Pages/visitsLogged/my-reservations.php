<?php
session_start();
require_once "../../models/Reservation.php";
require_once "../../config.php";
require_once "../../models/commentaire.php";

$reservationModel = new Reservation();
$commentaire = new Commentaire();

$reservations = $reservationModel->listReservationVisitPage($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationId = (INT)$_POST['reservation_id'];
    $comment = $_POST['comment'];
    $rating = (INT)$_POST['rating'];
    $userId = (INT)$_SESSION['user_id'];

    $tourId = $reservation->tour_id_reservation_fk;

    $commentaire->addComment($reservationId, $userId, $comment, $rating);

    header("Location: my-reservations.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Reservations – ASSAD Zoo</title>
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

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="text-xl font-bold">ASSAD Zoo</span>
            </div>

            <nav class="space-x-6 text-sm font-medium">
                <a href="homeLogged.php" class="hover:text-secondary">Home</a>
                <a href="animalsLogged.php" class="hover:text-secondary">Animals</a>
                <a href="create.php" class="hover:text-secondary">Guided Visits</a>
                <a href="my-reservations.php" class="hover:text-secondary font-semibold">My Reservations</a>
                <a href="../../logout.php" class="hover:text-red-400 font-semibold">Logout</a>
            </nav>
        </div>
    </header>

    <section class="bg-green-100 py-16">
        <div class="max-w-5xl mx-auto text-center px-6">
            <h1 class="text-4xl font-bold text-primary mb-4">My Reservations</h1>
            <p class="text-gray-700 mb-6">
                Here is a list of all your booked guided visits.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-10">
        <div class="overflow-x-auto bg-white rounded-xl shadow p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">visit title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">date</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">language</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Number of People</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Action</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Comment / Rate</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="ReservationContainer">

                    <?php if (!empty($reservations)): ?>
                    <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td class="px-6 py-4"><?php echo $r['title']; ?></td>
                        <td class="px-6 py-4"><?php echo $r['date_time']; ?></td>
                        <td class="px-6 py-4"><?php echo $r['languages']; ?></td>
                        <td class="px-6 py-4"><?php echo $r['number_of_people']; ?></td>

                        <td class="px-6 py-4 text-green-600 font-semibold">Confirmed</td>

                        <td class="px-6 py-4">
                            <a href="cancel.php?id=<?php echo $r['reservation_id']; ?>"
                                class="text-red-500 font-semibold hover:underline">Cancel</a>
                        </td>

                        <td class="px-6 py-4">
                            <button
                                onclick="openComment(<?php echo $r['guided_id']; ?>, '<?php echo addslashes($r['title']); ?>')"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Comment / Rate
                            </button>


                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-gray-500 py-4">
                            You have no reservations
                        </td>
                    </tr>
                    <?php endif; ?>

                </tbody>

            </table>
        </div>
    </section>

    <div id="commentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-96">
            <h2 class="text-xl font-bold mb-4" id="modalTourName">Leave a Comment</h2>

            <form method="POST">
                <input type="hidden" name="reservation_id" id="modalReservationId">

                <textarea name="comment" id="commentText" class="w-full border rounded p-2 mb-3"
                    placeholder="Your comment" required></textarea>

                <select name="rating" id="rating" class="w-full border rounded p-2 mb-3" required>
                    <option value="">Select rating</option>
                    <option value="1">1 ⭐</option>
                    <option value="2">2 ⭐⭐</option>
                    <option value="3">3 ⭐⭐⭐</option>
                    <option value="4">4 ⭐⭐⭐⭐</option>
                    <option value="5">5 ⭐⭐⭐⭐⭐</option>
                </select>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeCommentForm()" class="px-3 py-1 rounded border">Cancel</button>
                    <button type="submit" class="px-3 py-1 rounded bg-green-500 text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>






    <footer class="bg-gray-900 text-gray-300 py-6 mt-16">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>
<script>
function openComment(id, tourName) {
    const modal = document.getElementById("commentModal");
    modal.classList.remove("hidden");
    document.getElementById("modalReservationId").value = id;
    document.getElementById("modalTourName").innerText =
        "Leave a Comment for: " + tourName;

}

function closeCommentForm() {
    document.getElementById("commentModal").classList.add("hidden");
    document.getElementById("commentText").value = "";
    document.getElementById("rating").value = "";
}
</script>

</html>