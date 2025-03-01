@extends('layouts.sidebar')

@section('content')
    <style>
        .container {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .tables-wrapper {
            display: flex;
            gap: 20px;
        }

        .table-container h3 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        
        th:first-child {
            border-top-left-radius: 8px;
        }
        
        th:last-child {
            border-top-right-radius: 8px;
        }
        
        tr:last-child td:first-child {
            border-bottom-left-radius: 8px;
        }
        
        tr:last-child td:last-child {
            border-bottom-right-radius: 8px;
        }
        
        th {
            background-color: #4f52ba;
            color: #fff;
            padding: 12px;
            text-align: center;
            font-size: 14px;
        }
        
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-weight: normal;
            font-size: 12px;
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        .no-data {
            text-align: center;
            color: rgba(79, 82, 186, 0.2);
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            margin: 0 2px;
        }

        .btn-edit {
            background-color: #4f52ba;
            color: white;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-edit:hover {
            background-color: #3a3d9c;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .add-button {
            background-color: #4f52ba;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 18.75%;
        }

        .add-button:hover {
            background-color: #3a3d9c;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 500px;
            position: relative;
        }

        .modal-content h2 {
            color: #595959;
            font-size: 20px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            color: #595959;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: normal;
            background-color: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .modal-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .modal-close-btn:hover {
            color: #333;
        }

        .button-container {
            display: flex;
            justify-content: right;
            gap: 10px;
            margin-top: 20px;
        }

        /* Style untuk Cards */
        .cards-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(33.333% - 14px);
            min-width: 250px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: #4f52ba;
            color: white;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .count {
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-body p {
            color: #666;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .view-btn {
            background: #4f52ba;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .view-btn:hover {
            background: #3a3d9c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .cards-container {
                flex-direction: column;
            }
            
            .card {
                width: 100%;
            }
        }
    </style>

    <div class="main">
        <div class="container">
            <div class="header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 style="font-size: 18px; font-weight: 600; color: #4f52ba; margin: 0;">Data POC</h3>
                    <button type="button" class="add-button" onclick="openAddPOPModal()">Tambah POC</button>
                </div>
            </div>

            <!-- Table Data POP -->
            <div class="table-container">
                <table id="popTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Site</th>
                            <th>Kode Site</th>
                            <th>No Site</th>
                            <th>Jenis Site</th>
                            <th>Kode Region</th>
                            <th>Wajib Inspeksi</th>
                            <th>Jumlah Rack</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($site as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_site }}</td>
                                <td>{{ $item->kode_site }}</td>
                                <td>{{ $item->no_site }}</td>
                                <td>
                                    @if($item->jenis_site === 'POC')
                                        {{ $item->jenis_site }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $item->kode_region }}</td>
                                <td>{{ $item->wajib_inspeksi ? 'Ya' : 'Tidak' }}</td>
                                <td>{{ $item->jml_rack }}</td>
                                
                                <td>
                                    <button type="button" class="btn-edit" onclick="editPOP({{ $item->kode_site }})">Edit</button>
                                    <button type="button" class="btn-delete" onclick="deletePOP({{ $item->kode_site }})">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="addPOPModal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <span class="modal-close-btn" onclick="closeAddPOPModal()">&times;</span>
            <h2>Tambah POC</h2>
            <form id="addPOPForm">
                @csrf
                <div class="form-group">
                    <label for="regional">Regional</label>
                    <select id="regional" name="regional" required>
                        <option value="">Pilih Region</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->nama_region }}">{{ $region->nama_region }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode_regional">Kode Regional</label>
                    <input type="text" id="kode_regional" name="kode_regional" required>
                </div>
                <div class="form-group">
                    <label for="jenis_site">Jenis Site</label>
                    <input type="text" id="jenis_site" name="jenis_site" required>
                    <select name="site" id="site">
                        @foreach($sites as $site)
                            @if($site->jenis_site === 'POC')
                                <option value="{{ $site->jenis }}">{{ $site->jenis_site }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="text" id="site" name="site" required>
                </div>
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" id="kode" name="kode" required>
                </div>
                <div class="form-group">
                    <label for="wajib_inspeksi">Wajib Inspeksi</label>
                    <select id="wajib_inspeksi" name="wajib_inspeksi" required>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
                <button type="submit" class="add-button">Simpan</button>
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ----------------------- FUNCTION ADD/EDIT -----------------------
        $('#addPOPForm').submit(function(e) {
            e.preventDefault();
            
            const no_site = $('#id-input').val();
            const url = no_site ? `/update-site/${no_site}` : '/store-site';
            const method = no_site ? 'PUT' : 'POST';
            
            $.ajax({
                url: url,
                type: method,
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        closeAddPOPModal();
                        showSwal('success', no_site ? 'POP berhasil diupdate!' : 'POP berhasil ditambahkan!');
                        window.location.reload();
                        $('#addPOPForm')[0].reset();
                        $('#id-input').remove();
                    } else {
                        showSwal('error', response.message || 'Terjadi kesalahan');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    showSwal('error', 'Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });

        // ----------------------- FUNCTION DELETE -----------------------
        window.deletePOP = function(no_site) {
            swal({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: `/delete-site/${no_site}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                swal("Terhapus!", "POP berhasil dihapus.", "success");
                                window.location.reload();
                            } else {
                                showSwal('error', response.message || "Gagal menghapus POP");
                            }
                        },
                        error: function(xhr) {
                            console.error('Delete error:', xhr.responseText);
                            showSwal('error', 'Terjadi kesalahan saat menghapus POP');
                        }
                    });
                }
            });
        }

        // ----------------------- FUNCTION EDIT -----------------------
        window.editPOP = function(no_site) {
            $.get(`/get-site/${no_site}`, function(response) {
                if (response.success) {
                    const site = response.site;
                    $('#regional').val(site.regional);
                    $('#kode_regional').val(site.kode_regional);
                    $('#jenis_site').val(site.jenis_site);
                    $('#site').val(site.site);
                    $('#kode').val(site.kode);
                    $('#keterangan').val(site.keterangan);
                    $('#wajib_inspeksi').val(site.wajib_inspeksi ? '1' : '0');
                    
                    $('#id-input').remove();
                    $('#addPOPForm').append(`<input type="hidden" id="id-input" name="id" value="${site.no_site}">`);
                    
                    openAddPOPModal();
                }
            });
        }

        // ----------------------- MODAL FUNCTIONS -----------------------
        window.openAddPOPModal = function() {
            $('#addPOPModal').show();
            $('#addPOPForm')[0].reset();
        }

        window.closeAddPOPModal = function() {
            $('#addPOPModal').hide();
        }

        // ----------------------- ALERT -----------------------
        function showSwal(type, message) {
            if (type === 'success') {
                swal({
                    title: "Berhasil!",
                    text: message,
                    type: "success",
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                });
            } else if (type === 'error') {
                swal({
                    title: "Error!",
                    text: message,
                    type: "error",
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-danger"
                    }
                });
            }
        }
    });
    </script>
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


