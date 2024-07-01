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
            <h2 class="mb-2 page-title">Enrollmentss Page</h2>
            <a href="{{ url('/enrollmentss') }}"
                class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Enrollmentss</strong>
            </div>
            <div class="card-body">
                <div class="row col-12">
                    <form action="{{ route('enrollments.update', $enrollments->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="enroll_no">Enroll No</label>
                            <input type="text" id="enroll_no" name="enroll_no" class="form-control"
                                value="{{ $enrollments->enroll_no }}">
                        </div>
                        <div class="form-group">
                            <label for="batches_id">Batch</label>
                            <select id="batches_id" name="batches_id" class="form-control">
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch->id }}"
                                        {{ $enrollments->batches_id == $batch->id ? 'selected' : '' }}>{{ $batch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_id">Student</label>
                            <select id="student_id" name="student_id" class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $enrollments->student_id == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="join_date">Join Date</label>
                            <input type="date" id="join_date" name="join_date" class="form-control"
                                value="{{ $enrollments->join_date }}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" id="fee" name="fee" class="form-control"
                                value="{{ $enrollments->fee }}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
@endsection
