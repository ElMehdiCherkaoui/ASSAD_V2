<?php include 'layout/header.php'; ?>

<h1 class="text-3xl font-bold mb-10 text-center">
    Explore African Animals
</h1>

<div class="grid md:grid-cols-3 gap-8" id="animalContainer">

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <img src="https://source.unsplash.com/400x300/?lion" class="w-full h-48 object-cover">
        <div class="p-5">
            <h3 class="text-xl font-semibold">Atlas Lion</h3>
            <p class="text-gray-600 text-sm mt-2">
                Native to North Africa, symbol of strength.
            </p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <img src="https://source.unsplash.com/400x300/?elephant" class="w-full h-48 object-cover">
        <div class="p-5">
            <h3 class="text-xl font-semibold">African Elephant</h3>
            <p class="text-gray-600 text-sm mt-2">
                Largest land animal on Earth.
            </p>
        </div>
    </div>

</div>
<script src="../../asset/js/animalNotLoggedShow.js"></script>
<?php include 'layout/footer.php'; ?>