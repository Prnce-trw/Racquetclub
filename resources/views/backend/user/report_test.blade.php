
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Racquetclub</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
Racquetclub<br>
<hr>

<table border="1" align="center" width="700" height="500">
    <tr>
        <td><img src="storage/picture/news02.jpg"></td>
           <td>PROFILE Member ID :{{$member->member_num}}</td>
  
    <tr>

<td align="center"> <label>Member ID</label>:{{$member->member_num}}</center> </td>
<td align="center"><label>Member  Card</label>:{{$member->mastercard}}</center></td>
<tr>
<td align="center"> <label>Register Date</label>:{{$member->registerdate}}</center> </td>
<td align="center"><label>Member Group</label>:{{$member->membergroup}}</center></td>
<tr>
<td align="center"><label>Name</label>:{{$member->name}}</td>
<td align="center"><label>Surname</label>:{{$member->surname}}</center></td>
<tr>
<td align="center"><label>START PACKAGE</label>:{{$member->startdate}}</center></td>
<td align="center"><label>END PACKAGE</label>:{{$member->enddate}}</center></td>
<tr>
    <td align="center"><label> TEL.</label>:{{$member->tel}}</center></td>
<td align="center"><label>E-mail</label>:{{$member->email}}</center></td>
<tr>
<td align="center"><label>BIRTH DAY</label>:{{$member->birthday}}</center></td>
<td align="center"><label>GENDER</label>:{{$member->gender}}</center></td>
<tr>
<td align="center"><label>GROUPS</label>:{{$member->groups}}</center></td>
<td align="center"><label> Package</label>:{{$member->package}}</center></td>
<tr>

    <td align="center"><label> Address</label>:{{$member->address}}</center></td>
<td align="center"><label>Country</label>:{{$member->country}}</center></td>
<tr>

     <td align="center"><label>
                                                Web site
                                            </label>:{{$member->website}}</center></td>
<td align="center"></td>
<tr>
</table>
</body>
</html>