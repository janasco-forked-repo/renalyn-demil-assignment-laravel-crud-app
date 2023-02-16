<!DOCTYPE html>
<html>
<head>
    <title>Sarah May Anasco - Laravel 9 AJAX CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets-pro/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets-pro/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 
 
</head>
<body class="profile-page">
         
    <div class="page-header header-filter header-small" data-parallax="true" style="padding-top: 103px;background-image: url(&apos;/assets-pro/img/bg9.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center" style="padding-bottom: 80px;">
                    <h1 class="title" style="color: cornsilk;">Sarah May G. Añasco</h1>
                    <h6 style="color: cornsilk;">This is my Laravel 9 using AJAX from jquery with CRUD or Create, Read, Update, and Delete</h6>
                    <p style="color: greenyellow;">Subject - Integrated Programming and Technologies 1</p>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised" style="padding-top: 42px;"> 
        <div class="profile-content">
            <div class="container">
                 

                <div class="row"> 
                    <div class="col-xs-2 follow">
                       <a class="btn btn-fab btn-primary" id="createNewPlanet" data-toggle="modal" data-target="createNewPlanet" title="Add new Planet">
                            <i class="material-icons">add</i>
                        </a>
                    </div>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered data-table">
                            <colgroup>
                                <col width="5%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="10%">
                                <col width="15%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Planet Name</th>
                                    <th>Discovery Year</th>
                                    <th>Distance from Sun</th>
                                    <th>Surface Area</th>
                                    <th>Rotation Period</th>
                                    <th>Number of Moons</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead> 
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
    </div>


    <div class="page-header header-filter header-small" data-parallax="true" style="padding-top: 103px;background-image: url(&apos;/assets-pro/img/bg9.jpg&apos;);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center" style="padding-bottom: 80px;">
                    <h1 class="title" style="color: cornsilk;">Sarah May G. Añasco</h1>
                    <h6 style="color: cornsilk;">This is my Laravel 9 using AJAX from jquery with CRUD or Create, Read, Update, and Delete</h6>
                    <p style="color: greenyellow;">Subject - Integrated Programming and Technologies 1</p>
                </div>
            </div>
        </div>
    </div>




 
    <div class="modal fade" id="ajaxPlanetModel" tabindex="-1" aria-hidden="true" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="planetForm" name="planetForm" class="form-horizontal">
                       <input type="hidden" name="planet_id" id="planet_id">

                        <div class="form-group">
                            <label for="planetname" class="col-sm-2 control-label">Planet Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="planetname" name="planetname" placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Discovery Year</label>
                            <div class="col-sm-12">
                                <textarea id="discovery_year" name="discovery_year" required="" placeholder="Enter Discovery Year" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Distance from Sun</label>
                            <div class="col-sm-12">
                                <textarea id="distance_from_sun" name="distance_from_sun" required="" placeholder="Enter Distance from Sun" class="form-control"></textarea>
                            </div>
                        </div>
 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Surface Area</label>
                            <div class="col-sm-12">
                                <textarea id="surface_area" name="surface_area" required="" placeholder="Enter Surface Area" class="form-control"></textarea>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Rotation Period</label>
                            <div class="col-sm-12">
                                <textarea id="rotation_period" name="rotation_period" required="" placeholder="Enter Rotation Period" class="form-control"></textarea>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Number of Moons</label>
                            <div class="col-sm-12">
                                <textarea id="number_of_moons" name="number_of_moons" required="" placeholder="Enter Number of Moons" class="form-control"></textarea>
                            </div>
                        </div>
            
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 

</body>
 

<script type="text/javascript">
  $(function () {
      
    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/ 
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
      
    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('planet.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'planetname', name: 'planetname'},
            {data: 'discovery_year', name: 'discovery_year'},
            {data: 'distance_from_sun', name: 'distance_from_sun'},
            {data: 'surface_area', name: 'surface_area'},
            {data: 'rotation_period', name: 'rotation_period'},
            {data: 'number_of_moons', name: 'number_of_moons'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
        
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewPlanet').click(function () {
        $('#saveBtn').val("create-planet");
        $('#planet_id').val('');
        $('#planetForm').trigger("reset");
        $('#modelHeading').html("Create New Planet");
        $('#ajaxPlanetModel').modal('show');
    });
      
    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editPlanet', function () {
      var planet_id = $(this).data('id');
      $.get("{{ route('planet.index') }}" +'/' + planet_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Planet");
          $('#saveBtn').val("edit-user");
          $('#ajaxiPlanetModel').modal('show');
          $('#planet_id').val(data.id);
          $('#planetname').val(data.model);
          $('#discovery_year').val(data.released);
          $('#distance_from_sun').val(data.discontinued);
          $('#surface_area').val(data.capacities);
          $('#rotation_period').val(data.processor);
          $('#number_of_moons').val(data.os);
      })
    });
       
    /*------------------------------------------
    --------------------------------------------
    Create Planet Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Adding..');
      
        $.ajax({
          data: $('#planetForm').serialize(),
          url: "{{ route('planet.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
       
              $('#planetForm').trigger("reset");
              $('#ajaxPlanetModel').modal('hide');
              table.draw(); 
              $('#saveBtn').html('Save');
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
      
    /*------------------------------------------
    --------------------------------------------
    Delete Planet Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deletePlanet', function () {
     
        var planet_id = $(this).data("id");
        confirm("Are You sure want to delete !");
        
        $.ajax({
            type: "DELETE",
            url: "{{ route('planet.store') }}"+'/'+planet_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
       
  });
</script>
</html>