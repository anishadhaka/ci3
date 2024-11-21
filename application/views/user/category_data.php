<div class="category-title">
    <h2>Category: <?php echo $categoryTitle; ?></h2>  
</div>

<div class="blog-posts">
    <?php if (!empty($user)): ?>
        <?php foreach ($user as $post): ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($post['Title']); ?></h3> 
                <p><?php echo htmlspecialchars($post['description']); ?></p> 
                <p><strong>Created on:</strong> <?php echo $post['createdate']; ?></p> 
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No posts found for this category.</p>  
    <?php endif; ?>
</div>