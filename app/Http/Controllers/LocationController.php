<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller{
    
    /**
     * constructor 
    */
    public function __construct(){
        //
    }
    /**
     * list of locations
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list(Request $request){
        try {
            $limit = $request['per_page'] ? $request['per_page'] : 10;
            $locations= Location::orderBy('id','DESC')->paginate($limit);
            return view('Admin.Location.List_location',[
                        'locations' => $locations,
                        'perPageOptions' => [10, 20, 50, 100]
                    ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * add location view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addLocation(){
        return view('Admin.Location.Add_location');
    }

    /**
     * save locations
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request){
        $request->validate([
            'address' => 'required',
            'landmark' =>'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);
        $request['status'] = 'active';
        $result = Location::create($request->all());
    
        session()->flash('message', 'Location Saved successfully!');
       
        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $locations= Location::orderBy('id','DESC')->paginate($limit);
        
        return view('Admin.Location.List_location',[
                        'locations' => $locations,
                        'perPageOptions' => [10, 20, 50, 100]
                ]);
    }

    /**
     * update view 
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    */
    public function update($id){
        $location = Location::find($id);
        return view('Admin.Location.update',compact('location'));
    }

     /**
      * update the existing record
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    */
     public function change( Request $request){    
        $id = $request->id;
        $location = Location::find($id);

        $location->address = $request->address;
        $location->landmark = $request->landmark;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->zip = $request->zip;
        $location->status = $request->status;
        $location->save();
        session()->flash('message', 'Location Updated successfully!');
        return redirect('Location/list');
    }
        
    public function delete($id){
        Location::find($id)->forceDelete();
        session()->flash('message', 'Location Deleted successfully!');
        return redirect('Location/list');
    }

   


}
