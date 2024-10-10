
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Daily Stocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Daily Stocks</li>
          <li class="breadcrumb-item">Add</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
      

                        <!-- Multi Columns Form -->
                        <form class="row" method="POST" action="" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Ingredient name</Label>
                                <select name="ingredient_id" id="ingredient_id" class="form-select">
                                    @foreach($ingredients as $ingredient)
                                        <option data-unit="{{$ingredient->unit}}" value="{{$ingredient->id}}">{{$ingredient->name}}({{$ingredient->unit}})</option>
                                    @endforeach
                                </select>
                            </div>
                         
                            <div class="col-md-4">
                                <label for="inputCity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="inputCity" name="quantity" min="0" required>
                            </div>

                            <div class="col-md-4" id="stockUnitSelect" style="display: none;">
                                <label for="inputState" class="form-label">Unit</Label>
                                <select name="unit" id="unit" class="form-select">
                                </select>
                            </div>

                            <div class="col-12 mt-2">
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form><!-- End Multi Columns Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection