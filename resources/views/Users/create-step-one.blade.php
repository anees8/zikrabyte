@extends('layouts.app')  <!-- Assuming you have a master layout file -->

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('users.create.step.one.post') }}" method="POST">
                @csrf
                <div class="progress my-2">
  <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
                <div class="card">
                
                    <div class="card-header">Step 1: Personal Info</div>
  
                    <div class="card-body">
  
                    <div class="form-group">
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $personalinfo->first_name ?? '') }}">
    @error('first_name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $personalinfo->last_name ?? '') }}">
    @error('last_name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="birthdate">Birthdate:</label>
    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate"  value="{{ old('birthdate', $personalinfo->birthdate ?? '') }}">
    @error('birthdate')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter Your Address">{{ old('address', $personalinfo->address ?? '') }}</textarea>
    @error('address')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


                            
                          
                    </div>
  
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
