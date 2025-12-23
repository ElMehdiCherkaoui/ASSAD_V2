<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ASSAD Virtual Zoo</title>
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

    <header class="bg-primary text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-secondary" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2c2.5 0 4.5 2 4.5 4.5S14.5 11 12 11 7.5 9 7.5 6.5 9.5 2 12 2zM4 20c0-4 4-7 8-7s8 3 8 7" />
                </svg>
                <span class="text-xl font-bold">ASSAD Zoo</span>
            </div>

            <nav class="space-x-6 text-sm font-medium">
                <a href="../../index.php" class="hover:text-secondary">Home</a>
                <a href="animals.php" class="hover:text-secondary">Animals</a>
                <a href="visits.php" class="hover:text-secondary">Guided Visits</a>
                <a href="../login.php" class="hover:text-secondary">Login</a>
                <a href="../register.php"
                    class="bg-secondary text-black px-4 py-2 rounded-lg font-semibold hover:bg-amber-400">
                    Register
                </a>
            </nav>

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-16">