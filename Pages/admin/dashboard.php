 <?php
    require_once "../../config.php";
    require_once "../../models/Users.php";
    require_once "../../models/Animal.php";
    require_once "../../models/Habitat.php";
    require_once "../../models/VisiteGuidee.php";
    require_once "../../models/Reservation.php";

    $userModel = new User();
    $animalModel = new Animal();
    $habitatModel = new Habitat();
    $visitModel = new VisiteGuidee();
    $reservationModel = new Reservation();


    $totalUsers = $userModel->countUsers();
    $pendingGuides = $userModel->countPendingGuides();
    $totalAnimals = $animalModel->countAnimals();
    $totalHabitats = $habitatModel->countHabitats();
    $totalTours = $visitModel->countTours();
    $totalReservations = $reservationModel->countReservations();
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>Admin Dashboard | ASSAD</title>
     <script src="https://cdn.tailwindcss.com"></script>
 </head>

 <body class="bg-gray-100 font-sans">

     <aside class="w-64 bg-gray-900 text-gray-100 min-h-screen fixed">
         <div class="p-6 text-xl font-bold tracking-wide border-b border-gray-700">
             ASSAD Admin
         </div>

         <nav class="mt-6 space-y-1">

             <a href="dashboard.php" class="block px-6 py-3 bg-gray-800">Dashboard</a>
             <a href="users.php" class="block px-6 py-3 hover:bg-gray-800">Users</a>
             <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
             <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
             <a href="stats.php" class="block px-6 py-3 hover:bg-gray-80 font-semibold">Statistics</a>
             <a href="../../logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>

         </nav>
     </aside>


     <main class="ml-64 p-8">

         <h1 class="text-3xl font-bold text-gray-800">
             Dashboard
         </h1>
         <p class="text-gray-500 mt-1">
             Welcome back, Administrator
         </p>


         <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

             <div class="bg-white p-6 rounded-xl shadow">
                 <p class="text-sm text-gray-500">Total Users</p>
                 <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo $totalUsers; ?></p>
             </div>

             <div class="bg-white p-6 rounded-xl shadow">
                 <p class="text-sm text-gray-500">Pending Guides</p>
                 <p class="text-3xl font-bold text-yellow-500 mt-2"><?php echo $pendingGuides; ?></p>
             </div>

             <div class="bg-white p-6 rounded-xl shadow">
                 <p class="text-sm text-gray-500">Animals</p>
                 <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo $totalAnimals; ?></p>
             </div>

             <div class="bg-white p-6 rounded-xl shadow">
                 <p class="text-sm text-gray-500">Guided Tours</p>
                 <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo $totalTours; ?></p>
             </div>

         </section>


         <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">



             <div class="bg-white rounded-xl shadow p-6">
                 <h2 class="text-xl font-semibold text-gray-800 mb-4">Statistics Overview</h2>

                 <ul class="space-y-4 text-gray-700">
                     <li class="flex justify-between items-center">
                         <span>Total Users</span>
                         <span class="font-bold text-gray-800"><?php echo $totalUsers; ?></span>
                     </li>
                     <li class="flex justify-between items-center">
                         <span>Pending Guide Approvals</span>
                         <span class="font-bold text-yellow-500"><?php echo $pendingGuides; ?></span>
                     </li>
                     <li class="flex justify-between items-center">
                         <span>Total Animals</span>
                         <span class="font-bold text-gray-800"><?php echo $totalAnimals; ?></span>
                     </li>
                     <li class="flex justify-between items-center">
                         <span>Total Habitats</span>
                         <span class="font-bold text-gray-800"><?php echo $totalHabitats; ?></span>
                     </li>
                     <li class="flex justify-between items-center">
                         <span>Guided Tours</span>
                         <span class="font-bold text-gray-800"><?php echo $totalTours; ?></span>
                     </li>
                     <li class="flex justify-between items-center">
                         <span>Total Reservations</span>
                         <span class="font-bold text-green-500"><?php echo $totalReservations; ?></span>
                     </li>
                 </ul>
             </div>




         </section>



     </main>

 </body>

 </html>