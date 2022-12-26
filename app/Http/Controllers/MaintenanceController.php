<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vehicleId)
    {
        if (Auth::id() != Vehicle::find($vehicleId)->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        $manutencoes = Maintenance::where('vehicle_id', $vehicleId)->get();

        return view('manutencao.listMaintenance', ['vehicle_id'=>$vehicleId, 'maintenances'=>$manutencoes]);
        // return view('manutencao.listMaintenance')->with('vehicle_id', $vehicleId);
        
        return response()->json(['data' => $manutencoes]);
    }

    public function routeAddMaintenance($vehicleId)
    {
        return view('manutencao.addMaintenance', ['vehicle_id' => $vehicleId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $vehicleId)
    {
        if (Auth::id() != Vehicle::find($vehicleId)->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        $veiculo = Vehicle::find($vehicleId);

        $data = $request->only([
            'maintenance',
            'description',
            'scheduling',
        ]);
        $data['vehicle_id'] = $veiculo->id;

        $validador = Validator::make($request->all(), [
            'maintenance' => 'required|max:30',
            'description' => 'required|max:600',
            'scheduling' => 'required',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
        }

        Maintenance::create($data);

        return redirect(route('vehicles.index'));
        
        // return response()->json(['message' => 'A manutenção foi marcada para '
        //     .$request->scheduling. ' com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manutencao = Maintenance::find($id);
        $veiculo = Vehicle::find($manutencao->vehicle_id);

        if (Auth::id() != $veiculo->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        return response()->json(['message' => $manutencao]);
    }


    public function routeEditMaintenance($vehicleId)
    {
        return view('manutencao.editMaintenance', ['vehicle_id' => $vehicleId]);
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
        $manutencao = Maintenance::find($id);
        $veiculo = Vehicle::find($manutencao->vehicle_id);

        if (Auth::id() != $veiculo->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }

        $data = $request->only([
            'maintenance',
            'description',
            'scheduling',
        ]);

        $validador = Validator::make($request->all(), [
            'maintenance' => 'required|max:30',
            'description' => 'required|max:600',
            'scheduling' => 'required|date_format:Y-m-d',
        ]);

        if($validador->fails()){
            return response()->json(['message' => $validador->messages()]);
        }

        Maintenance::find($id)->update($data);

        return redirect(route('vehicles.index'));

        return response()->json(['message' => 'A manutenção alterada para '
            .$request->scheduling. ' aguardamos voce']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manutencao = Maintenance::find($id);
        $veiculo = Vehicle::find($manutencao->vehicle_id);

        if (Auth::id() != $veiculo->user_id){
            return response()->json(['message' => 'Usuario Não autorizado'], 401);
        }
        
        Maintenance::find($id)->delete();

        return redirect(route('vehicles.index'));

        // return response()->json(['message' => 'Manutenção cancelada']);
    }
}
