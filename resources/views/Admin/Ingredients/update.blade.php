
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Ingredients</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Ingredients</li>
          <li class="breadcrumb-item">Update</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
  
<div class="card">
    <div class="card-body">
      

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('change',['id'=>$ingredient->id])}}">
        @csrf
        <div class="col-10">
          <label for="inputAddress5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputAddres5s"  name="name" placeholder="" value="{{ $ingredient->name}}" required>
        </div>
        <div class="col-6">
            <label for="inputCity" class="form-label">Initial Stock</label>
            <input type="number" class="form-control" id="inputCity" name="initial_stock" min="0" value="{{$ingredient->initial_stock}}" required>
          </div>
          
        <div class="col-md-4">
            <label for="inputState" class="form-label">Unit</label>
            <select id="inputState" class="form-select" name="unit">
              <option value="kg" {{$ingredient->unit=='kg'?'selected':''}}>Kilogram</option>
              <option value="gm" {{$ingredient->unit=='gm'?'selected':''}}>Gram</option>
              <option value="ltr" {{$ingredient->unit=='ltr'?'selected':''}}>Litre</option>
              <option value="dz" {{$ingredient->unit=='dz'?'selected':''}}>Dozen</option>
              <option value="piece" {{$ingredient->unit=='piece'?'selected':''}}>Piece</option>
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