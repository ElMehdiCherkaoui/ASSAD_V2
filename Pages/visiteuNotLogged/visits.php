<?php include 'layout/header.php'; ?>

<h1 class="text-3xl font-bold mb-10 text-center">
    Guided Virtual Visits
</h1>

<div class="space-y-6 max-w-4xl mx-auto" id="GuidesContainer">

    <?php
require_once "../../config.php";
require_once "../../models/VisiteGuidee.php";

$visitModel = new VisiteGuidee();
$visits = $visitModel->findAll(); 
?>

    <div class="space-y-4">
        <?php if (!empty($visits)): ?>
        <?php foreach ($visits as $v): ?>
        <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
            <div>
                <h3 class="text-xl font-semibold"><?php echo $v->title; ?></h3>
                <p class="text-gray-600 text-sm">
                    Duration: <?php echo $v->duree; ?>h •
                    Language: <?php echo $v->languages; ?> •
                    Price: <?php echo $v->price; ?> MAD
                </p>
            </div>

            <a href="visit-show.php?id=<?php echo $v->guided_id; ?>"
                class="bg-primary text-white px-5 py-2 rounded-lg hover:bg-green-900">
                View
            </a>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p class="text-center text-gray-500">No visits available</p>
        <?php endif; ?>
    </div>


</div>
<script src="../../asset/js/allGuideVisitsNotLogged.js"></script>
<?php include 'layout/footer.php'; ?>