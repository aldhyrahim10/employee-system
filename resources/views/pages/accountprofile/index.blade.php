@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active"> Account Settings
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                            href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                            href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                    aria-labelledby="account-pill-general" aria-expanded="true">
                                    <form id="formUpdateUserProfile">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="first_name">Nama Depan</label>
                                                        <input type="hidden" class="hdnUserID"
                                                            value="{{ Auth::user()->id }}">
                                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                                            placeholder="Masukkan Nama Depan"
                                                            value="{{ Auth::user()->first_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="last_name">Nama Belakang</label>
                                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                                            placeholder="Masukkan Nama Depan"
                                                            value="{{ Auth::user()->last_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                            value="{{ Auth::user()->email }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="birth_date">Tanggal Lahir</label>
                                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                                            value="{{ \Carbon\Carbon::parse(Auth::user()->birth_date)->format('Y-m-d') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Jenis Kelamnin</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                    <option value="Laki-laki"
                                                        {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-start">
                                                <button type="submit"
                                                    class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                    aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form id="formResetPassword">
                                        <input type="hidden" class="hdnUserID" value="{{Auth::user()->id}}">
                                        <div class="row"> 
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="old_password">Old Password</label>
                                                        <input type="password" class="form-control"
                                                            id="old_password" name="old_password" required
                                                            placeholder="Old Password"
                                                            data-validation-required-message="This old password field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">New Password</label>
                                                        <input type="password" name="password" id="account-new-password"
                                                            class="form-control" placeholder="New Password" required
                                                            data-validation-required-message="The password field is required"
                                                            minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Retype New
                                                            Password</label>
                                                        <input type="password" name="password_confirmation" class="form-control"
                                                            required id="account-retype-new-password"
                                                            data-validation-match-match="password"
                                                            placeholder="New Password"
                                                            data-validation-required-message="The Confirm password field is required"
                                                            minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $("#formUpdateUserProfile").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');

            var id = $(this).find(".hdnUserID").val();

            $.ajax({
                url: "{{ route('update-user-profile', ':id') }}".replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Data berhasil diubah");
                    location.reload();
                },
                error: function (xhr) {

                    
                }
            });
        });

        $("#formResetPassword").submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            formData.append('_token', csrfToken);
            formData.append('_method', 'PATCH');

            var id = $(this).find(".hdnUserID").val();

            $.ajax({
                url: "{{ route('reset-password', ':id') }}".replace(':id', id),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert("Password berhasil diubah");
                    location.reload();
                },
                error: function (xhr) {

                    
                }
            });
        });
    });

</script>
@endsection
