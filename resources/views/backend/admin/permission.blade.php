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
                                    <a class="btn btn-primary btn-sm" href="{!! url('setpermission') !!}">
                                        <i class="fa fa-2x fa-key">
                                        </i>
                                        Permission User
                                    </a>
                                </div>
                            </div>
                        </td>
                        <div class="panel-title">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                No.
                                            </th>
                                            <th>
                                                Username
                                            </th>
                                            <th>
                                                Name Surname
                                            </th>
                                            <th>
                                                Permision
                                            </th>
                                            <th>
                                                Remove
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>
                                                Trident
                                            </td>
                                            <td>
                                                Internet Explorer 4.0
                                            </td>
                                            <td>
                                                Win 95+
                                            </td>
                                            <td>
                                                4
                                            </td>
                                            <td>
  
  <form action="" method="post" enctype="multipart/form-data">

                                               {!! csrf_field() !!}
 <input type="hidden"  name="id" value="">
     <button type="submit" class="btn btn-danger">ลบ</button>
 </form>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>
                                                Trident
                                            </td>
                                            <td>
                                                Internet Explorer 5.0
                                            </td>
                                            <td>
                                                Win 95+
                                            </td>
                                            <td>
                                                5
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">

                                               {!! csrf_field() !!}
 <input type="hidden"  name="id" value="">
     <button type="submit" class="btn btn-danger">ลบ</button>
 </form>
                                            </td>
                                        </tr>
                                        
                                        
                                       









                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->
<!-- end #content -->
@stop


@section('js')
@stop
