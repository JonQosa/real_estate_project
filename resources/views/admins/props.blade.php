@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <!-- Display success messages -->
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! Session::get('success') !!}</p>
                </div>
                @endif
                @if(Session::has('gallery_success'))
                <div class="alert alert-success">
                    <p>{!! Session::get('gallery_success') !!}</p>
                </div>
                @endif
                @if(Session::has('delete'))
                <div class="alert alert-success">
                    <p>{!! Session::get('delete') !!}</p>
                </div>
                @endif

                <h5 class="card-title mb-4 d-inline">Properties</h5>
                <a href="{{ route('props.create') }}" class="btn btn-primary mb-4 float-right">Create Properties</a>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary mb-4 float-right mr-2">Create Gallery</a>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Home Type</th>
                            <th scope="col">Type</th>
                            <th scope="col">City</th>
                            <th scope="col">Actions</th> <!-- Updated column heading -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($props as $prop)
                        <tr>
                            <th scope="row">{{ $prop->id }}</th>
                            <td>{{ $prop->title }}</td>
                            <td>{{ $prop->price }}</td>
                            <td>{{ $prop->home_type }}</td>
                            <td>{{ $prop->type }}</td>
                            <td>{{ $prop->city }}</td>
                            <td>
                                <!-- Update button -->
                                <a href="{{ route('props.edit', $prop->id) }}" class="btn btn-warning text-center">Update</a>
                                <!-- Delete button -->
                                <a href="{{ route('props.delete', $prop->id) }}" class="btn btn-danger text-center ml-2">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
