<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Penjualan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <div class="container-fluid navbar-dark bg-dark">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">Mini-project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/penjualan">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/itempenjualan">Item Penjualan</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <h2 class="mt-2 ">Daftar Penjualan</h2>
        <button class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#createModal">Tambah data</button>
        <div class="card">
            <div class="card-body">
                <table id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Nota</th>
                            <th>Tanggal</th>
                            <th>Kode Pelanggan</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Apa anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="button" class="btn btn-danger" id="confirmDelete">Ya</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="notificationModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Alert</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="status">status</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="createModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="create_penjualan" method="POST" autocomplete="off">
                <div class="mb-3">
                  <label for="id_nota" class="form-label">ID Nota</label>
                  <input type="text" class="form-control" id="id_nota" name="id_nota" required>
                </div>
                <div class="mb-3">
                  <label for="tgl" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" required>
                </div>
                <div class="mb-3"> 
                    <label for="kode_pelanggan" class="form-label">Kode Pelanggan</label>
                    {{-- <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" required> --}}
                    <select class="form-select" id="kode_pelanggan" name="kode_pelanggan">
                        @foreach ($id_pelanggan['data'] as $rows)
                            <option value="{{ $rows['id_pelanggan'] }}">{{ $rows['id_pelanggan'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="submitCreate">Submit</button>
            </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="editModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="edit_pelanggan" autocomplete="off">
                <div class="mb-3">
                    <label for="edit_nota" class="form-label">ID Nota</label>
                    <input type="text" class="form-control" id="edit_nota" name="edit_nota" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_tgl" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="edit_tgl" name="edit_tgl" required>
                  </div>
                  <div class="mb-3"> 
                      <label for="edit_kode_pelanggan" class="form-label">Kode Pelanggan</label>
                      <select class="form-select" id="edit_kode_pelanggan" name="edit_kode_pelanggan">
                        @foreach ($id_pelanggan['data'] as $rows)
                            <option value="{{ $rows['id_pelanggan'] }}">{{ $rows['id_pelanggan'] }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="submitEdit">Submit</button>
            </form>
            </div>
          </div>
        </div>
    </div>
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "ajax": {
                "url": "http://mini-project-api.test/api/getAllDataPenjualan",
                "type": "GET",
            },
            "processing": true,
            "responsive": true,
            "scrollX": true,
            "columns": [
                {
                    "data": "id_nota"
                },
                {
                    "data": "tgl"
                },
                {
                    "data": "kode_pelanggan"
                },
                {
                    "data": "subtotal"
                },
                {
                    data: null,
                    render: function ( data, type, row ) {
                        return '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" id="edit">Edit</button><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" id="delete">Delete</button>';
                    }
                }
            ]
        });

        var id_nota;
        var id_pelanggan;
        var tgl;
        var tglFull;
        var kode_pelanggan;
        var subtotal;
        $('#dataTable tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            id_pelanggan = data['id_pelanggan'];
            id_nota = data['id_nota'];
            tgl = data['tgl'];
            tglFull = tgl.split("/").reverse().join("-");
            kode_pelanggan = data['kode_pelanggan'];
            subtotal = data['subtotal'];
            $('.modal-body #edit_nota').val(id_nota);
            $('.modal-body #edit_tgl').val(tglFull);
            $('.modal-body #edit_kode_pelanggan').val(kode_pelanggan);
        } );
        $('#confirmDelete').on( 'click', function () {
            var urlDelete = "http://mini-project-api.test/api/deleteDataPenjualan/" + id_nota
            $.ajax({
                url: urlDelete,
                method: "DELETE",
                dataType: "JSON",
                success: function(data) {
                    $('#deleteModal').modal('toggle');
                    $('.modal-body #status').text('Berhasil dihapus');
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#deleteModal').modal('toggle');
                    $('#.modal-body #status').text('Gagal dihapus');
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                    console.log(xhr.responseText);
                }
            });
        } );

        var formCreate = $("#create_penjualan")[0];
        $('#submitCreate').on( 'click', function () {
            var urlCreate = "http://mini-project-api.test/api/createDataPenjualan"
            $.ajax({
                url: urlCreate,
                data: new FormData(formCreate),
                method: "POST",
                dataType: "JSON",
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    $('#createModal').modal('toggle');
                    $('.modal-body #status').text(data["message"]);
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#createModal').modal('toggle');
                    $('#.modal-body #status').text('Data gagal dimasukkan');
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                    console.log(xhr.responseText);
                }
            });
        });

        $('#createModal').on('hidden.bs.modal', function(e) {
            $(this).find('#create_penjualan')[0].reset();
        });

        var formEdit = $("#edit_pelanggan")[0];
        $('#submitEdit').on( 'click', function () {
            var urlEdit = "http://mini-project-api.test/api/updateDataPenjualan/"+id_nota
            $.ajax({
                url: urlEdit,
                data: {
                    id_nota: $('#edit_nota').val(),
                    tgl: $('#edit_tgl').val(),
                    kode_pelanggan: $('#edit_kode_pelanggan').val(),
                },
                method: "PUT",
                dataType: "JSON",
                success: function(data) {
                    $('#editModal').modal('toggle');
                    $('.modal-body #status').text(data["message"]);
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#editModal').modal('toggle');
                    $('.modal-body #status').text('Data gagal dimasukkan');
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                    console.log(xhr.responseText);
                }
            });
        });

        $('#editModal').on('hidden.bs.modal', function(e) {
            $(this).find('#edit_pelanggan')[0].reset();
        });
        
    });
</script>

</html>