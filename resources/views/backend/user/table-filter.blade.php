<table class="table table-bordered" id="table-filter">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Last name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Package</th>
        <th>Register Date</th>
        <th>START PACKAGE</th>
        <th>END PACKAGE</th>
        <th>Note discount</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr class="odd gradeX">
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">
                    {{ $member->memberID }}
                </a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->name }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->surname }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->tel }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->email }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ ($member->gender == 1)?'MALE':'FEMALE' }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->package_name }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->registerdate }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->start }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->end }}</a>
            </td>
            <td>
                <a href="{!! url('manage-user/'.$member->memberID) !!}">{{ $member->discount_note }}</a>
            </td>
            <td>
                <button class="btn btn-primary m-r-5 m-b-5" type="button" onclick="upgrade({{ $member->memberID }})">
                    Upgrade
                </button>

                <button class="btn btn-success m-r-5 m-b-5" type="button" onclick="renewal({{ $member->memberID }})">
                    Renewal
                </button>

                <button class="btn btn-danger m-r-5 m-b-5" type="button" onclick="hold({{ $member->memberID }})">
                    Hold
                </button>
                <button class="btn m-r-5 m-b-5 btn-green" type="button" onclick="card({{ $member->memberID }})">
                    Card
                </button>
                <a class="btn btn-warning btn-sm" href="{!! url('manage-user/'.$member->memberID) !!}">
                    <i class="fa fa-group">
                    </i>
                    ADD GROUPS
                </a>
                <a class="btn btn-white btn-sm" href="{!! url('manage-user-pdf/'.$member->memberID) !!}" target="blank">
                    <i class="fa fa-file">
                    </i>
                    Print
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $('#table-filter').DataTable();
</script>
