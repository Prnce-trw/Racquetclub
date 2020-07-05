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
                                                    Set Permission
                                                </h4>
                                            </div>
                                            <div class="panel-body panel-form">
                                                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="fullname">
                                                            User:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <!--<select class="default-select3 form-control" placeholder="Select Package">
                                                <option value="ALL Status">
                                                 -Select User-
                                                </option>
                                                <option value="A">
                                                   A
                                                </option>
                                                <option value="B">
                                                    B
                                                </option>
                                            </select>-->
                                                            <select class="select-simple form-control pmd-select2 checkSelect" id="selectUserPermission" style="width:100%">
                                                                <option value="0">
                                                                    - Select User -
                                                                </option>
                                                                <option value="zdzLlE66WB">
                                                                    Thanayot.c : Thanayot Chantakot
                                                                </option>
                                                                <option value="vbTDQP8V1l">
                                                                    cs : cs ลูกค้าสัมพันธ์
                                                                </option>
                                                                <option value="XUrNS0OuUa">
                                                                    thanatpat : thanatpat jaroenphon
                                                                </option>
                                                                <option value="tE1ZFGxILw">
                                                                    Thuwachit : Thuwachit Meewong
                                                                </option>
                                                                <option value="8@RTDnW@YO">
                                                                    ทวี : ทวี พันธุจันทร์
                                                                </option>
                                                                <option value="OLrwOT@La8">
                                                                    chanunporn.b : chanunporn Bhumiratana
                                                                </option>
                                                                <option value="OnUV0e14EP">
                                                                    dada : yada tooyapalah
                                                                </option>
                                                                <option value="kUN6ts3KXV">
                                                                    jigkadee : jig jig
                                                                </option>
                                                                <option value="CObo5tNIKF">
                                                                    vee : ทวี พันธ์จันทร์
                                                                </option>
                                                                <option value="ORUwljinCg">
                                                                    toor : ธุวชิต มีวงษ์
                                                                </option>
                                                                <option value="TIqcbQhQX5">
                                                                    si : สมศรี ลีลา
                                                                </option>
                                                                <option value="bv2RVSRx@w">
                                                                    rak : อนุรักษ์ เจริญคูณ
                                                                </option>
                                                                <option value="yl8Vnm2cRO">
                                                                    one2 : อมตะ อมตะ
                                                                </option>
                                                                <option value="@4XU7@Na@9">
                                                                    mon : พิมล พันธ์จันทร์
                                                                </option>
                                                                <option value="7bTdWEJyGc">
                                                                    one1 : ชาตรี บุญขวัญ
                                                                </option>
                                                                <option value="fIxEAu8L7a">
                                                                    rqcheckin : เคาน์เตอร์ เช็คอิน
                                                                </option>
                                                                <option value="kcrGyAkcFM">
                                                                    gym : ฟิตเนส gym
                                                                </option>
                                                                <option value="VKaV5s3Wlk">
                                                                    pool : swimming pool
                                                                </option>
                                                                <option value="3R4cVBlzEP">
                                                                    Chonticha : Chonticha Sungsudyod
                                                                </option>
                                                                <option value="kYWrR3UQ6@">
                                                                    Krongploy : Krongploy Lekhapisit
                                                                </option>
                                                                <option value="9@6KQb4taO">
                                                                    Chantana  : Chantana  Siwakrissanaku
                                                                </option>
                                                                <option value="oXFItCBxmC">
                                                                    กัมพล : กันพล ไกรภพ
                                                                </option>
                                                                <option value="gctNQjFKZf">
                                                                    nexgen : nex gen
                                                                </option>
                                                                <option value="TSArvxQMHj">
                                                                    rqmtk : marketing RQ
                                                                </option>
                                                                <option value="1JStO2QOIU">
                                                                    ช่างนอก : ช่างนอก รวม
                                                                </option>
                                                                <option value="YCg6@bulUB">
                                                                    123456 : เคาน์เตอร์ เช็คอิน
                                                                </option>
                                                                <option value="o@IllCdyju">
                                                                    amena : amena sport
                                                                </option>
                                                                <option value="BMNwweP5qU">
                                                                    สมพร : สมพร ยงกุล
                                                                </option>
                                                                <option value="MSOcteKSQa">
                                                                    up : urban playground
                                                                </option>
                                                                <option value="xNx7JB23Jw">
                                                                    Apirat : Apirat Wongbandit
                                                                </option>
                                                                <option value="CRJpTfZk8p">
                                                                    preecha : preecha pudthong
                                                                </option>
                                                                <option value="5wy8RHZodw">
                                                                    Natnicha : Natnicha Bhumiratana
                                                                </option>
                                                                <option value="YaqAmKg92z">
                                                                    แม่บ้าน : อำพร
                                                                </option>
                                                                <option value="qgzB7I424n">
                                                                    rqtennis : เทนนิส567 เทนนิส567
                                                                </option>
                                                                <option value="B8Bky5be3Y">
                                                                    tao : tao -
                                                                </option>
                                                                <option value="9SDizdAtAK">
                                                                    หทัยฤทธิ์ : หทัยฤทธิ์ สอใบ
                                                                </option>
                                                                <option value="H8I6dMpfbH">
                                                                    สถาพร : สถาพร เชิงค้า
                                                                </option>
                                                                <option value="vFyGsfQdH@">
                                                                    amarit : amarit 123
                                                                </option>
                                                                <option value="rXkNrVOzTF">
                                                                    ridhisac : ridhisac Ecavidhayopas
                                                                </option>
                                                                <option value="@jsL03zIoQ">
                                                                    ส่วนงานโปรเจ็ค : ส่วนงานโปรเจ็ค -
                                                                </option>
                                                                <option value="29ma0u8epV">
                                                                    Manuchaet : Manuchaet Riphon
                                                                </option>
                                                                <option value="zsMtYgp10v">
                                                                    Phimsiri   : Phimsiri   Ekkasook
                                                                </option>
                                                                <option value="WGNw4dueVR">
                                                                    Sarawut : Sarawut Sunontanam
                                                                </option>
                                                                <option value="cghVIYCQew">
                                                                    Trisala : Trisala
                                                                </option>
                                                                <option value="oCkg@hxV4j">
                                                                    ananya.k : อนัญญา กาหลง
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-4 col-sm-4" for="email">
                                                            Permission:
                                                        </label>
                                                        <div class="col-md-6 col-sm-6">
                                                            <!--<select class="default-select3 form-control" placeholder="Select Package">
                                                <option value="ALL Status">
                                                 -Select Groups-
                                                </option>
                                                <option value="A">
                                                   A
                                                </option>
                                                <option value="B">
                                                    B
                                                </option>
                                            </select>-->
                                                            <select class="select-simple form-control pmd-select2 checkSelect" id="selectAddPermission" style="width:100%">
                                                                <option value="0">
                                                                    - Select Permission -
                                                                </option>
                                                                <option value="ReservationAdmin">
                                                                    Reservation Admin
                                                                </option>
                                                                <option value="CSAdminRepair">
                                                                    CS Admin : Repair
                                                                </option>
                                                                <option value="TECHAdminRepair">
                                                                    Technician Admin : Repair
                                                                </option>
                                                            </select>
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
