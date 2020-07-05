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
        <form class="form-horizontal form-bordered" name="demo-form" id="form-admin" action="{{url('/manage-sport',$sport->id_sport)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Edit Sport</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_admin" name="id_admin" value="{{ ($sport != null)?$sport->id_sport:'' }}">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="firstname">
                            Sport Name :
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true"  id="firstname" name="firstname" placeholder="First Name" type="text" required value="{{ ($sport != null)?$sport->name_sport:'' }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="note">
                            *หมายเหตุ :
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <textarea class="form-control" placeholder="หมายเหตุ" name="note" id="note" rows="4">{{ ($sport != null)?$sport->note_sport:'' }}</textarea>
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