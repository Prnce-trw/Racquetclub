<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<style type="text/css">
		@font-face {
			font-family: 'THSarabunNew';
			font-style: normal;
			font-weight: normal;
			src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
		}
		@font-face {
			font-family: 'THSarabunNew';
			font-style: normal;
			font-weight: bold;
			src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
		}
		@font-face {
			font-family: 'THSarabunNew';
			font-style: italic;
			font-weight: normal;
			src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
		}
		@font-face {
			font-family: 'THSarabunNew';
			font-style: italic;
			font-weight: bold;
			src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
		}

		body {
			font-family: "THSarabunNew";
		}
		.h1app{
			float: right;
		}
		.img-logo{
			width: 130px;
			height: 50px;
			float: left;
		}
		div {
			margin: 0;
		}
		.border-black{
			border: 1 solid;
			border-color: #000;
			width: 100%;
		}
		.row:after{
			content: "";
			display: table;
			clear: both;
		}
		.grid-container {
			display: grid;
			grid-template-columns: auto auto auto auto;
			grid-gap: 10px;
		}
		.item1 {
			grid-column: 1 / span 5;
		}
		.get-inline{display:inline-block;vertical-align: middle;} 

		.tg  {border-collapse:collapse;border-spacing:0;}
		.tg td{font-family:THSarabunNew,font-size:11px;border-style:solid;border-width:1px;word-break:normal;border-color:black;overflow:hidden;}
		.tg th{font-family:THSarabunNew,font-size:11px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
		.tg .tg-ps66{font-size:15px;text-align:left;vertical-align:middle;}
		.tg .tg-p1nr{font-size:15px;border-color:inherit;text-align:left;vertical-align:middle;}
		.tg .tg-151s{font-size:15px;font-family:THSarabunNew;border-color:inherit;vertical-align:middle;}
	</style>
</head>
<body>
	<img class="img-logo" src="{{ asset('images/rqsport.png') }}">
	<div>
		<h2 class="h1app" style="margin: 0;">APPLICATION FORM</h2>	
	</div><br>
	<div>
		<h3 class="h1app" style="margin: 0;padding-top: 5px;">Member ID...1...</h3>
	</div><br><br>
	<div>
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
				<col style="width: 30px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 34px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 20px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 54px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 26px">
				<col style="width: 30px">
				<col style="width: 30px">
				<col style="width: 32px">
				<col style="width: 32px">
				<col style="width: 30px">
				<col style="width: 30px">
			</colgroup>
			<tr>
				<th class="tg-p1nr" colspan="4">First name</th>
				<th class="tg-p1nr" colspan="10"></th>
				<th class="tg-p1nr" colspan="5">Nationality</th>
				<th class="tg-ps66" colspan="15"></th>
			</tr>
			<tr>
				<td class="tg-p1nr" colspan="4">Last Name</td>
				<td class="tg-p1nr" colspan="10"></td>
				<td class="tg-p1nr" colspan="5">Date of Birth</td>
				<td class="tg-ps66" colspan="5"></td>
				<td class="tg-p1nr" colspan="10">
					<div style="height: 15px;">
						<label class="get-inline" style="vertical-align: middle;">Gender 
							<input style="padding-left: 20px;" type="checkbox" id="check_gdpr" class="get-inline" checked> M 
							<input style="padding-left: 20px;" type="checkbox" id="check_gdpr" class="get-inline" checked> F 
						</label>
					</div>
				</td>
			</tr>
			<tr>
				<td class="tg-p1nr" colspan="4" rowspan="2">Address</td>
				<td class="tg-p1nr" colspan="10"></td>
				<td class="tg-p1nr" colspan="10">Telephone</td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
			</tr>
			<tr>
				<td class="tg-p1nr" colspan="10"></td>
				<td class="tg-p1nr" colspan="10">Emergency Telephone</td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
				<td class="tg-p1nr"></td>
			</tr>
			<tr>
				<td class="tg-p1nr" colspan="5">Occupation</td>
				<td class="tg-p1nr" colspan="9"></td>
				<td class="tg-p1nr" colspan="10">Emergency Contact name</td>
				<td class="tg-p1nr" colspan="10"></td>
			</tr>
			<tr>
				<td class="tg-p1nr" colspan="5">E-mail address</td>
				<td class="tg-p1nr" colspan="29"></td>
			</tr>
		</table>
	</div>
	<div style="padding-top: 5px;">
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
				<col style="width: 213px">
				<col style="width: 213px">
				<col style="width: 862px">
			</colgroup>
			<tr>
				<th class="tg-p1nr">How would you like us to contact you?</th>
				<th class="tg-ps66"colspan="2">
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Phone
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Email
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						SMS
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						OTHER________________________
					</label>
				</th>
			</tr>
			<tr>
				<td class="tg-p1nr">How did you hear about us?</td>
				<td class="tg-ps66"colspan="2">
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Internet
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Facebook
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Youtubes
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;padding-right: 10px;">
						Friend____________
					</label>
					<input type="checkbox" id="check_gdpr" class="get-inline" checked>
					<label class="get-inline" style="vertical-align: middle;">
						OTHER_____________
					</label>
				</td>
			</tr>
			<tr>
				<td class="tg-p1nr">Primary  Sports Rate  from (1-5)</td>
				<td class="tg-ps66"colspan="2">
					<div>
						@foreach($sports as $key => $sport)
						<div class="get-inline" style="width: 20%;">
							<input type="checkbox" id="check_gdpr" class="get-inline" checked>
							<label class="get-inline">
								{{ $sport->name_sport }}
							</label>
						</div>
						@endforeach	
					</div>
				</td>
			</tr>
			<tr>
				<td class="tg-p1nr">Your training goals</td>
				<td class="tg-ps66"colspan="2"></td>
			</tr>
		</table>
	</div>
	<div>
		<h4 class="h1app" style="margin: 0;padding-top: 0;padding-bottom: -10px;">______________________________________</h4>
		<h4 style="margin: 0;padding-left: 550px;" >Signature</h4>
	</div>
	<div><hr style="border-top: 3px dashed;border-bottom:0;padding-bottom: -5px;"></div>
	<div>
		<h3 style="margin: 0;padding-bottom: -2px;"><u>Office Use Only</u></h3>
	</div>
	<div>
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
				<col style="width: 154px">
				<col style="width: 153px">
				<col style="width: 150px">
				<col style="width: 150px">
				<col style="width: 152px">
				<col style="width: 150px">
			</colgroup>
			<tr>
				<th class="tg-p1nr" colspan="3">
					<div class="get-inline" style="width: 20%;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
					<div class="get-inline" style="width: 20%;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
					<div class="get-inline" style="width: 20%;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div>
				</th>
				<th class="tg-0lax" colspan="2"></th>
				<th class="tg-0lax"></th>
			</tr>
		</table>
	</div>
	<div>
		<h4 style="margin: 0;">User type________________</h4>
	</div>
	<div>
		<table class="tg" style="undefined;table-layout: fixed; width: 100%">
			<colgroup>
				<col style="width: 50px">
				<col style="width: 46px">
				<col style="width: 46px">
				<col style="width: 37px">
				<col style="width: 46px">
				<col style="width: 34px">
				<col style="width: 25px">
				<col style="width: 34px">
				<col style="width: 34px">
				<col style="width: 57px">
				<col style="width: 20px">
				<col style="width: 25px">
				<col style="width: 25px">
				<col style="width: 25px">
				<col style="width: 25px">
				<col style="width: 25px">
				<col style="width: 90px">
			</colgroup>
			<tr>
				<th class="tg-151s">No.</th>
				<th class="tg-151s" colspan="2">Member ID</th>
				<th class="tg-151s" colspan="4">Name</th>
				<th class="tg-151s" colspan="2">money</th>
				<th class="tg-151s" colspan="2">discount</th>
				<th class="tg-151s" colspan="2">total</th>
			</tr>
			<tr>
				<td class="tg-151s">1</td>
				<td class="tg-151s" colspan="2"></td>
				<td class="tg-151s" colspan="4"></td>
				<td class="tg-151s" colspan="2"></td>
				<td class="tg-151s" colspan="2"></td>
				<td class="tg-151s" colspan="2"></td>
			</tr>
			<tr>
				<td class="tg-151s" colspan="7">รวม</td>
				<td class="tg-151s" colspan="2"></td>
				<td class="tg-151s" colspan="2"></td>
				<td class="tg-151s" colspan="2"></td>
			</tr>
			<tr>
				<td class="tg-151s" colspan="17">asd</td>
			</tr>
			<tr>
				<td class="tg-151s" colspan="17">asd</td>
			</tr>
			<tr>
				<td class="tg-151s" colspan="17">
					<div class="get-inline" style="margin: 0; width: 20%;padding-bottom: -5px;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
					<div class="get-inline" style="margin: 0; width: 20%;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div>
					<div class="get-inline" style="margin: 0; width: 20%;padding-bottom: -5px;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
					<div class="get-inline" style="margin: 0; width: 20%;padding-bottom: -5px;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
					<div class="get-inline" style="margin: 0; width: 20%;padding-bottom: -5px;">
						<input type="checkbox" id="check_gdpr" class="get-inline" checked>
						<label class="get-inline">
							{{ $sport->name_sport }}
						</label>
					</div><br>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
