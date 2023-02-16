<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\iPhone;
use DataTables;
 

class iPhoneAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        if ($request->ajax()) {
  
            $data = iPhone::latest()->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-link btn-info btn-just-icon editiPhone"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class=" btn btn-link btn-danger btn-just-icon remove deleteiPhone"><i class="material-icons">close</i><div class="ripple-container"></div></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('iphoneAjax');
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        iPhone::updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'model' => $request->model, 
                    'released' => $request->released, 
                    'discontinued' => $request->discontinued, 
                    'capacities' => $request->capacities, 
                    'processor' => $request->processor, 
                    'os' => $request->os
                ]);        
      
        return response()->json(['success'=>'iPhone saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\iPhone  $iphone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iphone = iPhone::find($id);
        return response()->json($iphone);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\iPhone  $iphone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        iPhone::find($id)->delete();
      
        return response()->json(['success'=>'iPhone deleted successfully.']);
    }
}
