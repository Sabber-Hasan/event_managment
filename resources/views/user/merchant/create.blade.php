@extends('layouts.user', ['title' => 'To be a merchant'])
@section('content')
    

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <a title="back to index" style="font-size: 2em" href="{{ url()->previous() }}">
                            <span>BACK</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('merchants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tl" class="form-label">{{ __('Trade License') }}</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="tl" name="tl" value="{{ old('tl') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at" class="form-label">{{ __('Account Type') }}</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="at" name="at" value="{{ old('at') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="an" class="form-label">{{ __('Account Number') }}</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="an" name="an" value="{{ old('an') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description" class="form-label">{{ __('Address') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city" class="form-label">{{ __('City') }}</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="city" name="city" value="{{ old('city') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="su" class="form-label">{{ __('site URL') }}</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    id="su" name="su" value="{{ old('su') }}" required>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logo" class="form-label">{{ __('Logo') }}</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    id="logo" name="logo" required>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button type="submit" class="btn btn-primary">{{ __('To be Merchant') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
