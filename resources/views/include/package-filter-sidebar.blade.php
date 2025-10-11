<!-- resources/views/include/package-filter-sidebar.blade.php -->

<div class="filter-widget" id="filterWidget">
  <!-- mobile toggle -->
  <button class="filter-toggle" id="filterToggle" aria-label="Show filters">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
      <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
    </svg>
    <span>Filters</span>
  </button>

  <!-- sticky sidebar -->
  <aside class="filter-sidebar card" id="filterSidebar">
    <div class="sidebar-head">
      <h3>Filter Packages</h3>
      <button class="close-sidebar" id="closeSidebar">&times;</button>
    </div>

    <form id="package-filter-form" autocomplete="off">
      <!-- Budget -->
      <div class="filter-block">
        <h5>Budget</h5>
        <div class="range-field">
          <label for="min_price" class="form-label">Min Price</label>
          <input type="number" class="form-control" id="min_price" name="min_price" min="0" step="1" placeholder="0">
        </div>
        <div class="range-field">
          <label for="max_price" class="form-label">Max Price</label>
          <input type="number" class="form-control" id="max_price" name="max_price" min="0" step="1" placeholder="No limit">
        </div>
      </div>

      <!-- Rating -->
      <div class="filter-block">
        <h5>Rating</h5>
        <div class="star-rating">
          @for($i=0;$i<=5;$i++)
            <input type="radio" name="min_rating" value="{{$i}}" id="star{{$i}}" {{$i==0?'checked':''}}>
            <label for="star{{$i}}">
              @if($i==0)
                <span class="any">Any</span>
              @else
                @for($s=1;$s<=$i;$s++)<span class="star">★</span>@endfor
              @endif
            </label>
          @endfor
        </div>
      </div>

      <!-- Days -->
      <div class="filter-block">
        <h5>Trip Duration</h5>
        <select class="form-select" id="days" name="days">
          <option value="">Any duration</option>
          <option value="1">1 day</option>
          <option value="2">2 days</option>
          <option value="3">3 days</option>
          <option value="4">4 days</option>
          <option value="5,15">5 – 15 days</option>
          <option value="16,999">16+ days</option>
        </select>
      </div>

      <!-- Actions -->
      <div class="filter-actions">
        <button type="submit" class="btn btn-filter w-100">Apply Filters</button>
        <button type="button" id="reset-filters" class="btn btn-reset w-100">Reset</button>
      </div>
    </form>
  </aside>

  <!-- overlay for mobile -->
  <div class="filter-overlay" id="filterOverlay"></div>
</div>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<!-- Styles -->
<style>
/* ---------- ROOT ---------- */
:root{
  --primary:#667eea;
  --primary-dark:#764ba2;
  --danger:#ff4757;
  --gray:#6c757d;
  --light:#f8f9fa;
  --white:#ffffff;
  --radius:16px;
  --transition:.3s ease;
  --shadow:0 5px 25px rgba(0,0,0,.08);
  --shadow-hover:0 8px 35px rgba(0,0,0,.14);
}

/* ---------- WIDGET ---------- */
.filter-widget{position:relative;font-family:'Poppins',sans-serif}

/* toggle button (mobile) */
.filter-toggle{
  display:none;
  align-items:center;
  gap:8px;
  background:var(--white);
  border:1px solid #dee2e6;
  padding:10px 18px;
  border-radius:var(--radius);
  font-weight:500;
  cursor:pointer;
  box-shadow:var(--shadow);
  transition:var(--transition);
}
.filter-toggle:hover{border-color:var(--primary);color:var(--primary)}

/* sidebar */
.filter-sidebar{
  width:280px;
  background:var(--white);
  border:none;
  border-radius:var(--radius);
  box-shadow:var(--shadow);
  padding:28px;
  position:sticky;
  top:30px;
  transition:var(--transition);
}
.sidebar-head{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:24px;
}
.sidebar-head h3{
  font-size:1.4rem;
  font-weight:600;
  color:#2d3436;
}
.close-sidebar{
  display:none;
  background:none;
  border:none;
  font-size:2rem;
  color:var(--gray);
  cursor:pointer;
  line-height:1;
}

/* filter blocks */
.filter-block{margin-bottom:24px}
.filter-block h5{
  font-size:1rem;
  font-weight:500;
  margin-bottom:12px;
  color:#495057;
}
.range-field{margin-bottom:12px}
.form-label{font-size:.9rem;margin-bottom:6px;color:var(--gray)}
.form-control,.form-select{
  width:100%;
  padding:10px 14px;
  border:1px solid #ced4da;
  border-radius:8px;
  font-size:.95rem;
  transition:var(--transition);
}
.form-control:focus,.form-select:focus{
  border-color:var(--primary);
  outline:none;
  box-shadow:0 0 0 3px rgba(102,126,234,.2);
}

/* star rating */
.star-rating{display:flex;gap:8px;flex-wrap:wrap}
.star-rating input{display:none}
.star-rating label{
  cursor:pointer;
  padding:6px 12px;
  border:1px solid #ced4da;
  border-radius:8px;
  font-size:1rem;
  transition:var(--transition);
}
.star-rating label .star{color:#ffc107}
.star-rating label .any{color:var(--gray)}
.star-rating input:checked+label{
  background:var(--primary);
  color:var(--white);
  border-color:var(--primary);
}

/* actions */
.filter-actions{display:flex;flex-direction:column;gap:12px}
.btn{
  padding:12px;
  font-size:1rem;
  font-weight:500;
  border:none;
  border-radius:8px;
  cursor:pointer;
  transition:var(--transition);
}
.btn-filter{
  background:linear-gradient(135deg,var(--primary) 0%,var(--primary-dark) 100%);
  color:var(--white);
  box-shadow:0 4px 20px rgba(102,126,234,.3);
}
.btn-filter:hover{transform:translateY(-2px);box-shadow:0 6px 25px rgba(102,126,234,.4)}
.btn-reset{
  background:var(--white);
  color:var(--danger);
  border:1px solid var(--danger);
}
.btn-reset:hover{background:var(--danger);color:var(--white)}

/* overlay (mobile) */
.filter-overlay{
  display:none;
  position:fixed;
  inset:0;
  background:rgba(0,0,0,.4);
  z-index:998;
}

/* ---------- RESPONSIVE ---------- */
@media (max-width: 992px){
  .filter-toggle{display:inline-flex}
  .filter-sidebar{
    position:fixed;
    top:0;
    left:-280px;
    height:100%;
    z-index:999;
    border-radius:0;
    box-shadow:none;
    overflow-y:auto;
  }
  .filter-sidebar.open{left:0}
  .close-sidebar{display:block}
  .filter-overlay.open{display:block}
}
</style>

<!-- Behaviour -->
<script>
(()=>{
  const toggle   = document.getElementById('filterToggle');
  const sidebar  = document.getElementById('filterSidebar');
  const overlay  = document.getElementById('filterOverlay');
  const closeBtn = document.getElementById('closeSidebar');

  function openSidebar(){
    sidebar.classList.add('open');
    overlay.classList.add('open');
    document.body.style.overflow='hidden';
  }
  function closeSidebar(){
    sidebar.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow='';
  }

  toggle.addEventListener('click', openSidebar);
  closeBtn.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);
})();
</script>
