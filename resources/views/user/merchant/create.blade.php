@extends('layouts.user', ['title' => 'To be a merchant'])
@section('home')
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <a title="back to index" style="font-size: 2em" href="{{ url()->previous() }}">
                            <h1><i class="bi bi-arrow-left-circle-fill"></i></h1>

                        </a>
                    </div>
                    <div class="card-body">
                        <h3>Mechant's Form</h3>
                        <hr/>
                        <form action="{{ route('merchants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="form-group">
                                <label for="uid" class="form-label">{{ __('User id') }}</label>
                                <input type="hidden" class="form-control @error('uid') is-invalid @enderror"
                                    id="uid" name="uid" value="{{ $users }}" required>
                                @error('uid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="name" class="form-label">{{ __('Company Name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tl" class="form-label">{{ __('Trade License') }}</label>
                                <input type="text" class="form-control @error('tl') is-invalid @enderror"
                                    id="tl" name="tl" value="{{ old('tl') }}" required>
                                @error('tl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at" class="form-label">{{ __('Account Type') }}</label>
                                <input type="text" class="form-control @error('at') is-invalid @enderror"
                                    id="at" name="at" value="{{ old('at') }}" required>
                                @error('at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="an" class="form-label">{{ __('Account Number') }}</label>
                                <input type="text" class="form-control @error('an') is-invalid @enderror"
                                    id="an" name="an" value="{{ old('an') }}" required>
                                @error('an')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">{{ __('Address') }}</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                    rows="3" required>{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city" class="form-label">{{ __('City') }}</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}" required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="su" class="form-label">{{ __('site URL') }}</label>
                                <input type="text" class="form-control @error('su') is-invalid @enderror"
                                    id="su" name="su" value="{{ old('su') }}" required>
                                @error('su')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logo" class="form-label">{{ __('Logo') }}</label>
                                <input type="file" class="form-control-file @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" required>
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary">{{ __('submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
