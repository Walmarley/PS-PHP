<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceScheduledController extends Controller
{
    public function scheduling()
    {

        $manutencoes = Maintenance::whereBetween('scheduling', [
                Carbon::now(), Carbon::now()->addDays(7)
            ])
            ->get();

        return response()->json(['data' => $manutencoes]);
    }

    public function schedulingUser()
    {
        $user = Auth::user();

        $maintenanceScheduleds = Vehicle::where('user_id', $user->id)
            ->join('maintenances', 'maintenances.vehicle_id', 'vehicles.id')
            ->select('vehicles.mark', 'vehicles.model', 'maintenances.maintenance', 'maintenances.description', 'maintenances.scheduling', 'vehicles.plate')
            ->whereBetween('maintenances.scheduling',[
                Carbon::now(), Carbon::now()->addDays(7)
            ])
            ->get();

        return view('manutecaoAgendada.listMaintenanceScheduling')->with('maintenanceScheduleds', $maintenanceScheduleds);

        return response()->json(['date' => $maintenanceScheduleds]);
    }
}
