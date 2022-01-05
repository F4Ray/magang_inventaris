@extends('layouts.app')

@section('jenisTransaksi')
@endsection

@section('section')

<div class="card">
    <div class="card-header">
        Peminjaman
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
                <form action="{{route ('peminjaman.update', $barang->id)}}" class="row g-3 justify-content-center"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-10 mb-2">
                        <label for="inputAddress" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam" id="inputAddress" @if (
                            auth()->user()->id_role ==
                        2)
                        value="{{auth()->user()->profile->nama}}" readonly @endif>
                        @error('nama_peminjam')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" col-md-10 mb-2">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" id="inputEmail4"
                            value="{{$barang->kode_barang}}" readonly>
                        @error('kode_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="inputEmail4" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="inputEmail4"
                            value="{{$barang->nama}}" readonly>
                        @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="inputPassword4" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk" id="inputPassword4"
                            value="{{$barang->merk->merk}}" readonly>
                        @error('merk')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-10 mb-2">
                        <label for="inputAddress" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="inputAddress"
                            value="{{$barang->kuantitas}}">
                        @error('jumlah')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-10 text-right">
                        <button type="submit" class=" mt-2 btn btn-primary">Submit</button>
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