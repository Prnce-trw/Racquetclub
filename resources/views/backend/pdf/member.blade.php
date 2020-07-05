<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
        body {
         font-family: "THSarabunNew";
         /* font-size: 16px; */
        }
        table {
            /* border: 1px solid black; */
            width: 100%;
        }
        td {
            border: 1px solid black;
        }
        .border {
            border: 1px solid black;
        }
        .text-mid {
            vertical-align: middle;
        }
        .text-right {
            text-align: right;
        }
        .text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .col-50 {
            width: 50%;
        }
        .col-40 {
            width: 40%;
        }
        .col-30 {
            width: 30%;
        }
        .col-20 {
            width: 20%;
        }
        .col-10 {
            width: 10%;
        }
        @page {
              size: A4;
              padding: 15px;
            }
            /* @media print {
              html, body {
                width: 210mm;
                height: 297mm;
                font-size : 16px;
              }
            } */
        </style>
</head>
<body>
    <table>
        <tr>
            <th rowspan="2" class="text-left col-50">
                <img src="{{asset('storage/picture/rqsport.png')}}" alt="" width="100px">
            </th>
            <th class="col-20"></th>
            <th class="text-right col-30">APPLICATION FORM</th>
        </tr>
        <tr>
            <th>New Member: </th>
            <th>Renewal Member ID:</th>
        </tr>
    </table>
    <table>
        <tr>
            <td class="col-10 text-left">First Name</td>
            <td class="col-40"></td>
            <td class="col-10">Nationality</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td class="col-10 text-left">Last Name</td>
            <td class="col-40"></td>
            <td class="col-10">Date of Birth</td>
            <td class="col-20"></td>
            <td class="col-10">Gender</td>
            <td class="col-10"></td>
        </tr>
        <tr>
            <td rowspan="2">Address</td>
            <td rowspan="2"></td>
            <td>Telephone</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td>Emergency Telephone</td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td class="col-10 text-left">Occupation</td>
            <td class="col-40"></td>
            <td class="col-10">Emergency Contact name</td>
            <td colspan="3"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>