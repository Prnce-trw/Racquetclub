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
                                    <a class="btn btn-primary btn-sm" href="{!! url('createteacher') !!}">
                                        <i class="fa fa-group">
                                        </i>
                                        Create Teacher
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
                                                Teacher Name - Surname
                                            </th>
                                            <th>
                                                Nick-Name
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
                                                Internet Explorer 5.0
                                            </td>
                                            <td>
                                                Win 7
                                            </td>
                                           
                                            <td>


                                                <i class="fa fa-2x fa-bitbucket"></i>
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
                                                <i class="fa fa-2x fa-bitbucket"></i>
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
