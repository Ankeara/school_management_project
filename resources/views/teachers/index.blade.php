@extends('layout.app')

@section('navbar')
    @include('components.navbar')
@endsection

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('datatable')
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-2 page-title">Teachers Application</h2>
            <a href="{{ url('/teachers/create') }}" class="btn mb-2 btn-primary"><i class="fe fe-24 fe-plus fs-6"></i> Add
                new</a>
        </div>

        <div class="row my-4">
            <!-- Small table -->
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table datatables" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Addess</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $item)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input">
                                                <label class="custom-control-label"></label>
                                            </div>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->address }}</td>
                                        <!-- Inside the table body -->
                                        <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('/teachers/' . $item->id) }}">View</a>
                                                <a class="dropdown-item"
                                                    href="{{ url('/teachers/' . $item->id . '/edit') }}">Edit</a>
                                                <a class="dropdown-item" href="#"
                                                    onclick="openDeleteModalTeacher('{{ $item->id }}')">Delete</a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- simple table -->
        </div> <!-- end section -->
    </div> <!-- .col-12 -->
@endsection

<div class="modal fade" id="deleteModalTeacher" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this teacher?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteTeacher">Delete</button>
            </div>
        </div>
    </div>
</div>
