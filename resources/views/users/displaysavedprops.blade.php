@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="site-blocks-cover inner-page-cover overlay"
     style="background-image: url('{{ asset('assets/images/hero_bg_2.jpg') }}');" 
     data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                <h1 class="mb-2">All Saved Properties</h1>
                {{-- <p class="mb-5">
                    <strong class="h2 text-success font-weight-bold">${{ number_format($singleProp->price, 2) }}</strong>
                </p> --}}
            </div>
        </div>
    </div>
</div> <!-- Removed extra closing </div> here -->

<!-- Properties Section -->
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>All Saved Properties</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            @if($allSavedProps->count() > 0)
                @foreach ($allSavedProps as $savedProp)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $savedProp->id) }}" class="property-thumbnail">
                                <img src="{{ asset('assets/images/' . $savedProp->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <h2 class="property-title">
                                    <a href="{{ route('single.prop', $savedProp->id) }}">{{ $savedProp->title }}</a>
                                </h2>
                                <span class="property-location d-block mb-3">
                                    <span class="property-icon icon-room"></span> {{ $savedProp->location }}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">
                                    ${{ number_format($savedProp->price, 2) }}
                                </strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <!-- Add property specs here if needed -->
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <h4 class="text-center">There are no saved properties for now</h4>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
