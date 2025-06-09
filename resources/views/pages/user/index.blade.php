@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">User</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item">User
                        </li>
                        <li class="breadcrumb-item active">Data User
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAdd">
                <i class="feather icon-plus-circle"></i> Tambah Data
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data-data User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr class="item-content">
                                        <td>
                                            {{$loop->iteration}}
                                            <input type="hidden" class="hdnUserID" value="{{$item->id}}">
                                        </td>
                                        <td>{{$item->first_name}} {{$item->last_name}}</td>

                                        <td class="text-center">
                                            <div class="btn btn-primary" data-toggle="modal" data-target="#modalDetail">
                                                <i class="feather icon-eye"></i></div>
                                            <div class="btn btn-warning btn-update" data-toggle="modal" data-target="#modalUpdate">
                                                <i class="feather icon-edit"></i></div>
                                            <div class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalDelete">
                                                <i class="feather icon-trash"></i></div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Modal Detail --}}
<div class="modal fade text-left" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Detail Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta suscipit et ipsa ad dolores aut nulla
                    beatae debitis, fugit harum atque! Itaque dolorum maiores sint incidunt, laboriosam doloremque
                    officia explicabo.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger m-2 alert-validation-msg alert-section" style="display: none;" role="alert">
                <div class="alert-list">

                </div>
            </div>
            <form id="formAddUser">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama Depan</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Masukkan Nama Depan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama Belakang</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Masukkan Nama Depan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    placeholder="Masukkan Tanggal Lahir">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamnin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan Password">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modat Edit --}}
<div class="modal fade text-left" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-danger m-2 alert-validation-msg alert-section" style="display: none;" role="alert">
                <div class="alert-list">

                </div>
            </div>
            <form id="formUpdateUser">
                <div class="modal-body">
                    <input type="hidden" id="hdnUserID" value="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama Depan</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Masukkan Nama Depan">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Nama Belakang</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Masukkan Nama Belakang">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    placeholder="Masukkan Tanggal Lahir">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamnin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Hapus --}}

<div class="modal fade text-left" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <input type="hidden" class="hdnUserID" value="">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-delete-execute">Ya, Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function formatDateForInput(datetimeString) {
        if (!datetimeString) return '';
        return datetimeString.substring(0, 10);
    }

    $(document).ready(function () {

        $("#formAddUser").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);

            $.ajax({
                url: "{{ route('add-user') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Data berhasil ditambahkan");
                    location.reload();
                },
                error: function (xhr, status, error) {
                    $(".alert-section").empty();
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            const message = value[0];

                            const alertHTML = `
                            <div class="alert-point">
                                <i class="feather icon-info align-middle"></i>
                                <span>${message}</span>
                            </div>
                            `
                            $(".alert-section").append(alertHTML);
                        });

                        $(".alert-section").show();
                    }

                }
            });
        });

        $(".btn-update").click(function () {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnUserID").val();

            $.ajax({
                url: "{{ route('get-one-user') }}",
                type: "GET",
                data: {
                    'query': id
                },
                success: function (data) {
                    var formEditContent = $("#formUpdateUser");

                    formEditContent.find("#hdnUserID").val(data.id);
                    formEditContent.find("#first_name").val(data.first_name);
                    formEditContent.find("#last_name").val(data.last_name);
                    formEditContent.find("#email").val(data.email);
                    formEditContent.find("#birth_date").val(formatDateForInput(data.birth_date));
                    formEditContent.find("#gender").val(data.gender);
                }
            });
        });

        $("#formUpdateUser").submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');

             var id = $(this).find("#hdnUserID").val();

            $.ajax({
                url: "{{ route('update-user', ':id') }}".replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert("Data berhasil diubah");
                    location.reload();
                },
                error: function(xhr) {

                    $(".alert-section").empty();

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function (key, value) {
                            const message = value[0];

                            const alertHTML = `
                            <div class="alert-point">
                                <i class="feather icon-info align-middle"></i>
                                <span>${message}</span>
                            </div>
                            `
                            $(".alert-section").append(alertHTML);
                        });

                        $(".alert-section").show();
                    }
                }
            });
        });

        $(".btn-delete").click(function(e){
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnUserID").val();

            var modalContent = $("#modalDelete");

            modalContent.find(".hdnUserID").val(id);
        });

        $(".btn-delete-execute").click(function(e){
            var modalContent = $("#modalDelete");
            var id = modalContent.find(".hdnUserID").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('delete-user', ':id') }}".replace(':id', id),
                type: "POST",
                data: {
                    '_token': csrfToken,
                    '_method': 'DELETE',
                },
                success: function (data) {
                    alert("Data berhasil dihapus");
                    location.reload();    
                }
            });
        });
        

    });

</script>
@endsection
