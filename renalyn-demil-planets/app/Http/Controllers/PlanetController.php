<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanetController extends Controller
{
    // set index page view
    public function index() {
        return view('index');
    }

    // handle fetch all eamployees ajax request
    public function read() {
        $plnets_fetch = Planet::all();
        $output = '';
        if ($plnets_fetch->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Planet Image</th>
                <th>Planet Name</th>
                <th>Discovery Year</th>
                <th>Distance from Sun</th>
                <th>Surface Area</th>
                <th>Rotation Period</th>
                <th>Number of Moons</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($plnets_fetch as $palnet_loop) {
                $output .= '<tr>
                <td>' . $palnet_loop->id . '</td>
                <td><img src="storage/images/' . $palnet_loop->planet_image . '" width="50" class="img-thumbnail rounded-circle"></td> 
                <td>' . $palnet_loop->planet_name . '</td>
                <td>' . $palnet_loop->discovery_year . '</td>
                <td>' . $palnet_loop->distance_from_sun . '</td>
                <td>' . $palnet_loop->surface_area . '</td>
                <td>' . $palnet_loop->rotation_period . '</td>
                <td>' . $palnet_loop->number_of_moons . '</td> 
                <td>
                  <a href="#" id="' . $palnet_loop->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPlanetModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $palnet_loop->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new planet ajax request
    public function create(Request $request) {
        $file = $request->file('planet_image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);

        $planetData = ['planet_name' => $request->planet_name, 'discovery_year' => $request->discovery_year, 'distance_from_sun' => $request->distance_from_sun, 'surface_area' => $request->surface_area, 'rotation_period' => $request->rotation_period, 'number_of_moons' => $request->number_of_moons, 'planet_image' => $fileName];
        Planet::create($planetData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an planet ajax request
    public function edit(Request $request) {
        $id = $request->id;
        $planet_edit = Planet::find($id);
        return response()->json($planet_edit);
    }

    // handle update an planet ajax request
    public function update(Request $request) {
        $fileName = '';
        $planet_update = Planet::find($request->planet_update_id);
        if ($request->hasFile('planet_image')) {
            $file = $request->file('planet_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($planet_update->planet_image) {
                Storage::delete('public/images/' . $planet_update->planet_image);
            }
        } else {
            $fileName = $request->planet_update_image;
        }

        $planetData = ['planet_name' => $request->planet_name, 'discovery_year' => $request->discovery_year, 'distance_from_sun' => $request->distance_from_sun, 'surface_area' => $request->surface_area, 'rotation_period' => $request->rotation_period, 'number_of_moons' => $request->number_of_moons, 'planet_image' => $fileName];

        $planet_update->update($planetData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an planet ajax request
    public function delete(Request $request) {
        $id = $request->id;
        $planet_delete = Planet::find($id);
        if (Storage::delete('public/images/' . $planet_delete->planet_image)) {
            Planet::destroy($id);
        }
    }
}
