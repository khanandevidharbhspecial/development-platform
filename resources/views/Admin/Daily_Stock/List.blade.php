@extends('Admin.master')
@section('Admin.dynamic')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daily Stocks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('index')}}">Dashboard</a></li>
          <li class="breadcrumb-item">Daily Stocks List</li>
           </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a href="{{url('Daily_stock/add')}}" class="btn btn-rounded btn-success">Add Daily Stock</a>
            </div>
            <div class="card">
                
              <div class="card-body">
                <h5 class="card-title">Daily Stocks</h5>
                    
                    <form>
              
                    <div class="row mb-4">
                        <div class="col-sm-1 p-1">
                            <select id="per_page" name="per_page" class="form-select custom-select">
                                @foreach($perPageOptions as $option)
                                    <option value="{{ $option }}" {{ $option == $dailystocks->perPage() ? 'selected' : '' }}>{{ $option }}</option>
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
                                <th>id</th>
                                <th>ingredient_name</th>
                                <th>quantity</th>
                                <th>unit</th>
                                <th>date_time</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($dailystocks as $dailystock)
                                <tr>
                                    <td>{{ $dailystock->id }}</td>
                                    <td>{{$dailystock->ingredient->name}}</td>
                                    <td>{{ $dailystock->quantity }}</td>
                                    <td>{{ $dailystock->unit}}</td>
                                    <td>{{ $dailystock->date_time}}</td>

                                    <td>
                                        <a href="delete/{{$dailystock->id}}" class="btn btn-danger btn-sm">
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
                                    Showing {{ $dailystocks->firstItem() }} to {{ $dailystocks->lastItem() }} of {{ $dailystocks->total() }} entries
                                </div>
                            </ul>
                      
                        </div>
                        <div class="float-right col-9">
                        
                            <ul class="pagination justify-content-end">                    
                                {{ $dailystocks->links('pagination::bootstrap-4') }} 
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