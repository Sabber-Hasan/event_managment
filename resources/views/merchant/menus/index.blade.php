@extends('layouts.merchant', ['title' => 'Menu'])
@section('head')
@endsection
@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Menus') }}</span>
                        <a href="{{ route('menus.create') }}" class="btn btn-primary">Create</a>
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
                                    <th>category</th>
                                    <th>item</th>
                                    <th>image</th>
                                    <th>price</th>
                                    <th>discount</th>
                                    <th>quantity</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $menu->category->name }}</td>
                                        <td>{{ $menu->item }}</td>
                                        <td>
                                            @if ($menu->image)
                                                <img src="{{ asset('storage/' . $menu->image) }}"
                                                    alt="{{ $menu->name }}" width="50">
                                            @else
                                                No image
                                            @endif
                                        </td>
                                        <td>{{ $menu->price }}</td>
                                        <td>{{ $menu->discount }}</td>
                                        <td>{{ $menu->quantity }}</td>
                                        <td>{{ $menu->status ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                           
                                            <button type="submit" class="btn btn-sm btn-outline-success">
                                                <a href="{{ route('menus.edit' , $menu) }}"><i class="bi bi-pencil-fill"></i></a>
                                               </button>
                                                <button type="submit" class="btn btn-sm btn-outline-info">
                                                   <a href="{{ route('menus.show', $menu) }}"><i class="bi bi-eye-fill"></i></a>
                                               </button> 
                                            <form action="{{ route('menus.destroy', $menu) }}" method="POST"
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
