<html>
<head></head>
<body>
Good Day <br><br>
The Ticket Number: <strong>{{$reference}}</strong> that you have send
is been processed click the link to see the status query <a href=http://www.{{env('APP_URL')}}:8399/user-log">View Your Status</a> <br>
<h4>Please See Support Agent Details</h4>
<br>
First Name: {{$agent_first_name}}<br>
Last Name: {{$agent_last_name}}<br>
<h4>Please Geo Location </h4>
Address: {{$address}}<br>
Latitude: {{$lat}}<br>
Longitude: {{$long}}<br>
<hr>
Start date: {{$start_date}} - End Date {{$end_date}}<br>
Priority: High<br>
Status: {{$status}}

</body>
</html>