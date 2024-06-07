@extends('layouts.merchant', ['title' => 'Halls'])

@section('head')

@endsection
@section('content')
<div class="container">
        
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Halls') }}</span>
                    <a href="{{ route('halls.create') }}" class="btn btn-primary">Create</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Category List -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Capacity</th>
                                {{-- <th>Description</th> --}}
                                <th>Rent</th>
                                <th>discount</th>
                                <th>vat</th>
                                <th>Premium</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($halls as $hall)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $hall->merchant->name }}</td> --}}
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>
                                        @if ($hall->image)
                                            <img src="{{ asset('storage/' . $hall->image) }}"
                                                alt="{{ $hall->name }}" width="50">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    <td>{{ $hall->capacity }}</td>
                                    {{-- <td>{{ $hall->description }}</td> --}}
                                    <td>{{ $hall->price }}</td>
                                    <td>{{ $hall->discount }}</td>
                                    <td>{{ $hall->vat }}</td>
                                    <td>{{ $hall->hot }}</td>
                                    <td>{{ $hall->status ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                       
                                        <button type="submit" class="btn btn-sm btn-outline-success">
                                            <a href="{{ route('halls.edit' , $hall) }}"><i class="bi bi-pencil-fill"></i></a>
                                           </button>
                                            <button type="submit" class="btn btn-sm btn-outline-info">
                                               <a href="{{ route('halls.show', $hall) }}"><i class="bi bi-eye-fill"></i></a>
                                           </button>
                                        <form action="{{ route('halls.destroy', $hall) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this data?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form>      
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection
