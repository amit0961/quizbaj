<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
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
        <h1 class="text-center mb-5">Quizbaj Question Bank</h1>
        <a class="btn btn-primary" href="<?=site_url('dashboard/index')?>">Back To Dashboard</a>
        <form method="post" id="import_form" enctype="multipart/form-data">
           <p>
            <label>Select Excel File</label>
            <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
            </p>
           <br/>
           <input type="submit" name="import" value="Import" class="btn btn-info" />
        </form>
      </div>
      <div class="col-md-10 mt-5">
        <table id="example" class="display nowrap" style="width:100%">
              <thead>
                  <tr>
                    <th>Serial No</th>
                      <th>Name</th>
                      <th>Phone no</th>
                      <th>Gender</th>
                      <th>Registration Date</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                          <tr>
                              <td>erf</td>
                              <td>dfg</td>
                              <td>dfg</td>
                              <td>df</td>
                              <td>dsf</td>
                              
                                <td >Active</td>
                       
                              
                         
                          </tr>
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