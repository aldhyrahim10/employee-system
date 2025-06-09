@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Cuti Karyawan</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item">Cuti Karyawan
                        </li>
                        <li class="breadcrumb-item active">Data Cuti Karyawan
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
                    <h4 class="card-title">Data-data Cuti Karyawan</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">

                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Alasan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offworks as $item)
                                    <tr class="item-content">
                                        <td>
                                            {{$loop->iteration}}
                                            <input type="hidden" class="hdnOffWorkID" value="{{$item->id}}">
                                        </td>
                                        <td>
                                            {{$item->employee->first_name}} {{$item->employee->last_name}}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->start_date)->format('d M Y') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->end_date)->format('d M Y') }}
                                        </td>
                                        <td>
                                            {{ $item->reason }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn btn-warning btn-update" data-toggle="modal"
                                                data-target="#modalUpdate">
                                                <i class="feather icon-edit"></i></div>
                                            <div class="btn btn-danger btn-delete" data-toggle="modal"
                                                data-target="#modalDelete">
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
            <form id="formAddOffWork">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">--Pilih Karyawan--</option>
                                    @foreach ($employees as $item)
                                    <option value="{{$item->id}}">{{$item->first_name}} {{$item->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    placeholder="Masukkan Tanggal Mulai">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="Masukkan Tanggal Selesai">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Alasan Cuti</label>
                                <textarea name="reason" id="reason" class="form-control"
                                    placeholder="Masukkan Alasan Cuti" cols="30" rows="5"></textarea>
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
            <form id="formUpdateOffWork">
                <input type="hidden" id="hdnOffWorkID" value="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">--Pilih Karyawan--</option>
                                    @foreach ($employees as $item)
                                    <option value="{{$item->id}}">{{$item->first_name}} {{$item->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    placeholder="Masukkan Tanggal Mulai">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    placeholder="Masukkan Tanggal Selesai">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Alasan Cuti</label>
                                <textarea name="reason" id="reason" class="form-control"
                                    placeholder="Masukkan Alasan Cuti" cols="30" rows="5"></textarea>
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
            <input type="hidden" class="hdnOffWorkID" value="">
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
        let date = new Date(datetimeString);
        return date.toISOString().slice(0, 10); // 'YYYY-MM-DDTHH:mm'
    }

    $(document).ready(function () {

        $("#formAddOffWork").submit(function (e) {
            e.preventDefault();

            const startDate = new Date($('#start_date').val());
            const endDate = new Date($('#end_date').val());

            const timeDiff = endDate - startDate;
            const dayDiff = timeDiff / (1000 * 3600 * 24);

            if (dayDiff > 1) {
                
                alert("Tanggal cuti hanya boleh 1 hari!");
            } else if (dayDiff < 0) {
                
                alert("Tanggal selesai tidak boleh lebih dari awal dari tanggal mulai!");
            } else {
                let formData = new FormData(this);

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                formData.append('_token', csrfToken);

                $.ajax({
                    url: "{{ route('add-offwork') }}",
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

                            if (errors != null) {
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
                            } else {
                                let message = xhr.responseJSON.message;
                                const alertHTML = `
                                    <div class="alert-point">
                                        <i class="feather icon-info align-middle"></i>
                                        <span>${message}</span>
                                    </div>
                                    `
                                 $(".alert-section").append(alertHTML);
                            
                                 $(".alert-section").show();
                            }
                        }

                    }
                });
            }


        });

        $(".btn-update").click(function () {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnOffWorkID").val();

            $.ajax({
                url: "{{ route('get-one-offwork') }}",
                type: "GET",
                data: {
                    'query': id
                },
                success: function (data) {
                    var formEditContent = $("#formUpdateOffWork");

                    formEditContent.find("#hdnOffWorkID").val(data.id);
                    formEditContent.find("#employee_id").val(data.employee_id);
                    formEditContent.find("#start_date").val(formatDateForInput(data
                        .start_date));
                    formEditContent.find("#end_date").val(formatDateForInput(data
                    .end_date));
                    formEditContent.find("#reason").val(data.reason);
                }
            });
        });

        $("#formUpdateOffWork").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');

            var id = $(this).find("#hdnOffWorkID").val();

            $.ajax({
                url: "{{ route('update-offwork', ':id') }}".replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Data berhasil diubah");
                    location.reload();
                },
                error: function (xhr) {

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

        $(".btn-delete").click(function (e) {
            var item = $(this).closest('.item-content');
            var id = item.find(".hdnOffWorkID").val();

            var modalContent = $("#modalDelete");

            modalContent.find(".hdnOffWorkID").val(id);
        });

        $(".btn-delete-execute").click(function (e) {
            var modalContent = $("#modalDelete");
            var id = modalContent.find(".hdnOffWorkID").val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('delete-offwork', ':id') }}".replace(':id', id),
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
