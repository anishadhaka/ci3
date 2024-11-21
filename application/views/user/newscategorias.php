

</section>
<section class="featured-reviews">
<h1 style="color:#3498db; font-size:30px;font-weight:bold; margin:30px; ">ALL News Categorias</h1>
  <div class="review-grid">
    <?php foreach($user as $row): ?>
      <div class="review-card">
      <img src="<?php echo base_url('uploads/images/'.$row['image']);?>"/>
       
        <h1><?php echo $row['Title']; ?></h1>
        <p><?php echo $row['description']; ?></p>
        <!-- <a href="<?php echo base_url('UserController/read_more/' . $row['id']); ?>" class="read-more">Read More</a> -->
      </div>
    <?php endforeach; ?>
  </div>
  <!-- <a  id="loadMore"  class="load-more-btn">Load More</a> -->
   <button id="loadMore" class="load-more-btn">Load More</button>
</section>
