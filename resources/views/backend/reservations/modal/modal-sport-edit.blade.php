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
        <form class="form-horizontal form-bordered" action="{{url('/createsport',$allsport->as_id)}}" method="post"
            data-parsley-validate="true" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Sport</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Name:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true" id="package_name"
                                name="name" placeholder="Name..." value="{{$allsport->as_name}}" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                        	Note:                                   
                        </label>
                        <div class="col-md-6 col-sm-6">
							<textarea name="note" class="form-control" id="" cols="30" rows="10" placeholder="Note...">{{$allsport->as_note}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                        	<button type="button" onclick="AddCourseList()" class="btn btn-primary">เพิ่มรายการ</button>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            @foreach ($sport_cort as $item)
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" value="{{$item->cort_name}}" placeholder="Cort Name...">
                                </div>
                            </div>
                            @endforeach
                            <hr>
							<div id="CourseList"></div>
                        </div>
                        
                    </div>
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
    var list = 1;
    function AddCourseList() {
        $("#CourseList").append(
            '<div class="row" id="List_'+list+'">'+
                '<div class="row">'+
                    '<div class="col-lg-9">'+
                        '<input type="text" class="form-control" name="cortname[]" value="" placeholder="Cort Name...">'+
                    '</div>'+
                    '<div class="col-lg-3">'+
                        '<button type="button" class="btn btn-danger" onclick="delete_add('+list+')">x</button>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
    list++;
    }
    function delete_add(qq) {
        $("#List_"+qq).remove();
    }
</script>