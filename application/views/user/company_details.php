
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js" charset="utf8" type="text/javascript"></script>


<body>
<div id="table">

            <table id="tableID"> 
            
            <div class="top">
                <h4 class="h4">Company_details<h4>
               <h4 style="text-align:right;"> 
                <!-- <a class=""href="<?php echo base_url('UserController/addblog');?>">Add address</a></h4> -->

                

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script>
    $(document).ready(function () {
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
                { "data": 4, "orderable": false},
                { "data": 5, "orderable": false},
                { "data": 5, "orderable": false}


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
</script>


