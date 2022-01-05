@extends('layouts.app')

@section('jenisTransaksi')
<h4>Daftar Merk</h4>
@endsection

@section('section')
<!-- Tables -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="merk/create" class="btn btn-primary mb-3 col-lg-2 float-left">
                    Tambah Merk
                </a>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Merk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $n=1;
                        @endphp
                        @foreach($merk as $mrk)
                        <tr>
                            <th scope="row">{{$n++}}</th>
                            <td>{{$mrk->merk}}</td>
                            <td class="row ">

                                <a type="button" class="btn btn-secondary mx-2"
                                    href="{{route ('barang.edit', $mrk->id)}}">edit</a>
                                <form onsubmit="return confirm(' Hapus {{$mrk->nama}} ?');"
                                    action="{{route ('barang.destroy', $mrk->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">hapus</button>
                            </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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