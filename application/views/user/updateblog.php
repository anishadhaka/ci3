
  <link rel="stylesheet" href="<?php echo base_url('public/css/updateblog.css'); ?>">
             
  <div id="form">
  <form name="simple" method="POST" action="<?php echo base_url('UserController/updateblog/'.$user['id']) ?>">
    <div id="heading"> Update Blog Data </div>

    <div class="form-row">
      <div class="col-md-6">
        <label class="mb-3 mr-1">Title</label>
        <select class="form-control" id="Title" name="Title" required>
          <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $categorys): ?>
              <option value="<?php echo $categorys['Title']; ?>"><?php echo $categorys['Title']; ?></option>
            <?php endforeach; ?>
          <?php else: ?>
            <option value="">No Categories Available</option>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label class="mb-3 mr-1" for="name">Name: </label>
        <input class="form-control" type="text" name="name" placeholder="name" value="<?php echo $user['name'] ?>" />
        <input type="hidden" name="id" value="<?php echo $user['id']?>"/>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-12">
        <label class="mb-3 mr-1" for="description">Description</label>
        <textarea id="editor" class="form-control" type="description" name="description" value="<?php echo $user['Description']; ?>">
          &lt;p&gt;<?php echo $user['description'] ?>&lt;/p&gt;
        </textarea>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-6">
        <label class="mb-3 mr-1" for="createdate">Create Date: </label>
        <input class="form-control" type="date" name="createdate" value="<?php echo $user['createdate'] ?>" />
      </div>

      <div class="col-md-6">
        <label class="mb-3 mr-1" for="updatedate">Update Date: </label>
        <input class="form-control" type="date" name="updatedate" value="<?php echo $user['updatedate'] ?>" />
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-12">
        <label for="image">Upload Image:</label><br>
        <?php if (!empty($user['image'])): ?>
          <img src="<?php echo base_url('uploads/images/' . $user['image']); ?>" alt="Blog Image" height="100">
        <?php else: ?>
          <span>No Image</span>
        <?php endif; ?>
        <input type="file" name="image" id="image" value="<?php echo $user['image']; ?>" />
        <?php if (isset($upload_error)) { echo '<div class="error-message">' . $upload_error . '</div>'; } ?>
      </div>
    </div>

    <div class="form-button mt-3">
      <button id="submit" type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>

<!-- <script>
  ClassicEditor.create(document.querySelector('#editor')).catch(error => { console.error(error); });
  editor.resize(300, 500);
</script>
<script> CKEDITOR.replace('editor') </script> -->