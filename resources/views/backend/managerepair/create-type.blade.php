<style type="text/css">
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }
</style>
<div class="modal fade in" id="modal-created" style="display: block;" tabindex="-1">
    <div class="modal-dialog">
        <form class="form-horizontal form-bordered" name="demo-form" id="form-admin" action="{{ url('managerepair') }}"
              method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Manage repair</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_admin" name="id_admin">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-4">
                            type :
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true" id="type" name="type"
                                   placeholder="Enter" type="text" required>

                        </div>
                        <div class="col-md-2 col-sm-4">
                            <button type="button" id="add" class="btn btn-danger btn-sm">add+</button>
                        </div>
                    </div>
                    <div class="form-group  " id="divadd"></div>


                    {{--                    <div class="form-group">--}}
                    {{--                        <label class="control-label col-md-4 col-sm-4">--}}
                    {{--                            building :--}}
                    {{--                        </label>--}}
                    {{--                        <div class="col-md-6 col-sm-6">--}}
                    {{--                            <input class="form-control" data-parsley-required="true" id="building" name="building"--}}
                    {{--                                   placeholder="First Name" type="text" required>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group">--}}
                    {{--                        <label class="control-label col-md-4 col-sm-4">--}}
                    {{--                            floor :--}}
                    {{--                        </label>--}}
                    {{--                        <div class="col-md-6 col-sm-6">--}}
                    {{--                            <input class="form-control" data-parsley-required="true" id="floor" name="floor"--}}
                    {{--                                   placeholder="First Name" type="text" required>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group">--}}
                    {{--                        <label class="control-label col-md-4 col-sm-4">--}}
                    {{--                            group :--}}
                    {{--                        </label>--}}
                    {{--                        <div class="col-md-6 col-sm-6">--}}
                    {{--                            <input class="form-control" data-parsley-required="true" id="group" name="group"--}}
                    {{--                                   placeholder="First Name" type="text" required>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-sm btn-inverse" data-dismiss="modal">Close</a>
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        var i = 0;
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#txtP' + button_id + '').remove();

        });
        $('#add').click(function () {
            i++;
            $('#divadd').append('' +
                '<div id="txtP' + i + '" class="form-group row">' +
                '<label class="control-label col-md-2 col-sm-4">type</label>' +
                '<div class="col-sm-6">' +
                '<input type="text" class="form-control" name="inputunit[]"placeholder="Enter" required>' +
                '</div>' +
                '<div class="col-md-2 col-sm-4" ><button type="button"  id="' + i + '" class="btn btn-danger btn_remove ">remove</button></div>' +
                '</div>');

        });
    });
</script>
