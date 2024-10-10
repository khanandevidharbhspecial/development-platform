
@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
          <li class="breadcrumb-item">Products</li>
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
                        <form class="row g-3" method="POST" action="" >
                            @csrf

                            <div class="col-md-6">
                                <label for="inputAddress5" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputAddres5s"  name="name" placeholder="Add product" required>
                              </div>

                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Category Name</Label>
                                <select name="category_id" id="category_id" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-3">
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