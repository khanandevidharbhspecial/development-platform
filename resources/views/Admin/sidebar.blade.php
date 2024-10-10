
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link  {{ request()->url() === url('dashboard') ? 'active' : '' }}" href="{{url('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ request()->url() === url('Location/list') ? 'active' : '' }}" href="{{url('Location/list')}}">
      <i class="bi bi-grid"></i>
          <span>Location</span>
        </a>
      </li>  
      <li class="nav-item ">
        <a class="nav-link " {{ request()->url() === url('Ingredient/list') ? 'active' : 'collapsed' }} data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Stocks</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content " {{ request()->url() === url('Ingredient/list') ? 'show' : 'collapse' }} data-bs-parent="#sidebar-nav">
         
          <li>
            <a class="nav-link {{ request()->url() === url('Ingredientcategory/list') ? 'active' : '' }}"  href="{{url('Ingredientcategory/list')}}">
              <i class="bi bi-circle" class="{{ request()->url() === url('Ingredientcategory/list') ? 'active' : '' }}"></i><span>Ingredient Category</span>
            </a>
          </li>

              <li>
                <a class="nav-link {{ request()->url() === url('Ingredient/list') ? 'active' : '' }}"  href="{{url('Ingredient/list')}}">
                  <i class="bi bi-circle" class="{{ request()->url() === url('Ingredient/list') ? 'active' : '' }}"></i><span>Ingredients</span>
                </a>
              </li>
              <li>
                <a class="nav-link {{ request()->url() === url('Daily_stock/list') ? 'active' : '' }}"  href="{{url('Daily_stock/list')}}">
                  <i class="bi bi-circle" class="{{ request()->url() === url('Daily_stock/list') ? 'active' : '' }}"></i><span>Daily Stocks</span>
                </a>
              </li>
          
            </ul>
      <li class="nav-item">
        <a class="nav-link {{ request()->url() === url('Category/list') ? 'active' : '' }}" href="{{url('Category/list')}}">
          <i class="bi bi-grid"></i>
          <span>Category</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('')}}">
          <i class="bi bi-grid"></i>
          <span>Product</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('index')}}">
          <i class="bi bi-grid"></i>
          <span>Production</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('')}}">
          <i class="bi bi-grid"></i>
          <span>Sales</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('')}}">
          <i class="bi bi-grid"></i>
          <span>Reports</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " href="{{url('')}}">
          <i class="bi bi-grid"></i>
          <span>Contact Us</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->