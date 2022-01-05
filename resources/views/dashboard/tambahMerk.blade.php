@extends('layouts.app')

@section('jenisTransaksi')
    <h4 >Tambah Merk</h4>
@endsection

@section('section')
    <form action="{{route ('merk.store')}}" class="row g-3 justify-content-center mt-5 " method="POST" autocomplete="off" >
        @csrf
        <div class="col-md-8 after-add-more  justify-content-center">
            <div class="row  mb-2 " style="margin-left:0px;">
                <label for="merk" class="form-label">Nama Merk</label>
                <input type="text" placeholder="..." class="form-control" id="merk" name="merk[]">
                <!-- <i style="cursor:pointer" class="fas fa-plus add-more"></i> -->
            </div>   
            <div class="dynamic-stuff"></div>
            <i style="cursor:pointer" class="fas fa-plus add-more"></i>
            <div class="col-12 text-right  ">
                <button type="submit" class=" mt-2 btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


    <div id="test" class="copy gone " style="display:none">
        <div class="control-group">
            <div class="row mb-2">
                <div class="col-md-11 ">
                    <!-- <input type="text" placeholder="..." class="form-control" id="merk" name="merk[]"> -->
                    <input type="text" placeholder="Nama Merk" class="form-control" id="merk" name="merk[]">
                </div>
                <div class="col-md-1  text-right">
                    <button type="button" class="btn btn-danger">
                        <i style="cursor:pointer" class="fas fa-minus delete"></i>
                    </button>
                </div>
                <!-- <i style="cursor:pointer" class="fas fa-plus add-more"></i> -->
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript">
        // $(document).ready(function() {
        // $(".add-more").click(function(){ 
        //     var html = $(".copy").html();
        //     $(".after-add-more").after(html);
        // });

        // saat tombol remove dklik control group akan dihapus 
        // $("body").on("click",".remove",function(){ 
        //     $(this).parents(".control-group").remove();
        // });
        // });


        $('.add-more').click(function(){
        // var element = document.getElementById("test");
        // element.classList.remove("invisible");
        var g= $('.copy').first().clone().appendTo('.dynamic-stuff').show();
        g.find('input').val('');
        attach_delete();
        });

        function attach_delete(){
        $('.delete').off();
        $('.delete').click(function(){
            console.log("click");
            $(this).closest('.gone').remove();
        });
        }
    </script>

@endsection