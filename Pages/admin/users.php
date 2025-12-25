 <?php
    require_once '../../models/Admin.php';
    require_once '../../config.php';

    $admin = new Admin();

    if (isset($_POST['approve_id'])) {
        $admin->changeStatus($_POST['approve_id'], 'Active');
    }

    if (isset($_POST['deactivate_id'])) {
        $admin->changeStatus($_POST['deactivate_id'], 'Disabled');
    }

    if (isset($_POST['activate_id'])) {
        $admin->changeStatus($_POST['activate_id'], 'Active');
    }

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <title>Users Management | ASSAD Admin</title>
     <script src="https://cdn.tailwindcss.com"></script>
 </head>

 <body class="bg-gray-100 font-sans">

     <aside class="w-64 bg-gray-900 text-gray-100 min-h-screen fixed">
         <div class="p-6 text-xl font-bold tracking-wide border-b border-gray-700">
             ASSAD Admin
         </div>
         <nav class="mt-6 space-y-1">
             <a href="dashboard.php" class="block px-6 py-3 hover:bg-gray-800">Dashboard</a>
             <a href="users.php" class="block px-6 py-3 bg-gray-800">Users</a>
             <a href="animals.php" class="block px-6 py-3 hover:bg-gray-800">Animals</a>
             <a href="habitats.php" class="block px-6 py-3 hover:bg-gray-800">Habitats</a>
             <a href="stats.php" class="block px-6 py-3 hover:bg-gray-800 font-semibold">Statistics</a>
             <a href="logout.php" class="block px-6 py-3 text-red-400 hover:bg-gray-800">Logout</a>
         </nav>
     </aside>

     <main class="ml-64 p-8">

         <h1 class="text-3xl font-bold text-gray-800">Users Management</h1>
         <p class="text-gray-500 mt-1">Manage all visitors and guides</p>

         <section class="mt-8 bg-white rounded-xl shadow p-6">
             <table class="min-w-full divide-y divide-gray-200">
                 <thead>
                     <tr class="bg-gray-50">
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                         <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                     </tr>
                 </thead>




                 <tbody class="divide-y divide-gray-200" id="profileContainer">
                     <?php
                        require_once '../../models/Users.php';
                        require_once '../../config.php';

                        $User = new User();
                        $allUsers = $User->listAllUsers();

                        foreach ($allUsers as $user) {


                            if ($user->userStatus === 'Active') {
                                $statusText = 'Active';
                                $statusColor = 'text-green-500';
                            } elseif ($user->userStatus === 'Pending') {
                                $statusText = 'Pending';
                                $statusColor = 'text-yellow-500';
                            } else {
                                $statusText = 'Disabled';
                                $statusColor = 'text-red-500';
                            }

                            echo '<tr>';
                            echo '<td class="px-6 py-4">' . $user->Users_id . '</td>';
                            echo '<td class="px-6 py-4">' . htmlspecialchars($user->userName) . '</td>';
                            echo '<td class="px-6 py-4">' . htmlspecialchars($user->userEmail) . '</td>';
                            echo '<td class="px-6 py-4">' . htmlspecialchars($user->userRole) . '</td>';
                            echo '<td class="px-6 py-4 ' . $statusColor . ' font-semibold">' . $statusText . '</td>';
                            echo '<td class="px-6 py-4 space-x-2">';

                            if ($user->userStatus === 'Pending') {
                                echo '<form method="POST" style="display:inline;">
            <input type="hidden" name="approve_id" value="' . $user->Users_id . '">
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                Approve
            </button>
          </form>';
                            }

                            if ($user->userStatus === 'Active') {
                                echo '<form method="POST" style="display:inline;">
            <input type="hidden" name="deactivate_id" value="' . $user->Users_id . '">
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Deactivate
            </button>
          </form>';
                            }

                            if ($user->userStatus === 'Disabled') {
                                echo '<form method="POST" style="display:inline;">
            <input type="hidden" name="activate_id" value="' . $user->Users_id . '">
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                Activate
            </button>
          </form>';
                            }

                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                 </tbody>



             </table>
         </section>
     </main>

 </body>


 </html>