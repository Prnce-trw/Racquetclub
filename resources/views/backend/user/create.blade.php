@extends('layout.template')

@section('css')
@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="col-md-14">
                                    <!-- begin row -->
                                    <div class="row">
                                        <!-- begin col-6 -->
                                        <div class="col-md-6">
                                            <!-- begin panel -->
                                            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                                                <h4 class="panel-title">
                                                    เพิ่มแพ็คเกจ
                                                </h4>
                                            </div>
                                            <div class="panel-body panel-form">
    <form class="form-horizontal form-bordered" action="{{ url('/managepackage/create/') }}" method="post" data-parsley-validate="true" method="post" enctype="multipart/form-data">
        @csrf
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                                                            ชื่อแพ็คเกจ:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true" id="package_name" name="package_name" placeholder="Required" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            ราคา:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true" id="fullname" name="package_price" placeholder="Required" type="number"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            จำนวนวัน:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true" id="fullname" name="package_numday" placeholder="Required" type="number"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            มากกว่า:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control border-input" name="less" type="text" value="">
                                                            </input>
                                                        </div>
                                                    </div>
                                                  <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            น้อยกว่า:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                                <input class="form-control border-input" name="more" type="text" value="">
                                                                </input>
                                                            </div>
                                                        </div>


                                                         <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                           เท่ากับ:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                                <input class="form-control border-input" name="astext" type="text" value="">
                                                                </input>
                                                            </div>
                                                        </div>
<div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            หมายเหตุ:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                                <input class="form-control border-input" name="astext" type="text" value="">
                                                                </input>
                                                            </div>
                                                        </div>






                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 col-sm-4">
                                                            </label>
                                                            <div class="col-md-6 col-sm-6">
                                                                <button class="btn btn-primary" type="submit">
                                                                    Submit
                                                                </button>
                                                                <button class="btn pmd-btn-raised btn-default" onclick="closeModal('createUser');" type="button">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end panel -->
                                    </div>
                                    <!-- end col-6 -->
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- end panel -->
<!-- end col-12 -->
<!-- end row -->
<!-- end #content -->
@stop


@section('js')
@stop
