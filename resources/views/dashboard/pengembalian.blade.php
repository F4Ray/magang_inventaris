@extends('layouts.app')

@section('jenisTransaksi')

@endsection

@section('section')

<div class="card">
    <div class="card-header">
        Pengembalian
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
                <form action="{{route ('pengembalian.update', $barang->id, $barang->kode_barang)}}"
                    class="row g-3 justify-content-center" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-10 mb-2">
                        <input type="text" class="form-control" name="id_merk" id="id_merk"
                            value="{{$barang->merk->id}}" readonly hidden>
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="kode_barang" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" name="nama_peminjam" value="{{$barang->nama_peminjam}}"
                            readonly>
                        @error('nama_peminjam')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" id="kode_barang"
                            value="{{$barang->kode_barang}}" readonly>
                        @error('kode_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$barang->nama}}"
                            readonly>
                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="id_merk" class="form-label">Merk</label>
                        <input type="text" class="form-control" name="merk" value="{{$barang->merk->merk}}" readonly>
                        @error('merk')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-10 mb-2">
                        <label for="kuantitas" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" name="kuantitas" id="kuantitas"
                            value="{{$barang->kuantitas}}">
                        @error('kuantitas')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-10 text-right ">
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