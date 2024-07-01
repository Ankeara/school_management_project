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
            <h2 class="mb-2 page-title">Enrollments Page</h2>
            <a href="{{ url('/enrollments') }}"
                class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Enrollments</strong>
            </div>
            <div class="card-body">
                <div class="row col-12">
                    <form action="{{ url('enrollments') }}" method="POST">
                        <div>
                            {!! csrf_field() !!}
                            <div class="form-group mb-3">
                                <label for="enroll_no">Enroll no</label>
                                <input type="text" id="enroll_no" name="enroll_no" class="form-control"
                                    placeholder="Enrollment No">
                            </div>
                            <div class="form-group mb-3">
                                <label for="batches_id">Batches</label>
                                <select id="batches_id" name="batches_id" class="form-control col-12">
                                    <option value="hidden">Select option</option>
                                    @foreach ($batches as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="student_id">Student</label>
                                <select id="student_id" name="student_id" class="form-control col-12">
                                    <option value="hidden">Select option</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="join_date">Join date</label>
                                <input type="date" id="join_date" name="join_date" class="form-control"
                                    placeholder="Join date">
                            </div>
                            <div class="form-group mb-3">
                                <label for="fee">Fee</label>
                                <input type="text" id="fee" name="fee" class="form-control" placeholder="Fee">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div> <!-- /.col -->
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
@endsection
