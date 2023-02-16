<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Planet;
use DataTables;
 

class PlanetAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        if ($request->ajax()) {
  
            $data = Planet::latest()->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-link btn-info btn-just-icon editPlanet"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class=" btn btn-link btn-danger btn-just-icon remove deletePlanet"><i class="material-icons">close</i><div class="ripple-container"></div></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('planetAjax');
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Planet::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'planetname' => $request->planetname, 
                    'discovery_year' => $request->discovery_year, 
                    'distance_from_sun' => $request->distance_from_sun, 
                    'surface_area' => $request->surface_area, 
                    'rotation_period' => $request->rotation_period, 
                    'number_of_moons' => $request->number_of_moons
                ]);        
      
        return response()->json(['success'=>'Planet saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planet = Planet::find($id);
        return response()->json($planet);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planet  $planet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Planet::find($id)->delete();
      
        return response()->json(['success'=>'Planet deleted successfully.']);
    }
}
