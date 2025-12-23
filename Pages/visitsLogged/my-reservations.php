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
                <a href="logout.php" class="hover:text-red-400 font-semibold">Logout</a>
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

                        <th class="px-6 py-3 text-left text-sm font-semibold">Number of People</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Action</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Comment / Rate</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200" id="ReservationContainer">
                    <tr>
                        <td class="px-6 py-4">Atlas Lion Virtual Tour</td>
                        <td class="px-6 py-4">2025-12-20 | 10:00 AM</td>
                        <td class="px-6 py-4">English</td>
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4 text-green-600 font-semibold">Confirmed</td>
                        <td class="px-6 py-4">
                            <a href="cancel.php?id=1" class="text-red-500 font-semibold hover:underline">Cancel</a>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openCommentForm()"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Comment / Rate
                            </button>
                        </td>

                    </tr>

                    <tr>
                        <td class="px-6 py-4">African Elephant Experience</td>
                        <td class="px-6 py-4">2025-12-22 | 2:00 PM</td>
                        <td class="px-6 py-4">French</td>
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4 text-yellow-500 font-semibold">Pending</td>
                        <td class="px-6 py-4">
                            <a href="cancel.php?id=2" class="text-red-500 font-semibold hover:underline">Cancel</a>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openCommentForm(1, 'Atlas Lion Virtual Tour')"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Comment / Rate
                            </button>
                        </td>

                    </tr>

                    <tr>
                        <td class="px-6 py-4">Zebra Habitat Tour</td>
                        <td class="px-6 py-4">2025-12-25 | 11:00 AM</td>
                        <td class="px-6 py-4">English</td>
                        <td class="px-6 py-4">3</td>
                        <td class="px-6 py-4 text-green-600 font-semibold">Confirmed</td>
                        <td class="px-6 py-4">
                            <a href="cancel.php?id=3" class="text-red-500 font-semibold hover:underline">Cancel</a>
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openCommentForm(1, 'Atlas Lion Virtual Tour')"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Comment / Rate
                            </button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <div id="commentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-6 w-96">
            <h2 class="text-xl font-bold mb-4" id="modalTourName">Leave a Comment</h2>
            <input type="hidden" id="modalReservationId">

            <textarea id="commentText" class="w-full border rounded p-2 mb-3" placeholder="Your comment"></textarea>

            <select id="rating" class="w-full border rounded p-2 mb-3">
                <option value="">Select rating</option>
                <option value="1">1 ⭐</option>
                <option value="2">2 ⭐⭐</option>
                <option value="3">3 ⭐⭐⭐</option>
                <option value="4">4 ⭐⭐⭐⭐</option>
                <option value="5">5 ⭐⭐⭐⭐⭐</option>
            </select>

            <div class="flex justify-end gap-2">
                <button onclick="closeCommentForm()" class="px-3 py-1 rounded border">Cancel</button>
                <button onclick="submitComment()" class="px-3 py-1 rounded bg-green-500 text-white">Submit</button>
            </div>
        </div>
    </div>




    <footer class="bg-gray-900 text-gray-300 py-6 mt-16">
        <div class="text-center text-sm">
            © 2025 ASSAD Virtual Zoo — Africa Cup of Nations Morocco
        </div>
    </footer>

</body>
<script src="../../asset/js/MyReservationVisiteurLogged.js"></script>

</html>