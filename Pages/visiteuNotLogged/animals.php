<?php include 'layout/header.php'; ?>

<h1 class="text-3xl font-bold mb-10 text-center">
    Explore African Animals
</h1>

<?php
require_once "../../config.php";
require_once "../../models/Animal.php";

$animalModel = new Animal();
$animals = $animalModel->findAll();
?>

<div class="grid md:grid-cols-3 gap-8" id="animalContainer">

    <?php if (!empty($animals)): ?>
    <?php foreach ($animals as $ani): ?>
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <img src="<?php echo $ani->Image; ?>" class="w-full h-48 object-cover">
        <div class="p-5">
            <h3 class="text-xl font-semibold"><?php echo $ani->animalName; ?></h3>
            <p class="text-gray-600 text-sm mt-2">
                Species: <?php echo $ani->espèce; ?> | Country: <?php echo $ani->paysOrigine; ?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
    <p class="col-span-3 text-center text-gray-500">No animals found</p>
    <?php endif; ?>

</div>

<script src="../../asset/js/animalNotLoggedShow.js"></script>
<?php include 'layout/footer.php'; ?>