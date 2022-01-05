@extends('layouts.app')

@section('jenisTransaksi')
<h4>Penambahan</h4>
@endsection

@section('section')
<div class="card">
    <div class="card-header">
        Edit Merk
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
                <form action="{{route ('merk.update', $merk->id)}}" class="row g-3 justify-content-center"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-10 mb-2">
                        <label for="merk" class="form-label">merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" value="{{ $merk->merk }}">
                        @error('merk')
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