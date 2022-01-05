@extends('layouts.app')

@section('jenisTransaksi')
<h4>Penambahan</h4>
@endsection

@section('section')
<div class="card">
    <div class="card-header">
        Tambah Barang
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
                <form action="{{route ('transaksi.store')}}" class="row g-3 justify-content-center" method="POST">
                    @csrf
                    <div class="col-md-10 mb-2">
                        <label for="kode_barang" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                            value="{{ $unique_code }}" readonly>
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="col-md-10 mb-2">
                        <label for="id_merk" class="form-label">Merk</label>
                        <!-- <input type="text" class="form-control" id="id_merk" name="id_merk"> -->
                        <select class="form-control" aria-label="Default select example" id="id_merk" name="id_merk">
                            <option selected disabled hidden>Select Merk</option>
                            @foreach ($merk as $brg)
                            <option value="{{$brg->id}}">{{$brg->merk}}</option>
                            @endforeach
                        </select>
                        <small class="text-normal"><a href="/merk">Klik disini</a> untuk menambah merk</small>


                    </div>
                    <div class="col-10 mb-2">
                        <label for="kuantitas" class="form-label">Kuantitas</label>
                        <input type="text" class="form-control" id="kuantitas" name="kuantitas">
                    </div>
                    <div class="col-10 text-right  ">
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