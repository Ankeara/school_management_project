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
            <h2 class="mb-2 page-title">Payments Page</h2>
            <a href="{{ url('/payments') }}" class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Payments</strong>
            </div>
            <div class="card-body">
                <div class="row col-12">
                    <form action="{{ url('payments/' . $payments->id) }}" method="POST">
                        <div>
                            {!! csrf_field() !!}
                            @method('PATCH')
                            <div class="form-group mb-3">
                                <label for="enroll_no">Enrollment no</label>
                                <select id="enrollment_id" name="enrollment_id" class="form-control col-12">
                                    @foreach ($enrollments as $enrollment)
                                        <option value="{{ $enrollment->id }}">{{ $enrollment->enroll_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="paid_date">Paid date</label>
                                <input type="date" id="paid_date" value="{{ $payments->paid_date }}" name="paid_date"
                                    class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group mb-3">
                                <label for="amount">Amount</label>
                                <input type="text" id="amount" value="{{ $payments->amount }}" name="amount"
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
