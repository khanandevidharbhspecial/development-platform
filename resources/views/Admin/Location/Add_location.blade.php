
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Location</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Locations</li>
          <li class="breadcrumb-item">Add</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        
<div class="card">
    <div class="card-body">
      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="">
        @csrf
        <div class="col-12">
          <label for="inputAddress5" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddres5s"  name="address" placeholder="1234 Main St" required>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Landmark</label>
          <input type="text" class="form-control" id="inputAddress2" name="landmark" placeholder="Apartment, studio, or floor" required>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity" name="city" required>
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">State</label>
          <select id="inputState" class="form-select" name="state">
            <option selected>Choose...</option>
            <option value="Maharashtra">Maharashtra</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Zip Code</label>
          <input type="text" class="form-control" id="inputZip" name="zip" required>
        </div>
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>

</div>

</section>
</main>

@endsection
