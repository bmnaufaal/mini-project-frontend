<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Pelanggan</title>
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
        <h2 class="mt-2 ">Daftar Pelanggan</h2>
        <button class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#createModal">Tambah data</button>
        <div class="card">
            <div class="card-body">
                <table id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Nama</th>
                            <th>Domisili</th>
                            <th>Jenis Kelamin</th>
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
              <form id="create_pelanggan" method="POST" autocomplete="off">
                <div class="mb-3">
                  <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                  <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" required>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="domisili" class="form-label">Domisili</label>
                    <input type="text" class="form-control" id="domisili" name="domisili" required>
                </div>
                <div class="mb-3"> 
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="PRIA">Pria</option>
                        <option value="WANITA">Wanita</option>
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
              <form id="edit_pelanggan" method="PUT" autocomplete="off">
                <div class="mb-3">
                  <label for="edit_id_pelanggan" class="form-label">ID Pelanggan</label>
                  <input type="text" class="form-control" id="edit_id_pelanggan" name="edit_id_pelanggan" required>
                </div>
                <div class="mb-3">
                  <label for="edit_nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="edit_nama" name="edit_nama" required>
                </div>
                <div class="mb-3">
                    <label for="edit_domisili" class="form-label">Domisili</label>
                    <input type="text" class="form-control" id="edit_domisili" name="edit_domisili" required>
                </div>
                <div class="mb-3"> 
                    <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="edit_jenis_kelamin" name="edit_jenis_kelamin">
                        <option value="PRIA">Pria</option>
                        <option value="WANITA">Wanita</option>
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
</body>
<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable( {
            "ajax": {
                "url": "http://mini-project-api.test/api/getAllDataPelanggan",
                "type": "GET",
            },
            "processing": true,
            "responsive": true,
            "scrollX": true,
            "columns": [
                { 
                    "data": "id_pelanggan" 
                },
                { 
                    "data": "nama" 
                },
                { 
                    "data": "domisili" 
                },
                { 
                    "data": "jenis_kelamin" 
                },
                {
                    data: null,
                    render: function ( data, type, row ) {
                        return '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" id="edit">Edit</button><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" id="delete">Delete</button>';
                    }
                }
            ]
        });

        var id_pelanggan;
        var nama;
        var domisili;
        var jenis_kelamin;
        $('#dataTable tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            id_pelanggan = data['id_pelanggan'];
            nama = data['nama'];
            domisili = data['domisili'];
            jenis_kelamin = data['jenis_kelamin'];
            $('.modal-body #edit_id_pelanggan').val(id_pelanggan);
            $('.modal-body #edit_nama').val(nama);
            $('.modal-body #edit_domisili').val(domisili);
            $('.modal-body #edit_jenis_kelamin').val(jenis_kelamin);
        } );

        $('#confirmDelete').on( 'click', function () {
            var urlDelete = "http://mini-project-api.test/api/deleteDataPelanggan/" + id_pelanggan
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

        var formCreate = $("#create_pelanggan")[0];
        $('#submitCreate').on( 'click', function () {
            var urlCreate = "http://mini-project-api.test/api/createDataPelanggan"
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
                    $('.modal-body #status').text('Data gagal dimasukkan');
                    $('#notificationModal').modal('toggle');
                    $('#dataTable').DataTable().ajax.reload();
                    console.log(xhr.responseText);
                }
            });
        });

        $('#createModal').on('hidden.bs.modal', function(e) {
            $(this).find('#create_pelanggan')[0].reset();
        });

        var formEdit = $("#edit_pelanggan")[0];
        $('#submitEdit').on( 'click', function () {
            var urlEdit = "http://mini-project-api.test/api/updateDataPelanggan/"+id_pelanggan;
            $.ajax({
                url: urlEdit,
                data: {
                    id_pelanggan: $('#edit_id_pelanggan').val(),
                    nama: $('#edit_nama').val(),
                    domisili: $('#edit_domisili').val(),
                    jenis_kelamin: $('#edit_jenis_kelamin').val(),
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
