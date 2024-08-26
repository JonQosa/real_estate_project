@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Login</h5>

                <!-- Display validation errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" class="p-auto" action="{{ route('check.login') }}">
                    @csrf

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="form-check mb-4">
                        <input type="checkbox" name="remember_me" id="rememberMe" class="form-check-input" />
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
