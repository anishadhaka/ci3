



<section class="featured-reviews">
<h1 style="color:#123044; font-size:30px;font-weight:bold; margin:30px; "> ALL Blog Categorias</h1>
  <div class="review-grid">
    <?php foreach($user as $row): ?>
      <div class="review-card">
      <img src="<?php echo base_url('uploads/images/'.$row['image']);?>"/>
        <div class="date"><?= $row['createdate']; ?></div>
        <h1><?php echo $row['name']; ?></h1>
        <!-- <p><?php echo $row['description']; ?></p> -->
        <a class="read-more" href="<?php echo base_url('blogs/'). $row['Title']. '/'. $row['slug'];?>">
       Read More</a>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- <a  id="loadMore"  class="load-more-btn">Load More</a> -->
   <button id="loadMore" class="load-more-btn">Load More</button>
</section>



