<?php

namespace App\Modules\Dashboard\Http\Controllers;

use App\Modules\Logticket\Models\LogActivity;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DataTables;

class ReportDataTableController extends Controller
{

    protected $logs;

    public function __construct(LogActivity $logs)
    {
        $this->logs = $logs;
    }

    public function getReport(){
        $report_log = $this->logs->orderBy('reference', 'desc')->distinct()->get();

        $dataTable = DataTables::of($report_log)->addColumn('actions', function($log){
            return view('dashboard::datatable_actions.action', compact('log'));
        });
        $dataTable->addColumn('status', function($log) {
            return view('dashboard::datatable_actions.status', compact('log'));
        });
        $dataTable->addColumn('agent_first_name', function($log) {
            return $log->agent->first_name;
        });

        $dataTable->addColumn('agent_last_name', function($log) {
            return $log->agent->last_name;
        });

        return $dataTable
            ->escapeColumns([])
            ->make(true);
    }


}
