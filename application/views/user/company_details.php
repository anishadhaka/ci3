<style>
    #address-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9999;
        padding: 20px;
        overflow: auto; 
    }

    #address-overlay > div {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        max-width: 800px;
        margin: 0 auto;
        max-height: 90%; 
        overflow-y: auto;
    }

    button#close-overlay {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .btn {
        cursor: pointer;
    }

</style>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>

<body>
    <div id="table">
        <table id="tableID">
            <div class="top">
                <h4 class="h4">Company Details</h4>
                <h4 style="text-align:right;">
                    <a href="<?php echo base_url('Welcome/addcmp'); ?>">Add company</a>
                </h4>
            </div>
            <thead>
                <tr>
                    <th>id</th>
                    <th>company_id</th>
                    <th>company_name</th>
                    <th>company_type</th>
                    <th>company_email</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>

    <!-- Address Overlay (Popup) -->
            <div id="address-overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 9999; padding: 20px;">
        <div style="background-color: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: 0 auto;">
        <h4>Company Address</h4>
            <table id="tableID2">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>company_id</th>
                        <th>address</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>mobile</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
            <h3>Company Address Details</h3>
            <div id="form-container">
            </div>

            <!-- <div class="form1">
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" id="address" name="address">
                    <div class="error-message"> <?= form_error('address') ?></div>
                </div>
                <div class="input-group">
                    <label>Mobile</label><br>
                    <input type="text" id="mobile" name="mobile">
                    <div class="error-message"><?= form_error('mobile'); ?></div>
                </div>

                <div class="input-group">
                    <label>Latitude</label>
                    <input type="text" id="latitude" name="latitude">
                    <div class="error-message"> <?= form_error('latitude') ?></div>
                </div>
                <div class="input-group">
                    <label>Longitude</label>
                    <input type="text" id="longitude" name="longitude">
                    <div class="error-message"> <?= form_error('longitude') ?></div>
                </div> -->

               
            <!-- </div> -->
            <button id="close-overlay"
            style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">Close</button>
            <button id="add-overlay"
                style="background-color: blue; color: white; padding: 10px 20px; border: none; cursor: pointer;">Add</button>
                
        </div>
    </div>


    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize the company table (main table)
            const table = $('#tableID').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= base_url('Welcome/getprofileData') ?>",
                    "type": "POST",
                },
                "columns": [
                    { "data": 0 },
                    { "data": 1 },
                    { "data": 2 },
                    { "data": 3 },
                    { "data": 4, "orderable": false },
                    { "data": 5, "orderable": false },
                    { "data": 6, "orderable": false },
                    { "data": 7, "orderable": false }
                ],
                "pageLength": 2,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "order": [[0, 'asc']],
                "info": true
            });
        });

    //         <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    // <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
  $(document).ready(function() {
    $(document).on('click', '.view-address-btn', function(event) {
        event.preventDefault(); 
        $('#address-overlay').fadeIn();
    });

    
    $('#close-overlay').on('click', function() {
        $('#address-overlay').fadeOut();
    });

   
    $('#add-overlay').click(function(event) {
        event.preventDefault(); 
        
        var newForm = `
        <form method="POST" action="<?php echo base_url('Welcome/adddata'); ?>">
            <h5>Add More Address </h5>
            <div class="form1">
                
        
            
             <div class="input-group">
                    <label>company_id</label>
                    <input type="number" id="company_id" name="company_id" value="<?php echo $user['company_id']; ?>" >
                    <div class="error-message"> <?= form_error('company_id') ?></div>
                </div>

                <div class="input-group">
                    <label>Address</label>
                    <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" >
                     <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
                    <div class="error-message"> <?= form_error('address') ?></div>
                </div>
                <div class="input-group">
                    <label>Mobile</label><br>
                    <input type="number" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>"> 
                    <div class="error-message"><?= form_error('mobile'); ?></div>
                </div>

                <div class="input-group">
                    <label>Latitude</label>
                    <input type="number" id="latitude" name="latitude"  value="<?php echo $user['latitude']; ?>">
                    <div class="error-message"> <?= form_error('latitude') ?></div>
                </div>
                <div class="input-group">
                    <label>longitute</label>
                    <input type="number" id="longitute" name="longitute" value="<?php echo $user['longitute']; ?>">
                    <div class="error-message"> <?= form_error('longitute') ?></div>
                </div>
                <button> Submit </button>
            </div>
            </form>
        `;

       
        $('#form-container').append(newForm);
    });

    
    $(document).on('click', '.close-overlay', function() {
        $(this).closest('.form1').remove(); 
    });


            // Initialize the address details table (inside popup)
            const addressTable = $('#tableID2').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= base_url('Welcome/getprofileData2') ?>",
                    "type": "POST",
                },
                "columns": [
                    { "data": 0 },
                    { "data": 1 },
                    { "data": 2 },
                    { "data": 3 },
                    { "data": 4, "orderable": false },
                    { "data": 5, "orderable": false },
                    { "data": 6, "orderable": false },
                    { "data": 7, "orderable": false }

                ],
                "pageLength": 2,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "order": [[0, 'asc']],
                "info": true
            });

            // Filter the table when the button is clicked (optional)
            $('#filterButton').on('click', function () {
                table.ajax.reload();
            });
        });
    </script>
</body>