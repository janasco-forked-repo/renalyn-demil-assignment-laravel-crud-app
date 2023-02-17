<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Renalyn Demil - CRUD App Laravel-10 & Ajax</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
  <style type="text/css">
      

        body {
          background: radial-gradient(circle at bottom, navy 0, black 100%);
          height: 100vh;
          overflow: hidden;
        }

        .space {
          background: rgba(128, 0, 128, 0.1) center / 200px 200px round;
          border: 1px dashed purple;
          bottom: 0;
          left: 0;
          position: absolute;
          right: 0;
          top: 0;
        }

        .stars1 {
          animation: space 180s ease-in-out infinite;
          background-image: 
            radial-gradient(1px 1px at 25px 5px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1px 1px at 50px 25px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1px 1px at 125px 20px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1.5px 1.5px at 50px 75px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2px 2px at 15px 125px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2.5px 2.5px at 110px 80px, white, rgba(255, 255, 255, 0));
        }

        .stars2 {
          animation: space 240s ease-in-out infinite;
          background-image: 
            radial-gradient(1px 1px at 75px 125px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1px 1px at 100px 75px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1.5px 1.5px at 199px 100px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2px 2px at 20px 50px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2.5px 2.5px at 100px 5px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2.5px 2.5px at 5px 5px, white, rgba(255, 255, 255, 0));
        }

        .stars3 {
          animation: space 300s ease-in-out infinite;
          background-image: 
            radial-gradient(1px 1px at 10px 10px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1px 1px at 150px 150px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1.5px 1.5px at 60px 170px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(1.5px 1.5px at 175px 180px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2px 2px at 195px 95px, white, rgba(255, 255, 255, 0)), 
            radial-gradient(2.5px 2.5px at 95px 145px, white, rgba(255, 255, 255, 0));
        }

        @keyframes space {
          40% {
            opacity: 0.75;
          }
          50% {
            opacity: 0.25;
          }
          60% {
            opacity: 0.75;
          }
          100% {
            transform: rotate(360deg);
          }
        }


  </style>

</head>
{{-- add new planet modal start --}}
<div class="modal fade" id="addPlanetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Planet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_planet_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="my-2">
            <label for="planet_image">Select Planet Image</label>
            <input type="file" name="planet_image" class="form-control" required>
          </div>
          <div class="my-2">
            <label for="planet_name">Planet Name</label>
            <input type="text" name="planet_name" class="form-control" placeholder="Planet Name" required>
          </div>
          <div class="my-2">
            <label for="discovery_year">Discovery Year</label>
            <input type="text" name="discovery_year" class="form-control" placeholder="Discovery Year" required>
          </div>
          <div class="my-2">
            <label for="distance_from_sun">Distance from Sun</label>
            <input type="text" name="distance_from_sun" class="form-control" placeholder="Distance from Sun" required>
          </div>
          <div class="my-2">
            <label for="surface_area">Surface Area</label>
            <input type="text" name="surface_area" class="form-control" placeholder="Surface Area" required>
          </div>
          <div class="my-2">
            <label for="rotation_period">Rotation Period</label>
            <input type="text" name="rotation_period" class="form-control" placeholder="Rotation Period" required>
          </div> 
          <div class="my-2">
            <label for="number_of_moons">Number of Moons</label>
            <input type="text" name="number_of_moons" class="form-control" placeholder="Number of Moons" required>
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_planet_btn" class="btn btn-primary">Add Planet</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- add new planet modal end --}}

{{-- edit planet modal start --}}
<div class="modal fade" id="editPlanetModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Planet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_planet_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="planet_update_id" id="planet_update_id">
        <input type="hidden" name="planet_update_image" id="planet_update_image">
        <div class="modal-body p-4 bg-light"> 
          <div class="mt-2" id="planet_image">
 
          </div>
          <div class="my-2">
            <label for="planet_image">Select Planet Image</label>
            <input type="file" name="planet_image" class="form-control">
          </div>
          <div class="my-2">
            <label for="planet_name">Planet Name</label>
            <input type="text" name="planet_name" id="planet_name" class="form-control" placeholder="Planet Name" required>
          </div>
          <div class="my-2">
            <label for="discovery_year">Discovery Year</label>
            <input type="text" name="discovery_year" id="discovery_year" class="form-control" placeholder="Discovery Year" required>
          </div>
          <div class="my-2">
            <label for="distance_from_sun">Distance from Sun</label>
            <input type="text" name="distance_from_sun" id="distance_from_sun" class="form-control" placeholder="Distance from Sun" required>
          </div>
          <div class="my-2">
            <label for="surface_area">Surface Area</label>
            <input type="text" name="surface_area" id="surface_area" class="form-control" placeholder="Surface Area" required>
          </div>
          <div class="my-2">
            <label for="rotation_period">Rotation Period</label>
            <input type="text" name="rotation_period" id="rotation_period" class="form-control" placeholder="Rotation Period" required>
          </div>
          <div class="my-2">
            <label for="number_of_moons">Number of Moons</label>
            <input type="text" name="number_of_moons" id="number_of_moons" class="form-control" placeholder="Number of Moons" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_planet_btn" class="btn btn-success">Update Planet</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit planet modal end --}}

<body class="bg-light ">
 
  <div class="space stars1"></div>
  <div class="space stars2"></div>
  <div class="space stars3"></div>
  <br>
  <div class="text-center">
    <h1 class="text-light">MyPlanets</h1>
    <h3 class="text-light">@RENALYN DEMIL </h3>
    <h1 class="text-light">CRUD App Laravel-10 & Ajax</h1>
  </div>
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center" style="background-color: #673ab7!important;">
            <h3 class="text-light">Manage Planets</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addPlanetModal"><i
                class="bi-plus-circle me-2"></i>Add New Planet</button>
          </div>
          <div class="card-body" id="show_all_planets">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center"> 
    <h6 class="text-light">Subject: Interactive Programming and Technologies (IPT1)</h6>
    <h6 class="text-light">@RENALYN DEMIL </h6>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function() {

      // add new planet ajax request
      $("#add_planet_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_planet_btn").text('Adding...');
        $.ajax({
          url: '{{ route('create') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Planet Added Successfully!',
                'success'
              )
              fetchAllPlanets();
            }
            $("#add_planet_btn").text('Add Planet');
            $("#add_planet_form")[0].reset();
            $("#addPlanetModal").modal('hide');
          }
        });
      });

      // edit planet ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#planet_name").val(response.planet_name);
            $("#discovery_year").val(response.discovery_year);
            $("#distance_from_sun").val(response.distance_from_sun);
            $("#surface_area").val(response.surface_area);
            $("#rotation_period").val(response.rotation_period);
            $("#number_of_moons").val(response.number_of_moons);
            $("#planet_image").html(
              `<img src="storage/images/${response.planet_image}" width="100" class="img-fluid img-thumbnail">`);
            $("#planet_update_id").val(response.id);
            $("#planet_update_image").val(response.planet_image);
          }
        });
      });

      // update planet ajax request
      $("#edit_planet_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_planet_btn").text('Updating...');
        $.ajax({
          url: '{{ route('update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Planet Updated Successfully!',
                'success'
              )
              fetchAllPlanets();
            }
            $("#edit_planet_btn").text('Update Planet');
            $("#edit_planet_form")[0].reset();
            $("#editPlanetModal").modal('hide');
          }
        });
      });

      // delete planet ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?\nDELETE this planet?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your planet has been deleted.',
                  'success'
                )
                fetchAllPlanets();
              }
            });
          }
        })
      });

      // fetch all planets ajax request
      fetchAllPlanets();

      function fetchAllPlanets() {
        $.ajax({
          url: '{{ route('read') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_planets").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>
</body>

</html>