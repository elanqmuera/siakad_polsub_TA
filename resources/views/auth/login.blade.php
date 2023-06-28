<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Login </title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> <!-- Favicon -->

    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('/favicon.png') }}" />

    <!-- vendor css -->
    <link href="{{ asset('vendor/login') }}/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('vendor/login') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/login') }}/css/bracket.css">
    <link rel="stylesheet" href="{{ asset('vendor/login') }}/css/bracket.dark.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert') }}/sweetalert.css">

    <!-- End SweetAlert2 -->
</head>

<body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
        
        <img src="{{ asset('assets/img') }}/favicon.png" class="wd-100p ht-100p object-fit-cover" alt="">
        <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
                <center>
                <img src="{{asset('vendor/lakers')}}/img/polsub.png" alt="image" height="100" width="100">
                {{-- <div class="signin-logo tx-center tx-38 tx-bold tx-black"><span class="tx-normal"></span> AKADEMIK <span
                        class="tx-black">POLSUB</span>
                    <span class="tx-normal"></span>
                </div> --}}
            </center>
            <div class=" mg-b-20"></div>
                <div class="tx-black-10 tx-center mg-b-30">Please Login To Continue</div>
                <form action="{{ route('sign-in') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="identity_number" class="form-control "
                            placeholder="Masukan Nomor Identitas">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" name="password" class="form-control " placeholder="Masukan password">
                    </div><!-- form-group -->
                    <div class="form-group" style="display:flex">
                        <label for="is_wali" style="width:100%">Login sebagai wali? </label>
                        <input type="checkbox" name="is_wali" class="form-control fc-outline-dark" id="is_wali">
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>
                <div class=" mg-b-20"></div>
            </div><!-- login-wrapper -->
        </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{ asset('vendor/login') }}/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('vendor/login') }}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('vendor/login') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/sweetalert') }}/sweetalert.min.js"></script>
    @include('vendor.sweet.alert')
</body>

</html>
