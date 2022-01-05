@extends('layouts.app')

@section('jenisTransaksi')

@endsection

@section('section')
<!-- Tables -->
<div class="card">
    <div class="card-header">

        Daftar Merk
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="alert alert-success" role="alert">
                    Berhasil Tambah Merk
                </div>

            </div>
            <div class="col-md-12">
                @if ( auth()->user()->id_role == 1)
                <a href="merk/create" class="btn btn-primary mb-3 col-lg-2 float-left">
                    Tambah Merk
                </a>
                @else
                <h5 class="mb-4">Pilih barang yang ingin anda pinjam</h5>
                @endif

                <table class="table table-hover table-striped yajra-datatable" id="merk-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Merk</th>
                            @if ( auth()->user()->id_role == 1)
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
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

<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<!-- <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script> -->




<script type="text/javascript">
$(document).ready(function() {
    load_data();

    function load_data() {
        $('#merk-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("merk.index") }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'merk',
                    name: 'merk'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    }
});
</script>

@endsection