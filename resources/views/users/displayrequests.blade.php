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
                <h1 class="mb-2">All Requests for Properties</h1>
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
                    <h2>All Requests for Properties</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            @if($allRequests->count() > 0)
                @forelse ($allRequests as $relatedProp)
                    <div class="col-md-6 col-lg-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $relatedProp->prop_id) }}" class="btn btn-access">
                                Go to this Property
                            </a>
                      
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <h4 class="text-center">There are no  requests for now</h4>
                    </div>
                @endforelse
            @endif
        </div>
    </div>
</div>

@endsection
