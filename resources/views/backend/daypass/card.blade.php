@extends('layout.template')
@section('css')

@endsection
@section('body')
<div class="modal fade in" id="modal-teacher">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="title-h4">Card</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('manage-card') }}" method="post" id="form-teacher">
                    @csrf
                    <div class="row" id="div-appen">
                        <div class="form-group col-md-12">
                            <label class="control-label col-md-4" for="fullname">
                                *RFID Number:
                            </label>
                            <div class="col-md-8">
                                <input class="form-control input-id" id="fullname" name="name[]"
                                placeholder="Required" type="text" data-id="0" required/>
                                <span id="namespan0">
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm pull-left" type="button" id="btnAdd">+</button>
                <button class="btn btn-warning btn-sm pull-left" type="button" id="btn_remove">-</button>
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
        <h2 class="panel-title">Card</h2>
    </div>
    <div class="panel-body">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-teacher">Card</button>
        <div class="form-group col-md-12">
            <h2>Date. {{ date('d/m/Y') }}</h2>
            <div class="table-responsive" id="divTable">
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <th>NO.</th>
                        <th>RFID</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Time in</th>
                    </thead>
                    <tbody>
                        @foreach($cards as $key => $card)
                        @php
                        $member = memberDaypass($card->id_card);
                        @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $card->id_card }}</td>
                            @if(isset($member))
                            <td>
                                ไม่ว่าง
                            </td>
                            <td>
                                {{ $member->daypass_fname }}
                            </td>
                            <td>{{ $member->daypass_lname }}</td>
                            <td>{{ $member->daypass_phone }}</td>
                            <td>{{ $member->created_at->format('H:i') }}</td>
                            @else
                            <td>
                                ว่าง
                            </td>
                            <td>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            @endif

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
    $(document).ready(function() {
        var i=0;
        $(document).on('click', '#btn_remove', function() {
            $('#divCardID'+i).remove();
            i--;   
        });
        $(document).on('click', '#btnAdd', function() {
            i++;
            $('#div-appen').append('<div class="form-group col-md-12" id="divCardID'+i+'">'+
                '<label class="control-label col-md-4" for="fullname'+i+'">'+
                '*RFID Number:'+
                '</label>'+
                '<div class="col-md-8">'+
                '<input data-id="'+i+'" class="form-control input-id" data-parsley-required="true" id="fullname'+i+'" name="name[]"'+
                'placeholder="Required" type="text" required/>'+
                '<span id="namespan'+i+'"></span>'+
                '</div>'+
                '</div>');
        });
    });
    function check (id,type,index) {
        $.ajax({
            url: '{{ url('check-rfid') }}'+'/'+id+'/'+type,
            type: 'GET',
            data: {id: id},
        })
        .done(function(data) {
            $('#namespan'+index).css('color','green')
            $('#namespan'+index).html('Can use id')
        })
        .fail(function(data) {

            $('#namespan'+index).css('color','red')
            $('#namespan'+index).html("Can't use this id !")

        })
    }
    $(document).on('keyup', '.input-id', function() {
        var id = $(this).val();
        var index = $(this).attr('data-id');
        check(id,'id_card',index)
    });
</script>
@endsection
