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
        <form class="form-horizontal form-bordered" action="{{url('/updatepackage',$package->id)}}" method="post" data-parsley-validate="true" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Insert Sport</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                            Name Package:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true"
                                id="package_name" name="package_name"
                                placeholder="Required" type="text"
                                value="{{ $package->package_name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Price Package:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true"
                                id="fullname" name="package_price"
                                placeholder="Required" type="number"
                                value="{{ $package->package_price }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Num day:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" data-parsley-required="true"
                                id="fullname" name="package_numday"
                                placeholder="Required" type="number"
                                value="{{ $package->package_numday }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Over:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control border-input" name="more"
                                type="text" value="{{ $package->more }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Less than:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control border-input" name="less"
                                type="text" value="{{ $package->less }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            NO.:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control border-input" name="astext"
                                type="text" value="{{ $package->astext }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">
                            Other:
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <textarea class="form-control border-input" name="other"
                                type="text" value="">{{ $package->other }}</textarea>
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