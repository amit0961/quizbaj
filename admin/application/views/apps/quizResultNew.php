<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quizbaj Result</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
	<div>
		
		<div class="container">
			<div>
				<h1 class="text-center mb-5">Quizbaj Users Examination Result</h1>
				<a class="btn btn-primary" href="<?=site_url('dashboard/index')?>">Back To Dashboard</a>
			</div>
			<div class="col-md-10 mt-5">
				<table id="example" class="display nowrap" style="width:100%">
			        <thead>
			            <tr>
			            	<th>Name</th>
			                <th>Phone No</th>
			                <th>Subject</th>
			                <th>Exam Date</th>
			                <th>Time</th>
			                <th>Points</th>
			            </tr>
			        </thead>
			        <tbody> 
			        	<?php
			                $i=1;
			                if(is_array($total) > 0 )
			                   {
			                      foreach($total as $row)
			                         { ?>
							            <tr>
							                <td><?=$i++?></td>
							                <td><?php echo $row->full_name;?></td>
							                <td><?php echo $row->phone_no;?></td>
							                <td><?php echo $row->gender;?></td>
							                <td><?php echo $row->signup_date;?></td>
							                <?php
							                if($row->status ==1){ ?>
							                	<td >Active</td>
							         <?php }else{ ?>
							                <td >InActive</td>
							           <?php } ?>
							            </tr>
			            <?php }
			        }?>
			            
			        </tbody>
			    </table>
			</div>
			
		</div>
		
	</div>
	

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script>
    	$(document).ready(function() {
		    $('#example').DataTable( {
		        dom: 'Bfrtip',
		        buttons: [
		            'copy', 'csv', 'excel', 'pdf', 'print'
		        ]
		    } );
		} );
    </script>
	
</body>
</html>