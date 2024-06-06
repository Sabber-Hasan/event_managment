@extends('layouts.merchant', ['title' => 'Halls'])

@section('head')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url()->previous() }}" class="btn btn-link">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg> --}}
                            <h1><i class="bi bi-arrow-left-circle-fill"></i></h1>
                        </a>
                        <form action="{{ route('halls.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="merchant_id">{{ __('Merchant') }}</label>
                                <select class="form-control @error('merchant_id') is-invalid @enderror" id="merchant_id"
                                    name="merchant" required>
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                </select>
                                @error('merchant_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hall">{{ __('Hall Name') }}</label>
                                <input type="text" class="form-control @error('hall') is-invalid @enderror"
                                    id="hall" name="hall" value="{{ old('hall') }}" required>
                                @error('hall')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="image">{{ __('Image') }}</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="capacity">{{ __('Capacity') }}</label>
                                <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                                    id="capacity" name="capacity" value="{{ old('capacity') }}" required>
                                @error('capacity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" value="{{ old('description') }}" required>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Rent">{{ __('Rent') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('Rent') is-invalid @enderror" id="Rent" name="Rent"
                                    value="{{ old('Rent') }}" required>
                                @error('Rent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">{{ __('Discount') }}</label>
                                <input type="number" step="0.01"
                                    class="form-control @error('discount') is-invalid @enderror" id="discount"
                                    name="discount" value="{{ old('discount') }}">
                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vat">{{ __('VAT') }}</label>
                                <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat"
                                    name="vat" value="">
                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="hot">{{ __('Premium') }}</label>
                                <select class="form-control" id="hot" name="hot">
                                    <option value="1" {{ old('hot', 1) == 1 ? 'selected' : '' }}>{{ __('Active') }}
                                    </option>
                                    <option value="0" {{ old('hot') == 0 ? 'selected' : '' }}>{{ __('Inactive') }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mt-3 mb-3">
                                <label for="status">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Active') }}</option>
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('Inactive') }}
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Create Hall') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
