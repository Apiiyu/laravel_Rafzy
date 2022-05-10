@extends('layouts.app')
@section('title', 'Dashboard - Lifecare')

@section('content')
    <section id="dashboard" class="mt-5">
        <header class="filter-data">
            @if (session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="d-flex justify-content-between">
                <div class="searching d-flex">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <div class="input-group mb-3">
                        <input type="search" class="form-control" placeholder="Search..." aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <div class="create">
                    <a class="btn btn-primary btn-sm" href="{{ route('hospital.create') }}">
                        Create new data
                    </a>
                </div>
            </div>
        </header>

        <section id="table" class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Patient</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Patien Hospital</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <th scope="row">{{ $index+1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->hospital->name }}</td>
                            <td>

                                <a href="{{ route('hospital-custom-edit', $item->id) }}" class="btn btn-primary btn-sm"> Edit </a>
                                <button id="btnDelete" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </section>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {

            $('button').click(() => {
                if (confirm('Are you sure delete this data patient?')) {
                    $.ajax({
                        url: "{{ route('hospital-delete', $item->id) }}",
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: () => {
                            window.location.href = "{{ route('hospital.index') }}";
                        }
                    })
                }
            })
        })
    </script>
@endpush
