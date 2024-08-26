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
                <h1 class="mb-2">Properties by Price Descending</h1>
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
                    <h2>Properties by Price Descending</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            @if($propsByPriceDesc->count() > 0)
                @forelse ($propsByPriceDesc as $relatedProp)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $relatedProp->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">{{ $relatedProp->type }}</span>
                                </div>
                                <img src="{{ asset('assets/images/' . $relatedProp->image) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <h2 class="property-title"><a href="{{ route('single.prop', $relatedProp->id) }}">{{ $relatedProp->title }}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $relatedProp->location }}</span>
                                <strong class="property-price text-primary mb-3 d-block text-success">${{ number_format($relatedProp->price, 2) }}</strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $relatedProp->beds }} <sup>+</sup></span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $relatedProp->baths }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $relatedProp->sq_ft }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4 class="text-center">There are no properties for now</h4>
                    </div>
                @endforelse
            @endif
        </div>
    </div>
</div>

@endsection
