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
                            <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <h3>Personal Info:</h3
      >
      <span>First Name : {{ session('personalinfo.first_name')  }} </span></br/>
      <span>Last Name : {{ session('personalinfo.last_name')  }} </span></br/>
      <span>Date of Birth : {{ session('personalinfo.birthdate')  }} </span></br/>
      <span>Address : {{ session('personalinfo.address')  }} </span></br/>
      <h3>Contact Information :</h3
      >
      <span>Email Adress : {{ session('contact_detail.email')  }} </span></br/>
      <span>Phone Number : {{ session('contact_detail.phone_number')  }} </span></br/>

      <h3>Review Details:</h3>
      <span id="modalRating">Rating: </span><br/>
    <span id="modalContent">Content: </span><br/>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
                            
                            <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-primary" onclick="updateModalContent()" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Preview
</button>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function updateModalContent() {
    var rating = document.getElementById('rating').value;
    var content = document.getElementById('content').value;

    document.getElementById('modalRating').textContent = 'Rating: ' + rating;
    document.getElementById('modalContent').textContent = 'Content: ' + content;
}
</script>

@endsection
