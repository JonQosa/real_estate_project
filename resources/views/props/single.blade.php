@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="site-blocks-cover inner-page-cover overlay"
     style="background-image: url({{ asset('assets/images/' . $singleProp->image) }});" 
     data-aos="fade">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                <h1 class="mb-2">{{ $singleProp->title }}</h1>
                <p class="mb-5">
                    <strong class="h2 text-success font-weight-bold">${{ number_format($singleProp->price, 2) }}</strong>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Success or Error Messages -->
<div class="container mt-4">
    @if(Session::has('success') || Session::has('save'))
        <div class="alert alert-success">
            <p>{!! Session::get('success') !!}</p>
            <p>{!! Session::get('save') !!}</p>
        </div>
    @endif
</div>

<!-- Property Details Section -->
<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <!-- Main Property Content -->
            <div class="col-lg-8">
                <!-- Property Slider -->
                <div class="slide-one-item home-slider owl-carousel">
                    @foreach($propImages as $propImage)
                        <div>
                            <img src="{{ asset('assets/images_gallery/' . $propImage->image) }}" alt="Image" class="img-fluid">
                        </div>
                    @endforeach
                </div>
                
                <!-- Property Information -->
                <div class="bg-white property-body border-bottom border-left border-right">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <strong class="text-success h1 mb-3">${{ number_format($singleProp->price, 2) }}</strong>
                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">{{ $singleProp->beds }} <sup>+</sup></span>
                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">{{ $singleProp->baths }}</span>
                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">{{ $singleProp->sq_ft }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Property Details -->
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                            <strong class="d-block">{{ $singleProp->home_type }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                            <strong class="d-block">{{ $singleProp->year_built }}</strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                            <strong class="d-block">${{ number_format($singleProp->price_sqft, 2) }}</strong>
                        </div>
                    </div>

                    <!-- More Info -->
                    <h2 class="h4 text-black">More Info</h2>
                    <p>{{ $singleProp->more_info }}</p>

                    <!-- Gallery -->
                    <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Gallery</h2>
                        </div>
                        @foreach ($propImages as $propImage)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="{{ asset('assets/images_gallery/' . $propImage->image) }}" class="image-popup gal-item">
                                    <img src="{{ asset('assets/images_gallery/' . $propImage->image) }}" alt="Image" class="img-fluid">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Contact Agent Form -->
                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                    @if(isset(Auth::user()->id))
                    @if($validateFormCount > 0)
                        <p class="alert alert-success">You already sent a request to this property</p>
                    @else
                        <form method="POST" action="{{ route('insert.request', $singleProp->id) }}" class="form-contact-agent">
                            @csrf
                            <input type="hidden" name="prop_id" value="{{ $singleProp->id }}">
                            <div class="form-group">
                                <label for="agent_name">Agent Name</label>
                                <input type="text" name="agent_name" id="agent_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @error('name')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @error('email')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                                @error('phone')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Send Request">
                            </div>
                        </form>
                    @endif
                    @else
                    <p class="alert alert-danger">Log In to send a request to this property.</p>
                    @endif
                </div>

                <!-- Save Property Form -->
                <div class="bg-white widget border rounded mt-4">
                    <h3 class="h4 text-black widget-title mb-3">Save This Property</h3>
                    @if(isset(Auth::user()->id))

                    @if($validateFormCount > 0)
                        <input type="submit" name="submit" class="btn btn-primary" disabled value="You saved this property">
                    @else
                        <form method="POST" action="{{ route('save.prop', $singleProp->id) }}" class="form-contact-agent">
                            @csrf
                            <input type="hidden" name="prop_id" value="{{ $singleProp->id }}">
                            <input type="hidden" name="title" value="{{ $singleProp->title }}">
                            <input type="hidden" name="image" value="{{ $singleProp->image }}">
                            <input type="hidden" name="location" value="{{ $singleProp->location }}">
                            <input type="hidden" name="price" value="{{ $singleProp->price }}">
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Save Property">
                            </div>
                        </form>
                    @endif
                    @else
                    <p class="alert alert-danger">Log In to save this property</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Properties Section -->
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Related Properties</h2>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            @forelse ($relatedProps as $relatedProp)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="{{ route('single.prop', $relatedProp->id) }}" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-success">Rent</span>
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
        </div>
    </div>
</div>
@endsection
