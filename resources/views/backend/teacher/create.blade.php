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
                                                    Teacher Personal Information
                                                </h4>
                                            </div>
                                            <div class="panel-body panel-form">
                                                <form action="{{ url('/teacher/create/') }}" method="post"
                                                    class="form-horizontal form-bordered" data-parsley-validate="true"
                                                    name="demo-form">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                                                            First Name:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <input class="form-control" data-parsley-required="true"
                                                                id="fullname" name="Teachername" placeholder="Required"
                                                                type="text" />
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Last name:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">

                                                            <input class="form-control" data-parsley-required="true"
                                                                id="surename" name="surename" placeholder="Required"
                                                                type="text" />
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Nickname:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">

                                                            <input class="form-control" data-parsley-required="true"
                                                                id="nickname" name="nickname" placeholder="Required"
                                                                type="text" />
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4">
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <button class="btn btn-primary" type="submit">
                                                                Submit
                                                            </button>
                                                            <button class="btn pmd-btn-raised btn-default"
                                                                onclick="closeModal('createUser');" type="button">
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
