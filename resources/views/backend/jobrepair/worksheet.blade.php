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
                               Repair : Assign Worksheet
                            </div>
                        </td>
                        <div class="panel-title">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                วันที่แจ้งซ่อม
                                            </th>
                                            <th>
                                                รหัสใบงาน:
                                            </th>
                                            <th>
                                                อาคาร/ชั้น
                                            </th>
                                            <th>
                                               ประเภท
                                            </th>
                                            <th>
                                                ข้อมูล
                                            </th>
                                            <th>
                                                พนักงานที่รับแจ้ง
                                            </th>

                                             <th>
                                                สถานะ
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
                                                X
                                            </td>

                                            <td>
                                                X
                                            </td>

                                            <td>
                                                X
                                            </td>
                                        </tr>
                                       
                                      <tr class="odd gradeX">
                                            <td>
                                                Trident
                                            </td>
                                            <td>
                                                Internet Explorer ถ
                                            </td>
                                            <td>
                                                Win 7                                            </td>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                                X
                                            </td>

                                            <td>
                                                X
                                            </td>

                                            <td>
                                                X
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
