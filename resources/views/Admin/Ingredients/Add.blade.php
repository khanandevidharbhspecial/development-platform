
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Ingredients</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Ingredients</li>
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
          <input type="text" class="form-control" id="inputAddres5s"  name="name" placeholder="Add ingredient" required>
        </div>

        <div class="col-10">
          <label for="inputState" class="form-label">Ingredient Category</Label>
          <select name="ingredientcategory_id" id="ingredientcategory_id" class="form-select">
              @foreach($ingredientcategories as $ingredientcategory)
                  <option value="{{ $ingredientcategory->id }}">{{ $ingredientcategory->name }}</option>
              @endforeach
          </select>
      </div>

        <div class="col-6">
            <label for="inputCity" class="form-label">Initial Stock</label>
            <input type="number" class="form-control" id="inputCity" name="initial_stock" min="0" required>
          </div>
          
        <div class="col-md-4">
            <label for="inputState" class="form-label">Unit</label>
            <select id="inputState" class="form-select" name="unit">
              <option selected>Choose...</option>
              <option value="kg">Kilogram</option>
              <option value="gm">Gram</option>
              <option value="ltr">Litre</option>
              <option value="PKT">Packet</option>
              <option value="BTL">Bottle</option>
              <option value="Pcs">Pieces</option>
              <option value="CUPS">Cups</option>
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