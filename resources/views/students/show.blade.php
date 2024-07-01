@extends('layout.app')

@section('navbar')
    @include('components.navbar')
@endsection

@section('sidebar')
    @include('components.sidebar')
@endsection

@section('show')
    <div class="col-12">
        <h2 class="h3 mb-4 page-title">View Student</h2>
        <div class="row mt-5 align-items-center">
            <div class="col-md-3 text-center mb-5">
                <div class="avatar avatar-xl">
                    <img src="{{ url('assets/images/doc.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="col">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h4 class="mb-1">{{ $students->name }}</h4>
                        <div class="row ml-1">
                            <p class="small"><span class="badge badge-dark">{{ $students->address }},</span></p>
                            <p class="small"><span class="badge badge-dark">{{ $students->mobile }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7">
                        <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl
                            ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam,
                            malesuada vitae risus at, pretium blandit sapien. </p>
                    </div>
                    <div class="col">
                        <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                        <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                        <p class="small mb-0 text-muted">(537) 315-1481</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ml-1"><a href="{{ url('/students') }}"
                class="btn mb-2 btn-primary d-flex justify-content-between align-items-center"><i
                    class="fe fe-24 fe-arrow-left mr-2" style="font-size:20px; "></i>Back
                home</a></div>
    </div>
@endsection
