@extends('layout.app')

@section('navbar')
    @include('components.navbar')
@endsection

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('delete')
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Delete enrollment</strong>
            </div>
            <div class="card-body">
                <p>Are you sure you want to delete this enrollment?</p>
                <form action="{{ url('/enrollments/' . $enrollments->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{ url('/enrollments') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
