
<link rel="stylesheet" href="<?php echo base_url('public/css/overlay.css'); ?>">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>


<body>
<div id="table">

            <table id="tableID"> 
            
            <div class="top">
                <h4 class="h4">Company_details<h4>
               <h4 style="text-align:right;"> 
                <a class=""href="<?php echo base_url('addcmp');?>">Add address</a></h4>

              </div>
               <thead>
                 <tr>
                   <th>id</td>
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
    </div>
    <!-- Address Overlay -->
    <div id="address-overlay" style="display: none;">
        <div class="form-container">
            <h3>Address Details</h3>
            <div class="form-fields">
                <form id="address-form">
                    <input type="hidden" id="company_id" name="company_id">
                    <div class="form-row">
                        <input type="hidden" id="company_id" name="company_id">
                        <label for="Address">Address:</label>
                        <input type="text" id="Address" name="Address[]" required>
                        <label for="Latitude">Latitude:</label>
                        <input type="text" id="Latitude" name="Latitude[]">
                        <label for="Longitude">Longitude:</label>
                        <input type="text" id="Longitude" name="Longitude[]" required>
                        <label for="Mobile">Mobile:</label>
                        <input type="text" id="Mobile" name="Mobile[]" required>
                    </div>
                </form>
            </div>
            <div class="form-buttons">
                <button type="button" id="add-row-btn" class="add-btn">Add Row</button>
                <button type="button" id="save-address" class="add-btn">Save</button>
                <button type="button" id="close-overlay" class="close-btn">Close</button>
            </div>
        </div>
    </div>
</main>



<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
        const table = $('#tableID').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('getdata') ?>",
                "type": "POST",
                
            },
            "columns": [
                { "data": 0 },
                { "data": 1 },
                { "data": 2 },
                { "data": 3, "orderable": false},
                { "data": 4, "orderable": false},
                { "data": 5, "orderable": false},
                { "data": 6, "orderable": false}
            ],
            "pageLength": 2,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "order": [[0, 'asc']],
            "info": true
        });

        $('#filterButton').on('click', function () {
            table.ajax.reload();
        });
});


 
$(document).on('click', '.view-address-btn', function () {
        var companyid = $(this).data('company-id');
        console.log(companyid);
        $('#save-address').data('company-id', companyid);
        $('#address-overlay').fadeIn();

        $.ajax({
            url: '<?= base_url("getAddress") ?>', 
            type: 'POST',
            data: { company_id: companyid },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const addressData = response.data;
                    $('#address-form').empty();

                    addressData.forEach(function (address, index) {
                        const newRow = `
                            <div class="form-row" >
                                <input type="hidden" name="id[]" value="${address.id}">
                                <label for="Address">Address:</label>
                                <input type="text" name="Address[]" value="${address.Address}" required>
                                <label for="Latitude">Latitude:</label>
                                <input type="text" name="Latitude[]" value="${address.Latitude}">
                                <label for="Longitude">Longitude:</label>
                                <input type="text" name="Longitude[]" value="${address.Longitude}" required>
                                <label for="Mobile">Mobile:</label>
                                <input type="text" name="Mobile[]" value="${address.Mobile}" required>
                                <button type="button" class="delete-address-btn">Delete</button>
                            </div>`;
                        $('#address-form').append(newRow);
                    });
                } else {
                    alert('Address field is empty');
                }
            },
            error: function () {
                alert('An error occurred while fetching the address data');
            }
        });
    });

    // Close Overlay
    $('#close-overlay').on('click', function () {
        $('#address-overlay').fadeOut();
    });

    // Add Row
    $('#add-row-btn').on('click', function () {
        const newRow = `
            <div class="form-row">
                <label for="Address">Address:</label>
                <input type="text" name="Address[]" required>
                <label for="Latitude">Latitude:</label>
                <input type="text" name="Latitude[]">
                <label for="Longitude">Longitude:</label>
                <input type="text" name="Longitude[]" required>
                <label for="Mobile">Mobile:</label>
                <input type="text" name="Mobile[]" required>
                <button type="button" class="delete-address-btn">Delete</button>
            </div>`;
        $('#address-form').append(newRow);
    });

    // Save Address
    $('#save-address').on('click', function () {
    const companyid = $(this).data('company-id');
    if (!companyid) {
        alert('Company ID is missing!');
        return;
    }

    // Serialize form data
    const formData = $('#address-form').serializeArray();

    // Organize serialized data
    const data = {};
    formData.forEach(function (item) {
        if (!data[item.name]) {
            data[item.name] = [];
        }
        data[item.name].push(item.value);
    });

    data['company_id'] = companyid; // Add company ID

    console.log('Saving data:', data);

    // AJAX request to save data
    $.ajax({
        url: '<?= base_url("saveAddress") ?>',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                alert('Data saved successfully!');
                $('#address-overlay').fadeOut();
                $('#tableID').DataTable().ajax.reload(); 
            } else {
                alert(response.message || 'Failed to save data');
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Response:', xhr.responseText);
            alert('An error occurred while saving the data. Check console for details.');
        }
    });
});


// Delete Address
$(document).on('click', '.delete-address-btn', function () {
    const row = $(this).closest('.form-row');
    const addressId = row.find('input[name="id[]"]').val(); 
    console.log(addressId); 

    $.ajax({
        url: '<?= base_url("deleteAddress") ?>', 
        type: 'POST',
        data: { address_id: addressId }, 
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                alert(response.message); 
                row.remove(); 
            } else {
                alert(response.message || 'Failed to delete address'); 
            }
        },
        error: function () {
            alert('An error occurred while deleting the address'); 
        }
    });
});

</script>

