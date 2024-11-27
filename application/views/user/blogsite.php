<section class="featured-reviews">
    
    <h1 style="color:#395568; font-size:30px; font-weight:bold; margin:20px; text-decoration:underline;"><i>Blogs</i></h1>
    <h1 style="margin-bottom:20px;">Blog templates that set you up for success</h1>
    <div class="review-grid">
        <?php foreach($user as $row): ?>
            <div class="review-card">
                <img src="uploads/images/<?php echo $row['image']; ?>" alt="Review Image">
                <div class="date"><?= $row['createdate']; ?></div>
                <h1><?php echo $row['name']; ?></h1>
                <a href="<?php echo base_url('blogs/'). $row['Title']. '/'. $row['slug'];?>" class="read-more">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <button id="loadMore" class="load-more-btn">Load More</button> -->
</section>

<section class="featured-reviews">
    <h1 style="color:#395568; font-size:30px; font-weight:bold; margin:20px;text-decoration:underline;"><i>News</i></h1>
    <h1 style="margin-bottom:20px;">THE TIMES OF INDIA</h1>
    <div class="review-grid">
        <?php foreach($news as $row): ?>
            <div class="review-card2">
                <img src="uploads/images/<?php echo $row['image']; ?>" alt="News Image">
                <h1><?php echo $row['Title']; ?></h1>
                <!-- <p><?php echo $row['description']; ?></p> -->
                <a href="<?php echo base_url('newsc/'). $row['Title']. '/'. $row['slug'];?>" class="read-more">Read More</a>

                <!-- <a href="<?php echo base_url('UserController/read_more1/' . $row['id']); ?>" class="read-more">Read More</a> -->
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <button id="loadMore2" class="load-more-btn">Load More</button> -->
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

    $(".review-card2").slice(3).hide(); 
    $("#loadMore2").on("click", function(e) {
        e.preventDefault();
        $(".review-card2:hidden").slice(0, 3).slideDown();
        if ($(".review-card2:hidden").length == 0) {
            $("#loadMore2").hide(); 
        }
    });
});
</script>