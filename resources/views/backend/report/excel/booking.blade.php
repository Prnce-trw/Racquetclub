<div class="panel">
   <div class="panel-body">
    <div class="table-responsive">
        <div class="form-group">
            <div class="col-md-14"> 
                <a class="btn btn-primary btn-sm" href="{{url('exportbooking')}}">
                    <i class="fa fa-group">
                    </i>
                    Export
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="data-table">
                <thead>
                    <tr>
                        <th>
                            No.
                        </th>
                        <th>
                            Code.
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Employee
                        </th>
                        <th>
                            Note
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {!!$html!!}
               </tbody>
           </table>
       </div>
   </div>
   <!-- end panel -->
</div>
   <!-- end col-12 -->
</div>