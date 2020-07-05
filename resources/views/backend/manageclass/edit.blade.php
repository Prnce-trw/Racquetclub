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
                                                 
                                                       <center><h3>Edit Class</h3></center>

                                                </h4>
                                            </div>
                                            <div class="panel-body panel-form">
  <form class="form-horizontal form-bordered" action="{{ url('/updateclass') }}" method="post" data-parsley-validate="true" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
           <input type="hidden" class="form-control" name="id" value="{{ $manageclass->id }}">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                                                            ID Class:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
             <input class="form-control" data-parsley-required="true" id="classID" name="classID" placeholder="Required" type="text" value="{{ $manageclass->classID }}" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Class name:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
            <input class="form-control" data-parsley-required="true" id="class_title" name="class_title" placeholder="Required" type="text" value="{{ $manageclass->class_title }}"/>
                                                        </div>
                                                    </div>
<div class="form-group">
<label class="control-label col-md-4 col-sm-4" for="email">
                                                            Hour:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
             <input class="form-control" data-parsley-required="true" id="fullname" name="hour" placeholder="Required" type="number" value="{{ $manageclass->hour }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Price:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true" id="fullname" name="price" type="number" value="{{ $manageclass->price }}"/>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                           Price/Hour:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
    <input class="form-control" data-parsley-required="true" id="fullname" name="price_hour" placeholder="Required" type="number" value="{{ $manageclass->price_hour}}"/>
                                                        </div>
                                                    </div>



<div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Other:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
<textarea class="form-control border-input" name="other" type="text" value="">{{ $manageclass->other }}
                                                </textarea>
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
