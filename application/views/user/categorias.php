

  <!-- Categories Section -->
  <section class="categories">
    <h1>Blog Categorías</h1>

  </section>

  <!-- Featured Reviews Section -->
  <section class="featured-reviews">
    <div class="review-grid">
      <?php foreach($user as $row): ?>
        <div class="review-card">
        <img src="<?php echo base_url('uploads/images/'.$row['image']);?>"/>
        
          <div class="date"><?= $row['createdate']; ?></div>
          <h1><?php echo $row['Title']; ?></h1>
          <p><?php echo $row['description']; ?></p>
          <p>Created Date: <?= $row['createdate']; ?></p>
          <p>Updated Date: <?= $row['updatedate']; ?></p>
          <a href="#" class="read-more">Read More</a>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="#" id="loadMore">Load More</a>
  </section>

