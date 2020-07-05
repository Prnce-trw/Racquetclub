@extends('layout.template')
@section('css')

@stop

@section('body')
<div class="panel">
    <div class="panel-heading">
        <div class="table-responsive">
            <div class="form-group">
                <div class="row">
                    <form id="report-user-filter" method="POST">
                        <div class="col-md-2">
                            Age
                            <div class="input-group input-daterange">
                                <input type="number" class="form-control" name="ageStart">
                                <span class="input-group-addon">to</span>
                                <input type="number" class="form-control" name="ageEnd">
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <button type="button" onclick="filteruser()" form="report-user-filter" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div class="col-md-14">
                    <a class="btn btn-primary btn-sm" href="{{url('exportmember')}}">
                        <i class="fa fa-group">
                        </i>
                        Export
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="divtable">
                    <thead>
                        <tr>
                            <th>
                                Id.
                            </th>
                            <th>
                                Register At
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Birthdat
                            </th>
                            <th>
                                Gender
                            </th>
                            <th>
                                Management
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                   </tbody>
               </table>
           </div>
       </div>
       <!-- end panel -->
   </div>
   <!-- end col-12 -->
</div>
@stop

@section('js')
<script>
    function filteruser()
    {
        var dataFilter = $('#report-user-filter').serialize();
        $.ajax({
            url: '{{ url('filter-user') }}',
            type: 'GET',
            data: dataFilter,
        }).done(function (data) {
            $('#divtable').html(data);
        });
    }
</script>
@stop
