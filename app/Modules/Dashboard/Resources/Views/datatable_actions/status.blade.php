@if($log->status == 'newly logged')
    <i class="fa fa-circle text-info"></i><span style="color:skyblue">{{$log->status}}</span>
@elseif( $log->status == 'in progress')
    <i class="fa fa-circle text-success"></i> <span style="color:greenyellow">{{$log->status}}</span>
@else
    <i class="fa fa-circle text-danger"></i> <span style="color:red">{{$log->status}}</span>
@endif