<table class="table table-bordered" id="table-filter">
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
        @foreach ($resultUser as $item)
        <tr>
            <td>{{$item->memberID}}</td>
            <td>{{$item->registerdate}}</td>
            <td>{{$item->name}} {{$item->surname}}</td>
            <td>{{$item->tel}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->birthday}}</td>
            <td>{{$item->gender}}</td>
            <td></td>
        </tr>
        @endforeach
   </tbody>
</table>

<script type="text/javascript">
    $('#table-filter').DataTable();
</script>
