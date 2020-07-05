@extends('layout.template')
@section('css')

@endsection
@section('body')
<div class="modal fade in" id="modal-teacher">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="title-h4">Daypass</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('daypass') }}" method="post" id="form-teacher">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-2" for="fullname">
                                *First Name:
                            </label>
                            <div class="col-md-4">
                                <input class="form-control" data-parsley-required="true" id="fullname" name="name"
                                placeholder="Required" type="text" required/>
                            </div>
                            <label class="control-label col-md-2 col-sm-2" for="email">
                                *Last name:
                            </label>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control" data-parsley-required="true" id="surename" name="surename"
                                placeholder="Required" type="text" required/>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">*Phone NO.</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Required" required name="phone">
                            </div>
                            <label class="col-md-2 control-label">*CARD ID.</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Required" required name="card">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-md-1 control-label">Age</label>
                            <div class="col-md-2 col-sm-2">
                                <input type="number" class="form-control" name="age" min="1">
                            </div>
                            <label class="col-md-1 control-label">Gender</label>
                            <div class="col-md-2">
                                <select class="default-select2 form-control" name="gender" placeholder="Select Package" required>
                                    <option value="">
                                        ---SELECT---
                                    </option>
                                    <option value="1">
                                        MALE
                                    </option>
                                    <option value="2">
                                        FEMAL
                                    </option>
                                </select>
                            </div>
                            <label class="col-md-2 control-label">*Receipt ID.</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Required" name="receipt">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><h5>Primary sports</h5></label>
                            <div class="form-group col-md-10">
                                @foreach($sports as $sport)
                                <div class="col-md-3">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="{{ $sport->id_sport }}" name="chSport[]">
                                        {{ $sport->name_sport }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Note</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="5" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm pull-left" type="button" onclick="" id="btn-teacher-block">Block</button>
                <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
                <button class="btn btn-sm btn-primary" type="submit" form="form-teacher">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-inverse">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h2 class="panel-title">Daypass</h2>
    </div>
    <div class="panel-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-teacher">Daypass</button>
        <div class="form-group col-md-12">
            <h2>Date. {{ date('d/m/Y') }}</h2>
            <div class="table-responsive" id="divTable">
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Receipt</th>
                        <th>Card</th>
                        <th>Note</th>
                        <th>Time in</th>
                        <th>Time out</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($daypass as $key => $pass)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $pass->daypass_fname }}</td>
                            <td>{{ $pass->daypass_lname }}</td>
                            <td>{{ $pass->daypass_phone }}</td>
                            <td>{{ $pass->daypass_age }}</td>
                            <td>{{ ($pass->daypass_genger=='2')?'FEMAL':'MALE' }}</td>
                            <td>{{ $pass->daypass_receipt }}</td>
                            <td>{{ $pass->card_id }}</td>
                            <td>{{ $pass->daypass_note }}</td>
                            <td>{{ $pass->created_at->format('H:i') }}</td>
                            <td>{{ ($pass->return_card=='1')? $pass->updated_at->format('H:i') : '' }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" {!!($pass->return_card=='1')? 'disabled':'' !!} onclick="returnCard({{ $pass->id_daypass }})">
                                    Return card
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<form id="form-sweet" action="" method="post">
    @csrf
</form>
@endsection
@section('js')
<script type="text/javascript">
    function returnCard(id) {

        var urlaction =  '{{url('return-card')}}'+'/'+id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คืนบัตร",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
                // alert(result.value);
                if (result.value) {
                    $( "#form-sweet" ).attr('action',urlaction);
                    $( "#form-sweet" ).submit();

                } else if (result.dismiss === Swal.DismissReason.cancel)
                {
                    swalWithBootstrapButtons.fire(
                        'ยกเลิก',
                        'ยกเลิกการคืน',
                        'error'
                        )
                }
            })

    }
</script>
@endsection
