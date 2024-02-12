@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive py-2">
            <table id="table" class="table align-items-center table-flush dt-wow" style="width: 100% !important;">
              <thead class="thead-light">
                <tr>
                    <th>action</th>
                    <th>nama awal</th>
                    <th>nama akhir</th>
                    <th>gender</th>
                    <th>email</th>
                    <th>tgl lahir</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        let _url = {
            create: `{{ route('pasien.create') }}`,
            edit: `{{ route('pasien.edit',':id') }}`,
            show: `{{ route('pasien.show',':id') }}`,
            delete: `{{ route('pasien.delete',':id') }}`,
        }

        $(() => {


            })

        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            responsive: true,
            orderCellsTop: true,
            searching: true,
            pagingType: "simple",
            dom: 'Bfrtip',
            buttons: [
                'colvis',
                'excel',
                'print'
            ],
            lengthMenu: [
                [10, 25, 50],
                [10, 25, 50, "All"]
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari...",
            },
            ajax: {
                url: 'https://dummyjson.com/users?select=firstName,lastName,gender,email,birthDate',
                type: 'GET',
                dataSrc: 'users',
                error: function(xhr, error, thrown) {
                    console.error('DataTables error:', error);
                    console.error('API response:', xhr.responseText);
                }
            },
            initComplete: function(settings, json) {
                table.page.info().recordsTotal = json.total ;
                table.page.info().recordsDisplay = json.total ;
                console.log(json.total);
                table.draw();
            },
            columns: [
                {
                    data: null, // Use null for the render function to have access to the full row data
                    render: function(data, type, row) {
                        return '<button class="btn btn-primary btn-sm" onclick="updateRecord(' + row.id + ')">Update</button>' +
                            '<button class="btn btn-danger btn-sm" onclick="deleteRecord(' + row.id + ')">Delete</button>';
                    }
                },
                { data: "firstName" },
                { data: "lastName" },
                { data: "gender" },
                { data: "email" },
                { data: "birthDate" },

            ],

        }).draw();

        function updateRecord(id) {
            Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
            });
        }
    </script>
@endsection
