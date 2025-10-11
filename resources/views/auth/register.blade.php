///<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register | Wan Lanka</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Google Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <style>
    :root{
      --bg:#e6f0fa; --card:#ffffff; --text:#0f172a; --muted:#667085; --border:#e6eaf2;
      --brand1:#0072ff; --brand2:#00cc88; --primary:#00aaff; --primary-2:#00cc88;
      --shadow:0 16px 50px rgba(2,6,23,.12);
    }
    *{ font-family:'Poppins',sans-serif; box-sizing:border-box; }
    body{
      min-height:100dvh;
      background:
        radial-gradient(900px 600px at -10% -10%, rgba(0,114,255,.18), transparent 60%),
        radial-gradient(900px 600px at 110% 0%, rgba(0,204,136,.14), transparent 65%),
        var(--bg);
      color:var(--text);
    }

    .shell{max-width:1100px;margin:22px auto 50px;padding:0 14px}
    .grid{
      display:grid; grid-template-columns:420px 1fr; gap:0;
      border-radius:20px; overflow:hidden; box-shadow:var(--shadow); border:1px solid var(--border);
      background:var(--card);
    }

    /* Left slider panel */
    .side{
      position:relative; min-height:640px; background:#000; color:#fff;
    }
    .side .overlay{
      position:absolute; inset:0;
      background:linear-gradient(180deg, rgba(0,0,0,.35), rgba(0,0,0,.55));
      pointer-events:none;
    }
    .slide-caption{
      position:absolute; left:18px; right:18px; bottom:18px; z-index:2;
      display:flex; justify-content:space-between; align-items:end; gap:12px;
    }
    .slide-title{font-weight:800; font-size:1.15rem; line-height:1.2}
    .slide-chip{
      background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.30);
      padding:.35rem .7rem; border-radius:999px; font-weight:700; font-size:.85rem
    }
    .logo-small{
      position:absolute; left:14px; top:14px; z-index:2;
      display:flex; align-items:center; gap:8px; color:#fff;
      background:rgba(255,255,255,.14); border:1px solid rgba(255,255,255,.30);
      border-radius:12px; padding:6px 10px;
    }
    .logo-small img{width:30px;height:30px;object-fit:contain;background:#fff;border-radius:8px;padding:4px}

    /* Right form card (compact) */
    .card{padding:18px 18px 10px; background:#fff; min-height:640px; display:flex; flex-direction:column}
    .head{display:flex; align-items:center; justify-content:space-between; gap:12px; border-bottom:1px solid var(--border); padding-bottom:10px}
    .title{font-size:1.25rem; font-weight:800}
    .subtitle{font-size:.92rem; color:var(--muted)}
    .content{padding-top:14px}
    .section{background:#f9fcff;border:1px solid var(--border);border-radius:14px;padding:14px;margin-bottom:12px}

    .form-label{font-weight:700; margin-bottom:6px}
    .form-control,.form-select{border-radius:12px; border:1px solid #ced4da; padding:10px 12px}
    .form-control::placeholder{color:#9aa6b2}
    .with-icon{position:relative}
    .with-icon svg{position:absolute;left:10px;top:50%;transform:translateY(-50%);opacity:.6}
    .with-icon input{padding-left:38px}

    .row-2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    .actions{margin-top:auto;display:flex;justify-content:flex-end;gap:10px;padding:10px 0}
    .btn-pill{border-radius:999px;padding:.75rem 1.05rem;font-weight:800}
    .btn-primary{
      background:linear-gradient(135deg,var(--primary),var(--primary-2));
      border:0;color:#062a3f;box-shadow:0 12px 24px rgba(0,170,255,.20)
    }
    .btn-outline{background:#fff;border:1px solid var(--brand1); color:var(--brand1)}
    .btn-outline:hover{background:var(--brand1); color:#fff}

    .foot-note{color:var(--muted); text-align:center; padding:0 0 14px}

    @media (max-width: 980px){
      .grid{grid-template-columns:1fr}
      .side{min-height:280px}
      .card{padding:16px}
      .row-2{grid-template-columns:1fr}
    }
  </style>
</head>
<body>

{{-- Top navigation --}}
@includeIf('include.Header')

<div class="shell">
  <div class="grid">

    {{-- LEFT: Slider --}}
    <aside class="side">
      <div class="logo-small">
        <img src="{{ asset('images/wanlanka_logo.png') }}" alt="WanLanka">
        <strong>Wan Lanka</strong>
      </div>

      <div id="heroSlider" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-inner h-100">

          <div class="carousel-item active h-100">
            <img class="d-block w-100 h-100" style="object-fit:cover"
                 src="{{ asset('images/slider/1.jpg') }}" alt="Sri Lankan coast">
            <div class="overlay"></div>
            <div class="slide-caption">
              <div class="slide-title">Sun-kissed Coastlines</div>
              <span class="slide-chip">Beach</span>
            </div>
          </div>

          <div class="carousel-item h-100">
            <img class="d-block w-100 h-100" style="object-fit:cover"
                 src="{{ asset('images/slider/2.jpg') }}" alt="Hill country">
            <div class="overlay"></div>
            <div class="slide-caption">
              <div class="slide-title">Mist over the Hills</div>
              <span class="slide-chip">Mountains</span>
            </div>
          </div>

          <div class="carousel-item h-100">
            <img class="d-block w-100 h-100" style="object-fit:cover"
                 src="{{ asset('images/slider/3.jpg') }}" alt="Cave temples">
            <div class="overlay"></div>
            <div class="slide-caption">
              <div class="slide-title">Ancient Cave Sanctuaries</div>
              <span class="slide-chip">Heritage</span>
            </div>
          </div>

          <div class="carousel-item h-100">
            <img class="d-block w-100 h-100" style="object-fit:cover"
                 src="{{ asset('images/slider/temple.jpg') }}" alt="Cultural sites">
            <div class="overlay"></div>
            <div class="slide-caption">
              <div class="slide-title">Timeless Culture</div>
              <span class="slide-chip">Culture</span>
            </div>
          </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

      </div>
    </aside>

    {{-- RIGHT: Compact Register Form --}}
    <section class="card">
      <div class="head">
        <div>
          <div class="title">Create account</div>
          <div class="subtitle">Only a few details to get started.</div>
        </div>
      </div>

      @if(session('success')) <div class="alert alert-success mt-3">{{ session('success') }}</div> @endif
      @if(session('error'))   <div class="alert alert-danger  mt-3">{{ session('error') }}</div>   @endif
      @if($errors->any())
        <div class="alert alert-danger mt-3">
          <strong>Please fix the following:</strong>
          <ul class="mb-0 mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
      @endif

      <form class="content" action="{{ route('register') }}" method="POST" novalidate>
        @csrf

        <div class="section">
          <div class="mb-2">
            <label class="form-label">Full Name</label>
            <div class="with-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Zm0 2c-5 0-9 2.5-9 5.5V21h18v-1.5C21 16.5 17 14 12 14Z" fill="currentColor"/></svg>
              <input type="text" name="name" class="form-control" placeholder="Your full name" value="{{ old('name') }}" required>
            </div>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
          </div>

          <div class="row-2">
            <div>
              <label class="form-label">Email Address</label>
              <div class="with-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M4 6h16a2 2 0 0 1 2 2v.3l-10 6.4L2 8.3V8a2 2 0 0 1 2-2Z" fill="currentColor"/><path d="M22 10.1V16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5.9" fill="currentColor" opacity=".5"/></svg>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old('email') }}" required>
              </div>
              @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div>
              <label class="form-label">Phone (WhatsApp/SMS)</label>
              <div class="with-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M6.6 10.7a8.1 8.1 0 0 0 6.7 6.7l1.9-1.9a1 1 0 0 1 1.1-.23 12.7 12.7 0 0 0 3.9.63 1 1 0 0 1 1 1V20a2 2 0 0 1-2 2A16 16 0 0 1 2 8a2 2 0 0 1 2-2h2.1a1 1 0 0 1 1 1 12.7 12.7 0 0 0 .63 3.9 1 1 0 0 1-.23 1.1Z" fill="currentColor"/></svg>
                <input type="tel" name="phone" class="form-control" placeholder="+94 7X XXX XXXX" value="{{ old('phone') }}" required>
              </div>
              <div class="form-text">Use country code (e.g., +94 for Sri Lanka).</div>
              @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
          </div>

          <div class="row-2 mt-1">
            <div>
              <label class="form-label">Password</label>
              <div class="with-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M17 9V7a5 5 0 0 0-10 0v2H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-2ZM9 7a3 3 0 0 1 6 0v2H9Z" fill="currentColor"/></svg>
                <input type="password" name="password" class="form-control" placeholder="Create a password" autocomplete="new-password" required>
              </div>
              @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div>
              <label class="form-label">Confirm Password</label>
              <div class="with-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M17 9V7a5 5 0 0 0-10 0v2" stroke="currentColor" stroke-width="2" fill="none" opacity=".5"/></svg>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" autocomplete="new-password" required>
              </div>
            </div>
          </div>
        </div>

        <div class="section">
          <div class="row-2">
            <div>
              <label class="form-label">Province</label>
              <select name="province" id="province" class="form-select" required>
                <option value="" disabled {{ old('province') ? '' : 'selected' }}>Select province</option>
              </select>
              @error('province') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div>
              <label class="form-label">District</label>
              <select name="district" id="district" class="form-select" required>
                <option value="" disabled {{ old('district') ? '' : 'selected' }}>Select district</option>
              </select>
              @error('district') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
          </div>

          <div class="mt-2">
            <label class="form-label">Home Address</label>
            <input type="text" name="address" class="form-control" placeholder="House No, Street, Town" value="{{ old('address') }}" required>
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
          </div>
        </div>

        <div class="actions">
          <a href="{{ route('login') }}" class="btn btn-outline btn-pill">Back to Login</a>
          <button type="submit" class="btn btn-primary btn-pill">Create Account</button>
        </div>
      </form>

      <div class="foot-note">
        Already have an account?
        <a href="{{ route('login') }}" class="fw-bold" style="color:var(--brand1)">Sign in</a>
      </div>
    </section>

  </div>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* Sri Lanka Provinces -> Districts (dependent dropdown) */
const SL_MAP = {
  "Western": ["Colombo","Gampaha","Kalutara"],
  "Central": ["Kandy","Matale","Nuwara Eliya"],
  "Southern": ["Galle","Matara","Hambantota"],
  "Northern": ["Jaffna","Kilinochchi","Mannar","Vavuniya","Mullaitivu"],
  "Eastern": ["Batticaloa","Ampara","Trincomalee"],
  "North Western": ["Kurunegala","Puttalam"],
  "North Central": ["Anuradhapura","Polonnaruwa"],
  "Uva": ["Badulla","Monaragala"],
  "Sabaragamuwa": ["Ratnapura","Kegalle"]
};

const provinceEl   = document.getElementById('province');
const districtEl   = document.getElementById('district');
const oldProvince  = @json(old('province'));
const oldDistrict  = @json(old('district'));

function fillProvinces() {
  provinceEl.innerHTML = '<option value="" disabled>Select province</option>';
  Object.keys(SL_MAP).forEach(p => {
    const opt = document.createElement('option');
    opt.value = p; opt.textContent = p;
    if (oldProvince && oldProvince === p) opt.selected = true;
    provinceEl.appendChild(opt);
  });
}

function fillDistricts(province) {
  districtEl.innerHTML = '<option value="" disabled>Select district</option>';
  (SL_MAP[province] || []).forEach(d => {
    const opt = document.createElement('option');
    opt.value = d; opt.textContent = d;
    if (oldDistrict && oldDistrict === d) opt.selected = true;
    districtEl.appendChild(opt);
  });
}

fillProvinces();
if (oldProvince) fillDistricts(oldProvince);

provinceEl.addEventListener('change', e => fillDistricts(e.target.value));
</script>

@includeIf('include.footer')
</body>
</html>
