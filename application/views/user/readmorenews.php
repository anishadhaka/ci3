<link rel="stylesheet" href="<?php echo base_url('public/css/readmore.css'); ?>">
<div class="combine">
<section class="post-detail">
          
    <h1><img src="<?php echo base_url('uploads/images/'.$post['image']);?>"/></h1>
     <h1> Category: <?php echo $post['Title']; ?></h1>
     <h1 style="font-size:26px;">  <?php echo $post['name']; ?></h1>

  
    <div class="content">
        <p><?php echo $post['description']; ?></p>
        <p><?php echo $post['full_content']; ?></p> 
    </div>
</section>

<div class="side" style="padding-left: 80px;padding-right:30px; padding-top:20px; margin-top: 0px; margin-right: 20px; margin-left:10px;  ">
        
        <ul class="list">
          
          <?php foreach ($sideblog as $row):?>
            <li class="li-container"><img src="<?= base_url('uploads/images/' . $row['image']); ?>" class="card-img-top" ?>
            <a href="<?= base_url('newsc/'). $row['Title']. '/'. $row['slug'];?>">
              <h5 class="card-title"><?= $content=substr($row['name'],0,25); ?></h5>
              </a>
            </li>
            <?php endforeach; ?>
        </ul>
  </div>
          </div>