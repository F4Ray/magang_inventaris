@extends('layouts.app')

@section('jenisTransaksi')
<h4>Profile</h4>
@endsection

@section('section')
<style>
body {
    background-color: #f9f9fa
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
}
</style>

<!-- Profile info -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-gradient-success user-profile">

                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img id="profileImage" src="{{$user->profile->foto_profile}}" width="100"
                                        class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600"> {{$user->profile->nama}} </h6>
                                <p>{{$user->role->role}}</p> <i
                                    class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>


                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <div>
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Account</h6>

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Password</p>
                                        <h6 type="password" class="text-muted f-w-400">{{$user->password}}</h6>
                                    </div> -->
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <!-- <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Dibuat</p>
                                        <h6 class="text-muted f-w-400">{{$user->profile->created_at->diffForHumans()}}
                                        </h6>
                                    </div> -->
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">NIP</p>
                                        <h6 class="text-muted f-w-400">{{$user->profile->nip}}</h6>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary text-right mt-5 edit" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Edit Profile </button>

                                <!-- <h6 class=" text-right mt-5 "> <a href="#">Edit Profile </a> </h6> -->
                                <!-- <ul class="social-link list-unstyled m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal form -->
<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('profile.update', $user->id) }}" class="row g-3 justify-content-center mt-5"
                method="POST">
                @csrf
                <div class="col-md-10 mb-2">
                    <label for="kode_barang" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$user->profile->nama}}">
                </div>
                <div class="col-md-10 mb-2">
                    <label for="nama" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                </div>
                <div class="col-10 mb-2">
                    <label for="kuantitas" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{$user->profile->nip}}"
                        readonly>
                </div>
                <div class="col-10 text-right mb-5 ">
                    <button type="submit" class=" mt-2 btn btn-primary">Save</button>
                </div>
                {{ method_field('PUT') }}

            </form>
        </div>
    </div>
</div>
@endsection


@section('script')

<!-- Test modal -->
<!--  -->






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