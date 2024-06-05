@extends('layouts.admin', ['title' => 'Merchants'])
@section('head')
    
@endsection
@section('content')
<div class="container">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('Categories') }}</span>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create</a>
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
                                <th>Logo</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Site</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($merchant->logo)
                                            <img src="{{ asset('storage/' . $merchant->logo) }}"
                                                alt="{{ $merchant->name }}" width="50">
                                        @else
                                            No image
                                        @endif
                                    </td>
                                    
                                    <td>{{ $merchant->company_name }}</td>
                                    <td>{{ $merchant->city }}</td>
                                    <td>{{ $merchant->logo }}</td>
                                    <td>{{ $merchant->site }}</td>
                                    <td>{{ $merchant->Status}}</td>
                                    <td>
                                       
                                     {{-- <a href="{{ route('merchants.edit' , $category) }}"><i class="bi bi-pencil-fill"></i></a>

                                        <a href="{{ route('merchants.show', $category) }}"><i class="bi bi-eye-fill"></i></a>
                                        
                                        <form action="{{ route('merchants.destroy', $category) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this data?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                        </form> --}}
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