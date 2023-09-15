@extends('layouts.app')  <!-- Assuming you have a master layout file -->

@section('content')<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('users.create.step.three.post') }}" method="post" >
                {{ csrf_field() }}
                <div class="progress my-2">
  <div class="progress-bar" role="progressbar" style="width: 66.66%;" aria-valuenow="66.66" aria-valuemin="0" aria-valuemax="100">66.66%</div>
</div>
                <div class="card">
                    <div class="card-header">Step 3: Review Details</div>
   
                    <div class="card-body">
  
                    <div class="form-group">
    <label for="rating">Rating:</label>
    <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating', $review->rating ?? '') }}" placeholder="Enter Your Rating">
    @error('rating')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="content">Content:</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Enter Your Content">{{ old('content', $review->content ?? '') }}</textarea>
    @error('content')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('users.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
