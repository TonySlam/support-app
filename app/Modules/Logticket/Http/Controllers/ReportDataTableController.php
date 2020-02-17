<?php

namespace App\Modules\Logticket\Http\Controllers;

use App\Modules\Logticket\Models\LogActivity;
use App\Modules\Logticket\Models\Support;
use DataTables;

use App\Http\Controllers\Controller;


class ReportDataTableController extends Controller
{

    protected $support;

    protected $logs;

    public function __construct(Support $support, LogActivity $logs)
    {
        $this->support = $support;

        $this->logs = $logs;
    }
    public function viewedByAgent($id){

        $ticket = $this->support->find($id);

        $report_log = $this->logs->where('support_id',$ticket->id)->get();

        $dataTable = DataTables::of($report_log)->addColumn('agent_first_name', function($log) {
            return $log->agent->first_name ;
        });

        $dataTable->addColumn('agent_last_name', function($log) {
            return $log->agent->last_name;
        });

        return $dataTable
            ->escapeColumns([])
            ->make(true);
    }
}
