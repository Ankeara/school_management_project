@extends('layout.app')

@section('navbar')
    @include('components.navbar')
@endsection

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('create')
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-2 page-title">Courses Page</h2>
            <a href="{{ url('/courses') }}" class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Courses</strong>
            </div>
            <div class="card-body">
                <div class="row col-12">
                    <form action="{{ url('courses') }}" method="POST">
                        <div>
                            {!! csrf_field() !!}
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="syllabus">Syllabus</label>
                                <input type="text" id="syllabus" name="syllabus" class="form-control col-12"
                                    placeholder="syllabus">
                            </div>
                            <div class="form-group mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" id="duration" name="duration" class="form-control"
                                    placeholder="Phone">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div> <!-- /.col -->
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
@endsection
