<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login | ASSAD Zoo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    jungle: '#0f3d2e',
                    gold: '#fbbf24',
                    sand: '#f8fafc'
                }
            }
        }
    }
    </script>
</head>

<body class="min-h-screen flex font-sans bg-sand">

    <section class="hidden lg:flex w-1/2 bg-jungle text-white p-12 flex-col justify-between">

        <div>
            <h1 class="text-4xl font-extrabold tracking-wide">
                ASSAD Virtual Zoo
            </h1>
            <p class="mt-4 text-lg text-gray-200 max-w-md">
                Welcome back. Continue exploring African wildlife
                and guided tours for CAN 2025.
            </p>
        </div>

        <div class="border-l-4 border-gold pl-6">
            <p class="text-xl font-semibold">
                🦁 Atlas Lion Experience
            </p>
            <p class="text-sm text-gray-300">
                Secure access for Visitors, Guides & Admin
            </p>
        </div>

    </section>

    <section class="w-full lg:w-1/2 flex items-center justify-center px-6">

        <div class="w-full max-w-md bg-white shadow-2xl rounded-2xl p-8">

            <h2 class="text-3xl font-bold text-jungle text-center">
                Sign in
            </h2>
            <p class="text-center text-gray-500 mt-2">
                Access your ASSAD account
            </p>

            <form class="mt-8 space-y-5" method="POST" action="loginProcess.php">
                <?php if (!empty($error)) : ?>
                <div class="bg-red-100 text-red-700 border border-red-400 p-3 rounded mb-4">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-jungle focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-jungle focus:outline-none">
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" class="rounded">
                        Remember me
                    </label>
                    <a href="#" class="text-jungle font-semibold hover:underline">
                        Forgot password?
                    </a>
                </div>

                <button type="submit"
                    class="w-full bg-jungle text-white py-3 rounded-xl font-semibold hover:bg-opacity-90 transition">
                    Login
                </button>
            </form>



            <p class="text-center text-sm text-gray-500 mt-6">
                Don’t have an account?
                <a href="register.php" class="text-jungle font-semibold hover:underline">
                    Create one
                </a>
            </p>

        </div>

    </section>

</body>

</html>