
                <div id="table">
                    <div class="top">
                        <button><a href="<?php echo base_url('UserController/blog'); ?>"><i class="fa-solid fa-backward"></i> Back</a></button>
                        <h4 class="h4">Blog Recycle Data</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Create Date</th>
                                <th>Update Date</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['user'] as $user) {?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo $user['Title']; ?></td>
                                    <td><?php echo $user['description']; ?></td>
                                    <td><?php echo $user['createdate']; ?></td>
                                    <td><?php echo $user['updatedate']; ?></td>
                                    <td>
                                        <?php if (!empty($user['image'])): ?>
                                            <img src="<?php echo base_url('uploads/images/' . $user['image']); ?>" alt="Blog Image" height="50">
                                        <?php else: ?>
                                            <span>No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="<?php echo base_url('UserController/blogdelete/'.$user['id']); ?>">
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                        </form>
                                        <form method="POST" action="<?php echo base_url('UserController/blogrestore/'.$user['id']); ?>" style="display:inline;">
                                            <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Restore</button>
                                        </form>
                                    </td>
                                </tr>

                            <?php }
                               ?>

                        </tbody>

                    </table>
                    <div class="pagination-links">
            
                    <?php echo $data['links']; ?>  
 
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
