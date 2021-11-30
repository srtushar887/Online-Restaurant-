<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\measurement;
use App\Models\store_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminMeasurementController extends Controller
{
    public function measurement()
    {
        $store_types = store_type::all();
        return view('admin.measurement.measurementList', compact('store_types'));
    }

    public function measurement_save(Request $request)
    {
        $new_meas = new measurement();
        $new_meas->measurement_name = $request->measurement_name;
        $new_meas->measurement_store_type = $request->measurement_store_type;
        $new_meas->save();
        return back()->with('success', 'Measurement Successfully Created');
    }

    public function measurement_get(Request $request)
    {
        $meas = DB::table('measurements')->get();
        return DataTables::of($meas)
            ->addColumn('action', function ($meas) {
                return ' <button id="' . $meas->id . '" onclick="editmeas(this.id)" class="btn btn-success btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editmeasurement"><i class="fas fa-edit"></i> </button>
                        <button id="' . $meas->id . '" onclick="deletemeas(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletemeasurement"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($main_cats) {
                return Carbon::parse($main_cats->created_at)->format('d-F-Y');
            })
            ->editColumn('measurement_store_type', function ($meas) {
                $type = store_type::select('store_type_name')->where('id', $meas->measurement_store_type)->first();
                if ($type) {
                    return $type->store_type_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }

    public function measurement_single(Request $request)
    {
        $sing_meas = measurement::where('id', $request->id)->first();
        return response()->json($sing_meas, 200);
    }

    public function measurement_update(Request $request)
    {
        $update_meas = measurement::where('id', $request->edit_measurement)->first();
        $update_meas->measurement_name = $request->edit_measurement_name;
        $update_meas->measurement_store_type = $request->edit_measurement_store_type;
        $update_meas->save();
        return back()->with('success', 'Measurement Successfully Updated');
    }

    public function measurement_delete(Request $request)
    {
        $meas_del = measurement::where('id', $request->measurement_delete)->first();
        $meas_del->delete();
        return back()->with('success', 'Measurement Successfully Deleted');
    }
}
