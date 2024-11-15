


  <section class="about">
    <h1>About Us</h1>
    <div class="about-content">
      <div class="about-text">
        <p>Welcome to <strong>Watch My Review</strong>, the leading platform for reviewing the latest products, services, and experiences. Our team of experts provide honest, insightful, and unbiased reviews to help you make informed decisions before your purchase.</p>
        <p>We believe that every review counts and aim to offer a space where users can share their experiences, ask questions, and engage with the community. Whether you are looking for in-depth product analysis or quick consumer opinions, we’ve got you covered.</p>
      </div>
      <div class="about-image">
        <img src="https://tse1.mm.bing.net/th?id=OIP.oqS6Tt-p6kqtVj2fmphd1wHaEK&pid=Api&rs=1&c=1&qlt=95&w=160&h=89" alt="About Us Image" height="200px">
      </div>
    </div>
  </section>


  <section class="featured-reviews">
    <div class="about">
      <?php foreach($user as $row): ?>
        <div class="about-content">
        <div class="about-image">
        <img src="<?php echo base_url('uploads/images/'.$row['image']);?>"/>

      </div>
      <div class="about-text">
          <div class="date"><?= $row['createdate']; ?></div>
          <h1><?php echo $row['title']; ?></h1>
          <p><?php echo $row['description']; ?></p>
          <p>Created Date: <?= $row['createdate']; ?></p>
          <p>Updated Date: <?= $row['updatedate']; ?></p>
          <a href="#" class="read-more">Read More</a>
      </div>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="#" id="loadMore">Load More</a>
  </section>

