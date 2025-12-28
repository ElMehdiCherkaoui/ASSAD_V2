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
            <a href="../../logout.php" class="block px-6 py-3 hover:bg-red-600 text-red-300 rounded-lg">Logout</a>
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
                    <?php
                    require_once "../../models/Reservation.php";
                    require_once "../../config.php";
                    session_start();

                    $reservation = new Reservation();
                    $reservations = $reservation->listReservationGuidePage($_SESSION['user_id']);

                    if (!empty($reservations)):
                        foreach ($reservations as $r):

                    ?>
                            <tr class="border-b">
                                <td class="px-4 py-2"><?= ($r['userName']) ?></td>
                                <td class="px-4 py-2"><?= ($r['title']) ?></td>
                                <td class="px-4 py-2"><?= ($r['date_time']) ?></td>
                                <td class="px-4 py-2"><?= ($r['number_of_people']) ?></td>
                                <td class="px-6 py-4"><span class="text-green-600 font-semibold">Confirmed</span></td>
                            </tr>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                No reservations found
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>

            </table>
        </section>

    </main>

</body>
<script src="../../asset/js/bookingGuide.js"></script>

</html>