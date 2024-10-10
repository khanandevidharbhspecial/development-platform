
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add IngredientCategory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Categories</li>
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
        <div class="col-10">
          <label for="inputAddress5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputAddres5s"  name="name" placeholder="Enter category" required>
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Status</label>
            <select id="inputState" class="form-select" name="status">
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
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