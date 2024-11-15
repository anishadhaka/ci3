<section class="hero">
  <h2>INBOUND MARKITING BLOG</h2>
  <ul>
        <li><a href="<?php echo base_url('blogsite'); ?>">Social Networks</a></li>
        <li><a href="<?php echo base_url('categorias'); ?>">Web</a></li>
        <li><a href="<?php echo base_url('about'); ?>">SEO</a></li>
        <li><a href="<?php echo base_url('contactus'); ?>">Contact Maeketing</a></li>
        <li><a href="<?php echo base_url('contactus'); ?>">Inbound Maeketing</a></li>

      </ul>
</section>

<section>
  <div class="top3">
     <h5>Recives the monthly newsletter </h5>
       <button><a href="">register</a></button>
</div>
</section>


<section class="featured-reviews">
  <div class="review-grid">
    <?php foreach($user as $row): ?>
      <div class="review-card">
        <img src="uploads/images/<?php echo $row['image']; ?>" alt="Review Image">
        <div class="date"><?= $row['createdate']; ?></div>
        <h1><?php echo $row['title']; ?></h1>
        <!-- <p><?php echo $row['description']; ?></p> -->
        <!-- <p>Created Date: <?= $row['createdate']; ?></p>
        <p>Updated Date: <?= $row['updatedate']; ?></p> -->
        <a href="<?php echo base_url('UserController/read_more/' . $row['id']); ?>" class="read-more">Read More</a>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- <a  id="loadMore"  class="load-more-btn">Load More</a> -->
   <button id="loadMore" class="load-more-btn">Load More</button>
</section>

