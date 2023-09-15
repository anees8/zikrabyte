@extends('layouts.app')  <!-- Assuming you have a master layout file -->

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-10">
            <form action="{{ route('users.create.step.two.post') }}" method="POST">
                @csrf
                <div class="progress my-2">
  <div class="progress-bar" role="progressbar" style="width: 33.333%;" aria-valuenow="33.33" aria-valuemin="0" aria-valuemax="100">33.33%</div>
</div>
                <div class="card">
                    <div class="card-header">Step 2: Contact Information</div>
  
                    <div class="card-body">
  

                    <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $contact_detail->email ?? '') }}" placeholder="Enter Your Email">
    @error('email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="phone_number">Phone Number:</label>
    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $contact_detail->phone_number ?? '') }}" placeholder="Enter Your Phone Number">
    @error('phone_number')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('users.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
