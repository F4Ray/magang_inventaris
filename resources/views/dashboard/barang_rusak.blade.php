@extends('layouts.app')

@section('jenisTransaksi')
    <h4 >Barang Rusak</h4>
@endsection

@section('section')
    <form class="row g-3 justify-content-center mt-5">
        <div class="col-md-10 mb-2">
            <label for="inputEmail4" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-10 mb-2">
            <label for="inputEmail4" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-10 mb-2">
            <label for="inputPassword4" class="form-label">Merk</label>
            <input type="text" class="form-control" id="inputPassword4">
        </div>
        <div class="col-10 mb-2">
            <label for="inputAddress" class="form-label">Jumlah</label>
            <input type="text" class="form-control" id="inputAddress" >
        </div>
        <div class="col-10 text-right  ">
            <button type="submit" class=" mt-2 btn btn-primary">Submit</button>
        </div>
    </form>
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