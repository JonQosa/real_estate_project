@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Property</h5>

                <!-- Display validation errors -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('props.update', $prop->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $prop->title }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $prop->price }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="beds" class="form-label">Beds</label>
                        <input type="number" class="form-control" id="beds" name="beds" value="{{ $prop->beds }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="baths" class="form-label">Baths</label>
                        <input type="number" class="form-control" id="baths" name="baths" value="{{ $prop->baths }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="sq_ft" class="form-label">sq_ft</label>
                        <input type="number" class="form-control" id="sq_ft" name="sq_ft" value="{{ $prop->sq_ft }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="year_built" class="form-label">Year Built</label>
                        <input type="number" class="form-control" id="year_built" name="year_built" value="{{ $prop->year_built }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="price_sqft" class="form-label">Price sq_ft</label>
                        <input type="number" class="form-control" id="price_sqft" name="price_sqft" value="{{ $prop->price_sqft }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $prop->location }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="home_type" class="form-label">Home Type</label>
                        <input type="text" class="form-control" id="home_type" name="home_type" value="{{ $prop->home_type }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="{{ $prop->type }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $prop->city }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="agent_name" class="form-label">Agent Name</label>
                        <input type="text" class="form-control" id="agent_name" name="agent_name" value="{{ $prop->agent_name }}" required>
                    </div>
                
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if ($prop->image)
                            <img src="{{ asset('assets/images/' . $prop->image) }}" alt="Current Image" class="mt-2" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update Property</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
