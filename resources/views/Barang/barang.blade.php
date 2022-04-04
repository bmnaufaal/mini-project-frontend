<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Barang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">
    <link rel="stylesheet" href="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

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
        <h2 class="mt-2 ">Daftar Barang</h2>
        <button class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#createModal">Tambah data</button>
        <div class="card">
            <div class="card-body">
                <table id="dataTable" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
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
              <form id="create_barang" method="POST" autocomplete="off">
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" required>
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
                    <label for="edit_kode" class="form-label">Kode</label>
                    <input type="text" class="form-control" id="edit_kode" name="edit_kode" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="edit_nama" name="edit_nama" required>
                  </div>
                  <div class="mb-3">
                      <label for="edit_kategori" class="form-label">Kategori</label>
                      <input type="text" class="form-control" id="edit_kategori" name="edit_kategori" required>
                  </div>
                  <div class="mb-3">
                      <label for="edit_harga" class="form-label">Harga</label>
                      <input type="text" class="form-control" id="edit_harga" name="edit_harga" required>
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
        var table = $('#dataTable').DataTable({
            "ajax": {
                "url": "http://mini-project-api.test/api/getAllDataBarang",
                "type": "GET",
            },
            "processing": true,
            "responsive": true,
            "scrollX": true,
            "columns": [
                {
                    "data": "kode"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "kategori"
                },
                {
                    "data": "harga"
                },
                {
                    data: null,
                    render: function ( data, type, row ) {
                        return '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" id="edit">Edit</button><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" id="delete">Delete</button>';
                    }
                }
            ]
        });

        var kode;
        var nama;
        var kategori;
        var harga;
        $('#dataTable tbody').on( 'click', 'button', function () {
            var data = table.row( $(this).parents('tr') ).data();
            kode = data['kode'];
            nama = data['nama'];
            kategori = data['kategori'];
            harga = data['harga'];
            $('.modal-body #edit_kode').val(kode);
            $('.modal-body #edit_nama').val(nama);
            $('.modal-body #edit_kategori').val(kategori);
            $('.modal-body #edit_harga').val(harga);
        });
        $('#confirmDelete').on( 'click', function () {
            var urlDelete = "http://mini-project-api.test/api/deleteDataBarang/" + kode
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

        var formCreate = $("#create_barang")[0];
        $('#submitCreate').on( 'click', function () {
            var urlCreate = "http://mini-project-api.test/api/createDataBarang"
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
            $(this).find('#create_barang')[0].reset();
        });

        var formEdit = $("#edit_pelanggan")[0];
        $('#submitEdit').on( 'click', function () {
            var urlEdit = "http://mini-project-api.test/api/updateDataBarang/"+kode
            $.ajax({
                url: urlEdit,
                data: {
                    kode: $('#edit_kode').val(),
                    nama: $('#edit_nama').val(),
                    kategori: $('#edit_kategori').val(),
                    harga: $('#edit_harga').val(),
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