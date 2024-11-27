<section class="featured-reviews">
    <h1 style="color:#16354a; font-size:30px; font-weight:bold; margin:30px;">Category:<?php echo $row['title']; ?></h1>
    <div class="review-grid">
        <?php foreach($user as $row): ?>
            <div class="review-card">
            <img src="<?= base_url('uploads/images/' . $row['image']); ?>" class="card-img-top" ?>
                <!-- <div class="date"><?= $row['createdate']; ?>jb,jmn</div> -->
                <a style="text-decoration:none;" href="<?php echo base_url('newsc/'). $row['Title']. '/'. $row['slug'];?>">
                <h1><?php echo $row['name']; ?></h1>
                 </a>
          </div>
        <?php endforeach; ?>
    </div>
    <button id="loadMore" class="load-more-btn">Load More</button>
</section>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".review-card").slice(3).hide(); 
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".review-card:hidden").slice(0, 3).slideDown();
        if ($(".review-card:hidden").length == 0) {
            $("#loadMore").hide(); 
        }
    });

});
</script>