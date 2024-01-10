@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ __('Welcome! ') }}{{ Auth()->user()->name }}
                        <hr>
                        <div class="card-body">
                            <form action="{{ route('two-factor.enable') }}" method="post">
                                @csrf
                                @if (Auth()->user()->two_factor_secret)
                                    @method('DELETE')
                                    <div class="row">
                                        <div class="col-6 pb-3">
                                            {!! Auth()->user()->twoFactorQrCodeSvg() !!}
                                        </div>
                                        <div class="col-6">
                                            <h3>Recovery Codes:</h3>
                                            <ol>
                                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger">Disable 2FA</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Enable 2FA</button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
