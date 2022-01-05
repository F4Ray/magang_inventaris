@extends('layouts.app')

@section('jenisTransaksi')
<h4>Penambahan</h4>
@endsection

@section('section')
<div class="card">
    <div class="card-header">
        Tambah User
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
                @endif
                @if ($message = Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{route ('user.store')}}" class="row g-3 justify-content-center" method="POST">
                    @csrf
                    <div class="col-md-10 mb-2">
                        <label for="email" class="form-label">email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="text" class="form-control" id="nip" name="nip">
                        @error('nip')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" aria-label="Default select example" id="role" name="role">
                            <option selected disabled hidden>Pilih Role</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->role}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-10 text-right">
                        <button type="submit" class=" mt-2 btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')

<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>

@endsection