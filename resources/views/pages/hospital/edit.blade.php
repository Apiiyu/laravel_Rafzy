@extends('layouts.app')
@section('title', 'Create Data - Lifecare')

@section('content')
    <section id="create" class="mt-5">
        <div class="breadcrumb">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('hospital.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Data</li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center align-items-center align-content-center mt-2">
            <div class="col-8">
                <h3 class="title">Patient {{ $item->name }}</h3>

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('hospital.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group mt-5">
                        <div class="row">
                            <div class="col-2">
                                <label for="name">Name</label>
                            </div>

                            <div class="col-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" placeholder="Enter name patient">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-2">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="address" name="address" value="{{ $item->address }}" placeholder="Enter address">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-2">
                                <label for="phone">Phone</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $item->phone }}" placeholder="Enter phone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <div class="row">
                            <div class="col-2">
                                <label for="hospital">Hospital</label>
                            </div>
                            <div class="col-10">
                                <select class="form-control" id="hospital" name="hospital_id">
                                    <option value="" selected>Select Hospital ...</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3 mb-5">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('hospital-data') }}',
                type: 'GET',
                dataType: 'json',
                success: (result) => {
                    result.forEach(result => {
                        $('#hospital').append(`<option value="${result.id}">${result.name}</option>`);
                    });
                }
            })
        });
    </script>
@endpush
