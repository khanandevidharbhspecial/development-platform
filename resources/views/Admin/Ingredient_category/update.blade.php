
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update IngredientCategory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Categories</li>
          <li class="breadcrumb-item">Update</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
  
<div class="card">
    <div class="card-body">
      

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('change',['id'=>$ingredientcategory->id])}}">
        @csrf
        <div class="col-10">
          <label for="inputAddress5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputAddres5s"  name="name" value="{{$ingredientcategory->name}}" required>
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Status</label>
            <select id="inputState" class="form-select" name="status">
              <option value="Active" {{$ingredientcategory->status=='Active'?'selected':''}}>Active</option>
              <option value="Inactive" {{$ingredientcategory->status=='Inactive'?'selected':''}}>Inactive</option>
            </select>
          </div>
       
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>

</div>

</section>
</main>
@endsection