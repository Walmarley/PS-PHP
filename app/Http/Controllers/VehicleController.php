<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $vehicles = Vehicle::all()->where('user_id', $user->id);

        return view('vehicles.listVehicle')->with('vehicles', $vehicles);

        // return response()->json(['data'=>$vehicles]);
    }

    public function routeAddVehicle()
    {
        return view('vehicles.addVehicle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'mark',
            'version',
            'model',
            'color',
            'plate',
        ]);
        $data['user_id'] = Auth::user()->id;

        $validador = Validator::make($request->all(),[
            'model' => 'required|max:20',
            'mark' => 'required|max:20',
            'model' => 'required|max:20',
            'color' => 'required|max:20',
            'plate' => 'required|min:4',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
        }

        Vehicle::create($data);

        return redirect(route('vehicles.index'));

        // return response()->json(['message' => 'Veiculo ' .$request->model. ' salvo com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::id() != Vehicle::find($id)->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        $vehicle = Vehicle::find($id);

        return response()->json(['data'=> $vehicle]);
    }

    public function routeEditVehicle()
    {
        return view('vehicles.editVehicle');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'mark',
            'version',
            'model',
            'color',
            'plate',
        ]);

        $validador = Validator::make($request->all(),[
            'model' => 'required|max:20',
            'mark' => 'required|max:20',
            'model' => 'required|max:20',
            'color' => 'required|max:20',
            'plate' => 'required|min:4',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
        }

        Vehicle::find($id)->update($data);

        return response()->json(['message' => 'Veiculo ' .$request->model. ' salvo com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::id() != Vehicle::find($id)->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        Vehicle::find($id)->delete();

        return redirect(route('vehicles.index'));

        // return response()->json(['message' => 'Veiculo removido do nosso banco de dados']);
    }
}
