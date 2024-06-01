@extends('layouts.user',['title'=> 'To be a merchant'])
@section('content')
<div class="d-flex justify-content-between">
    <a title="back to index" style="font-size: 2em" href="{{ route('user') }}">
        <i class="bi bi-backspace"></i>
    </a>
</div>

{{ html()->form('post', route('user'))->acceptsFiles()->open() }}

<div class="form-group field-merchant-user_id required has-error">
    <label class="control-label" for="merchant-user_id">User ID</label>
    {!! html()->select('user_id', $users, old('user_id'))->class('form-select') !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-company_name required">
    <label class="control-label" for="merchant-company_name">Company Name</label>
    {!! html()->text('company_name', old('company_name'))->class('form-control')->attributes(['maxlength' => '80']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-phone required">
    <label class="control-label" for="merchant-phone">Phone</label>
    {!! html()->text('phone', old('phone'))->class('form-control')->attributes(['maxlength' => '15']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-trade_license required">
    <label class="control-label" for="merchant-trade_license">Trade License</label>
    {!! html()->text('trade_license', old('trade_license'))->class('form-control')->attributes(['maxlength' => '20']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-account_type required">
    <label class="control-label" for="merchant-account_type">Account Type</label>
    {!! html()->text('account_type', old('account_type'))->class('form-control') !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-account_num required">
    <label class="control-label" for="merchant-account_num">Account Number</label>
    {!! html()->text('account_num', old('account_num'))->class('form-control') !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-address required">
    <label class="control-label" for="merchant-address">Address</label>
    {!! html()->text('address', old('address'))->class('form-control')->attributes(['maxlength' => '900']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-city required">
    <label class="control-label" for="merchant-city">City</label>
    {!! html()->text('city', old('city'))->class('form-control')->attributes(['maxlength' => '180']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group field-merchant-site_url">
    <label class="control-label" for="merchant-site_url">Website URL</label>
    {!! html()->text('site_url', old('site_url'))->class('form-control')->attributes(['maxlength' => '180']) !!}
    <div class="help-block"></div>
</div>

<div class="form-group">
    <div class="form-label">Company Logo</div>
    <input type="file" name="logo" id="logo" class="form-control">
    <hr>
    <!-- Display uploaded logo if available -->
    @if (isset($merchant) && $merchant->logo)
        <div class="d-inline-block position-relative p-3">
            <img src="{{ asset('storage/' . $merchant->logo) }}" width="100px" alt="Company Logo" loading="lazy">
        </div>
    @endif
</div>

<div class="form-group field-merchant-status required">
    <label class="control-label" for="merchant-status">Status</label>
    {!! html()->select('status', ['1' => 'Active', '0' => 'Inactive'], old('status', 0))->class('form-select')->placeholder('Select....') !!}
    <div class="help-block"></div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Create Merchant</button>
</div>

{{ html()->form()->close() }}

@endsection