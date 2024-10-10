@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Products List</li>
           </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a href="{{url('Product/add')}}" class="btn btn-rounded btn-success">Add Products</a>
            </div>
            <div class="card">
                
              <div class="card-body">
                <h5 class="card-title">Products</h5>
                    
                    <form>
              
                    <div class="row mb-4">
                        <div class="col-sm-1 p-1">
                            <select id="per_page" name="per_page" class="form-select custom-select">
                                @foreach($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $option == $products->perPage() ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-10 p-0">
                            <label class="col-sm-2 col-form-label">entries per page</label>
                        </div>
                    </div>
                </form>
 

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <a href="update/{{$product->id}}" class="btn btn-info btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="delete/{{$product->id}}" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="float-left col-3">
                        
                                <ul class="pagination">
                                 <div>
                                    Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                                </div>
                            </ul>
                      
                        </div>
                        <div class="float-right col-9">
                        
                            <ul class="pagination justify-content-end">                    
                                {{ $products->links('pagination::bootstrap-4') }} 
                            </ul>
                        </div>      </div>
                  <!-- End Right/End Aligned Pagination -->

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</main>



    @endsection