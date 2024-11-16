
<link rel="stylesheet" href="<?php echo base_url('public/css/profile.css') ?>">

            <div class="header">
                <h1>User Detail</h1>
                <div class="form1">
                    <form name="simple">
                        <div id="form">
                            <div>
                                <label for="name">Name:</label><br>
                                <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>"readonly><br><br>
                                <input type="hidden"  name="id" id="id" value="<?php echo $user['id'];?>"/>

                                <label for="email">Email:</label><br>
                                <input type="text" id="email" name="email"
                                    value="<?php echo $user['email']; ?>" readonly><br><br>

                                <label for="number"> Number:</label><br>
                                <input type="text" id="number" name="number"
                                    value="<?php echo $user['number']; ?>" readonly><br><br>

                               

                                <label for="city">City:</label><br>
                                <input type="text" id="city" name="city" value="<?php echo $user['city']; ?>" readonly><br><br>
                               
                            </div>
                           
                        </div>

                    </form>
                </div>
            </div>
