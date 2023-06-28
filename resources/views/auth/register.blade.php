<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Login : Penelitian Dosen </title>
		<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">																																																																																	<!-- Favicon -->

    <link rel='shortcut icon' type='image/x-icon' href="{{asset('/favicon.png')}}" />

    <!-- vendor css -->
    <link href="{{asset('vendor/login')}}/lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('vendor/login')}}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.css">
    <link rel="stylesheet" href="{{asset('vendor/login')}}/css/bracket.dark.css">
      <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('vendor/sweetalert')}}/sweetalert.css">

  <!-- End SweetAlert2 -->
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="identity_number" class="col-md-4 col-form-label text-md-right">{{ __('Identity Number') }}</label>

                                <div class="col-md-6">
                                    <input id="identity_number" type="text" class="form-control{{ $errors->has('identity_number') ? ' is-invalid' : '' }}" name="identity_number" value="{{ old('identity_number') }}" required>

                                    @if ($errors->has('identity_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('identity_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select class="form-group" name="gender">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Program Studi') }}</label>

                                <div class="col-md-6">
                                    <select class="form-group" name="id_prodi">
                                    @foreach ($prodi as $prod)
                                        <option value="{{$prod->id}}">{{$prod->nama_prodi}}</option>
                                    @endforeach
                                    </select>

                                    @if ($errors->has('id_prodi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('id_prodi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('vendor/login')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('vendor/login')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('vendor/login')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('vendor/sweetalert')}}/sweetalert.min.js"></script>
    @include('vendor.sweet.alert')
</body>

</html>
