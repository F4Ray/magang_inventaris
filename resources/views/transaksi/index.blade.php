@extends('layouts.app')

@section('section')



<div class="card">
    <div class="card-header">
        @if ( auth()->user()->id_role == 1)
        Daftar Transaksi
        @else
        Daftar Transaksi Anda
        @endif
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped" id="table-transaksi">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jenis Transaksi</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Nama Peminjam</th>
                            <th scope="col">Waktu</th>

                        </tr>
                    </thead>
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

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>


<script type="text/javascript">
$(document).ready(function() {
    load_data();

    function load_data() {
        $('#table-transaksi').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("transaksi.index") }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'jenis_transaksi',
                    name: 'jenis_transaksi'
                },
                {
                    data: 'kode_barang',
                    name: 'kode_barang'
                },
                {
                    data: 'nama_barang',
                    name: 'nama_barang'
                },
                {
                    data: 'merk',
                    name: 'merk'
                },
                {
                    data: 'kuantitas',
                    name: 'kuantitas'
                },
                {
                    data: 'nama_peminjam',
                    name: 'nama_peminjam'
                },
                {
                    data: 'waktu',
                    name: 'waktu'
                }
            ]
        });
    }
});
</script>
@endsection