<section class="featured-reviews">
    <h1 style="color:#3498db; font-size:30px; font-weight:bold; margin:30px;">Category:<?php echo $user['Title']; ?></h1>
    <div class="review-grid">
        <?php foreach($user as $row): ?>
            <div class="review-card">

            <img src="<?= base_url('uploads/images/' . $row['image']); ?>" class="card-img-top"?>
                <div class="date"><?= $row['createdate']; ?></div>
                <h1><?php echo $row['name']; ?></h1>
                <a href="<?php echo base_url('UserController/read_more/' . $row['id']); ?>" class="read-more">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
    <button id="loadMore" class="load-more-btn">Load More</button>
</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Blog "Load More" functionality
    $(".review-card").slice(3).hide(); // Hide all cards after 3
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".review-card:hidden").slice(0, 3).slideDown();
        if ($(".review-card:hidden").length == 0) {
            $("#loadMore").hide(); // Hide the "Load More" button when no more items
        }
    });

});
</script>