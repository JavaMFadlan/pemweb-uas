
@extends('layouts.app')

@section('content')
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-hover">
                    <tr>
                        <th>action</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th>
                        <th>Penyakit Khusus</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection

<!-- Page specific script -->
@include('pasien.create')

@section('script')
    <script>
        let _url = {
            create: `{{ route('pasien.create') }}`,
            edit: `{{ route('pasien.edit',':id') }}`,
            show: `{{ route('pasien.show',':id') }}`,
            destroy: `{{ route('pasien.destroy',':id') }}`,
        }



        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            responsive: true,
            autoWidth:false,
            orderCellsTop: true,
            searching: true,
            pagingType: "simple",
            dom: 'Bfrtip',
            columnDefs: [
                    { targets: 0, visible: false } // Hide the "action" column
                ],
            buttons: [
                {
                    text: 'Create',
                    action: function (e, dt, button, config) {
                        $('#create').modal('show');
                    }

                },
                {
                    text: 'Print',
                    extend: 'pdf', // Use the print button extension
                    autoPrint: false,
                    exportOptions: {
                        columns: [ 1, 2, 3, 4, 5, 6]
                    }

                }
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{ route('pasien.datatables') }}`,
                type: 'POST',
            },
            columns: [
                { data: 'action'},
                { data: 'nama', name: 'nama', title: 'Nama' },
                { data: 'tgl_lahir', name: 'tgl_lahir', title: 'Tanggal Lahir' },
                { data: 'gender', name: 'gender', title: 'Gender' },
                { data: 'penyakit_khusus', name: 'penyakit_khusus', title: 'Penyakit Khusus' },
                { data: 'berat_badan', name: 'berat_badan', title: 'Berat Badan' },
                { data: 'tinggi_badan', name: 'tinggi_badan', title: 'Tinggi Badan' },

            ],

        }).draw();


        function update(id){
            window.location.href = _url.edit.replace(':id', id);

        }

    </script>
@endsection
</body>
</html>
