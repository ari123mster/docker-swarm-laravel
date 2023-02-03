@extends('layouts.dashboard')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Menu User</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item active" aria-current="page">User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="button">
                        @can('user-create')
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
                        @endcan
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Hak Akses</th>
                                {{-- <th>Action</th> --}}
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        @foreach ($user->roles()->pluck('name') as $item)
                                            <span class="badge bg-primary"> {{ $item }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('user-edit')
                                            <a href="{{ route('user.edit', $user->id) }}" class="bi bi-pencil-square "></a>
                                        @endcan

                                    </td>
                                    <td>
                                        @can('user-delete')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                class="">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn">
                                                    <i class=" bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
@push('script')
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endpush
