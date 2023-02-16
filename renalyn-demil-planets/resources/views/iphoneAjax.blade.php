<!DOCTYPE html>
<html>
<head>
    <title>Sarah May Anasco - Laravel 9 AJAX CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets-pro/img/apple-icon.png'); }}">
    <link rel="icon" type="image/png" href="{{ URL::asset('assets-pro/img/favicon.png'); }}">
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
         
    <div class="page-header header-filter header-small" data-parallax="true" style="padding-top: 103px;background-image: url(&apos;{{ URL::asset('assets-pro/img/bg9.jpg'); }}&apos;);">
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
                       <a class="btn btn-fab btn-primary" id="createNewiPhone" data-toggle="modal" data-target="createNewiPhone" title="Add new iPhone">
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
                                    <th>iPhone Model</th>
                                    <th>Released</th>
                                    <th>Discontinued</th>
                                    <th>Capacities</th>
                                    <th>Processor</th>
                                    <th>OS</th>
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


    <div class="page-header header-filter header-small" data-parallax="true" style="padding-top: 103px;background-image: url(&apos;{{ URL::asset('assets-pro/img/bg9.jpg'); }}&apos;);">
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




 
    <div class="modal fade" id="ajaxiPhoneModel" tabindex="-1" aria-hidden="true" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="iphoneForm" name="iphoneForm" class="form-horizontal">
                       <input type="hidden" name="iphone_id" id="iphone_id">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">iPhone Model</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="model" name="model" placeholder="Enter Model" value="" maxlength="50" required="">
                            </div>
                        </div>
           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Released</label>
                            <div class="col-sm-12">
                                <textarea id="released" name="released" required="" placeholder="Enter Released" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">discontinued</label>
                            <div class="col-sm-12">
                                <textarea id="discontinued" name="discontinued" required="" placeholder="Enter Discontinued" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Capacities</label>
                            <div class="col-sm-12">
                                <textarea id="capacities" name="capacities" required="" placeholder="Enter Capacities" class="form-control"></textarea>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Processor</label>
                            <div class="col-sm-12">
                                <textarea id="processor" name="processor" required="" placeholder="Enter processor" class="form-control"></textarea>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">OS</label>
                            <div class="col-sm-12">
                                <textarea id="os" name="os" required="" placeholder="Enter OS" class="form-control"></textarea>
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
        ajax: "{{ route('iphones.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'model', name: 'model'},
            {data: 'released', name: 'released'},
            {data: 'discontinued', name: 'discontinued'},
            {data: 'capacities', name: 'capacities'},
            {data: 'processor', name: 'processor'},
            {data: 'os', name: 'os'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
       
    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewiPhone').click(function () {
        $('#saveBtn').val("create-iphone");
        $('#iphone_id').val('');
        $('#iphoneForm').trigger("reset");
        $('#modelHeading').html("Create New iPhone");
        $('#ajaxiPhoneModel').modal('show');
    });
      
    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editiPhone', function () {
      var iphone_id = $(this).data('id');
      $.get("{{ route('iphones.index') }}" +'/' + iphone_id +'/edit', function (data) {
          $('#modelHeading').html("Edit iPhone");
          $('#saveBtn').val("edit-user");
          $('#ajaxiPhoneModel').modal('show');
          $('#iphone_id').val(data.id);
          $('#model').val(data.model);
          $('#released').val(data.released);
          $('#discontinued').val(data.discontinued);
          $('#capacities').val(data.capacities);
          $('#processor').val(data.processor);
          $('#os').val(data.os);
      })
    });
       
    /*------------------------------------------
    --------------------------------------------
    Create iPhone Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Adding..');
      
        $.ajax({
          data: $('#iphoneForm').serialize(),
          url: "{{ route('iphones.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
       
              $('#iphoneForm').trigger("reset");
              $('#ajaxiPhoneModel').modal('hide');
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
    Delete iPhone Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteiPhone', function () {
     
        var iphone_id = $(this).data("id");
        confirm("Are You sure want to delete !");
        
        $.ajax({
            type: "DELETE",
            url: "{{ route('iphones.store') }}"+'/'+iphone_id,
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