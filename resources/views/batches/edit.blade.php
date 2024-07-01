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
            <h2 class="mb-2 page-title">Batches Page</h2>
            <a href="{{ url('/batches') }}" class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Batches</strong>
            </div>
            <div class="card-body">
                <div class="row col-12">
                    <form action="{{ url('batches/' . $batches->id) }}" method="POST">
                        <div>
                            {!! csrf_field() !!}
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $batches->name }}" id="name" name="name"
                                    class="form-control" placeholder="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="course_id">Course</label>
                                <select id="course_id" name="course_id" class="form-control col-12">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="start_date">Start date</label>
                                <input type="date" value="{{ $batches->start_date }}" id="start_date" name="start_date"
                                    class="form-control" placeholder="Phone">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div> <!-- /.col -->
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </div> <!-- .col-12 -->
@endsection
