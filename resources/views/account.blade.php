{{-- resources/views/account.blade.php --}}
@php
    use Illuminate\Support\Facades\Storage;

    $user = auth()->user();

    // Profile photo URL (fallback avatar)
    $pp = ($user && $user->profile_photo && Storage::disk('public')->exists($user->profile_photo))
        ? Storage::url($user->profile_photo)
        : asset('images/avatar-default.png');

    // DOB -> Y-m-d for input
    $dobValue = old('dob');
    if (!$dobValue && $user?->dob) {
        try { $dobValue = \Illuminate\Support\Carbon::parse($user->dob)->format('Y-m-d'); }
        catch (\Throwable $e) { $dobValue = $user->dob; }
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Account | Wan Lanka</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand1:#0072ff; --brand2:#00cc88;
      --bg:#e6f0fa; --card:#ffffff; --muted:#64748b; --text:#0f172a; --border:#e6eaf2;
      --shadow:0 18px 48px rgba(2,6,23,.10);
      --soft:0 10px 28px rgba(2,6,23,.08);
      --radius:22px;
    }
    *{font-family:'Poppins',sans-serif}

    body{
      min-height:100dvh;
      background:
        radial-gradient(900px 600px at -10% -10%, rgba(0,114,255,.18), transparent 60%),
        radial-gradient(900px 600px at 110% 0%, rgba(0,204,136,.14), transparent 65%),
        var(--bg);
    }

    .wrap{max-width:1100px;margin:28px auto 70px;padding:0 16px}
    .card-profile{display:grid;grid-template-columns:320px 1fr;background:var(--card);border:1px solid var(--border);
      border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}

    .panel{
      background:linear-gradient(135deg,var(--brand1),var(--brand2));
      padding:36px 26px; color:#fff; position:relative;
    }
    .avatar{
      width:110px;height:110px;border-radius:50%;object-fit:cover;border:3px solid rgba(255,255,255,.85);
      box-shadow:var(--soft)
    }
    .name{font-weight:800;font-size:1.35rem;margin-top:14px}
    .email{opacity:.95;word-break:break-all}
    .badge-state{
      position:absolute;left:26px;bottom:26px;background:rgba(255,255,255,.16);
      border:1px solid rgba(255,255,255,.35);padding:.45rem .8rem;border-radius:999px;font-weight:700
    }

    .content{padding:28px}
    .content h6{font-weight:800;color:#2b3343;margin:10px 0 12px}
    .row-line{display:grid;grid-template-columns:1fr 1fr;gap:18px}
    .item{background:#f8fafc;border:1px solid var(--border);border-radius:14px;padding:14px 16px}
    .label{font-size:.85rem;color:var(--muted);font-weight:600}
    .value{color:var(--text);font-weight:700}

    .actions{display:flex;gap:10px;margin-top:18px}
    .btn-pill{border-radius:999px;padding:.7rem 1.1rem;font-weight:700}
    .btn-primary{background:linear-gradient(135deg,var(--brand1),var(--brand2));border:0;color:#062a3f}
    .btn-ghost{background:#fff;border:1px solid var(--border);color:var(--text)}

    .form-control,.form-select{border-radius:12px;padding:.75rem;border:1px solid #d8dfea}
    .hidden{display:none!important}

    @media (max-width: 960px){
      .card-profile{grid-template-columns:1fr}
      .panel{display:flex;align-items:center;gap:16px}
      .name{margin-top:0}
      .badge-state{position:static;margin-top:8px}
    }
  </style>
</head>
<body>

@includeIf('include.header')

<div class="wrap">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
      <strong>Please fix the following:</strong>
      <ul class="mb-0 mt-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <div class="card-profile" id="profileCard" data-editing="false">
    {{-- LEFT --}}
    <aside class="panel">
      <img src="{{ $user->profile_photo_url }}" alt="Profile photo" class="avatar" id="avatarPreview">
      <div class="name">{{ $user->name }}</div>
      <div class="email d-flex align-items-center gap-2">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
          <path d="M4 6h16a2 2 0 0 1 2 2v.3l-10 6.4L2 8.3V8a2 2 0 0 1 2-2Z" stroke="#fff" stroke-width="1.5"/>
          <path d="M22 10.1V16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5.9" stroke="#fff" stroke-width="1.5"/>
        </svg>
        <span>{{ $user->email }}</span>
      </div>
      <div class="badge-state">{{ $user->is_verified ? 'Verified' : 'Pending approval' }}</div>
    </aside>

    {{-- RIGHT --}}
    <section class="content">
      {{-- VIEW --}}
      <div id="viewMode">
        <h6>Information</h6>
        <div class="row-line">
          <div class="item">
            <div class="label">Email</div>
            <div class="value">{{ $user->email ?? '—' }}</div>
          </div>
          <div class="item">
            <div class="label">Phone</div>
            <div class="value">{{ $user->phone ?? '—' }}</div>
          </div>
        </div>

        <h6 class="mt-3">Address</h6>
        <div class="row-line">
          <div class="item">
            <div class="label">Province</div>
            <div class="value">{{ $user->province ?? '—' }}</div>
          </div>
          <div class="item">
            <div class="label">District</div>
            <div class="value">{{ $user->district ?? '—' }}</div>
          </div>
        </div>
        <div class="row-line mt-2">
          <div class="item">
            <div class="label">Home Address</div>
            <div class="value">{{ $user->address ?? '—' }}</div>
          </div>
          <div class="item"></div>
        </div>

        <h6 class="mt-3">Preferences</h6>
        <div class="row-line">
          <div class="item">
            <div class="label">Date of Birth</div>
            <div class="value">
              @if($user?->dob)
                {{ \Illuminate\Support\Carbon::parse($user->dob)->toFormattedDateString() }}
              @else
                —
              @endif
            </div>
          </div>
          <div class="item">
            <div class="label">Preferred Language</div>
            <div class="value">{{ $user->preferred_language ?? '—' }}</div>
          </div>
        </div>

        <h6 class="mt-3">Safety & Preferences</h6>
        <div class="row-line">
          <div class="item">
            <div class="label">Emergency Contact</div>
            <div class="value">{{ $user->emergency_name ?? '—' }}</div>
          </div>
          <div class="item">
            <div class="label">Emergency Phone</div>
            <div class="value">{{ $user->emergency_phone ?? '—' }}</div>
          </div>
        </div>
        <div class="row-line mt-2">
          <div class="item">
            <div class="label">Deals & Updates</div>
            <div class="value">{{ $user->marketing_opt_in ? 'Subscribed' : 'Not subscribed' }}</div>
          </div>
          <div class="item">
            <div class="label">ID Image</div>
            <div class="value">
              @if($user->id_image)
                <a href="{{ Storage::url($user->id_image) }}" target="_blank">View ID Image</a>
              @else
                —
              @endif
            </div>
          </div>
        </div>

        <div class="actions">
          <button class="btn btn-primary btn-pill" id="btnEdit">Edit</button>
        </div>
      </div>

      <a href="{{ url('/add-place') }}" class="btn btn-primary btn-pill">
        <span class="icon">➕</span> Found New Tourist Place?
      </a>

      {{-- EDIT --}}
      <form id="editMode" class="hidden" action="{{ route('account.update') }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <h6>Photos</h6>
        <div class="row g-2 mb-2">
          <div class="col-12 col-md-6">
            <label class="form-label">Profile Photo</label>
            <input type="file" name="profile_photo" id="avatarInput" class="form-control" accept="image/*">
            <div class="form-text">Square image recommended, up to 3 MB.</div>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label">ID Image</label>
            <input type="file" name="id_image" id="idImageInput" class="form-control" accept="image/*">
            <div class="form-text">Upload NIC, Passport, or Driving License image, up to 3 MB.</div>
          </div>
        </div>

        <h6 class="mt-3">Basic</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" required>
          </div>
        </div>

        <h6 class="mt-3">Address</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Province</label>
            <select name="province" id="province" class="form-select" required></select>
            @error('province')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="col-md-6">
            <label class="form-label">District</label>
            <select name="district" id="district" class="form-select" required></select>
            @error('district')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="col-12">
            <label class="form-label">Home Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
            @error('address')<small class="text-danger">{{ $message }}</small>@enderror
          </div>
        </div>

        <h6 class="mt-3">Preferences</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="{{ old('dob', $user->dob ? $user->dob->format('Y-m-d') : '') }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Preferred Language</label>
            <select name="preferred_language" class="form-select">
              <option value="" {{ old('preferred_language', $user->preferred_language) ? '' : 'selected' }}>Select</option>
              @foreach(['English', 'Tamil', 'Sinhala'] as $lng)
                <option value="{{ $lng }}" {{ old('preferred_language', $user->preferred_language) === $lng ? 'selected' : '' }}>{{ $lng }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <h6 class="mt-3">Safety & Preferences</h6>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Emergency Contact</label>
            <input type="text" class="form-control" name="emergency_name" value="{{ old('emergency_name', $user->emergency_name) }}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Emergency Phone</label>
            <input type="text" class="form-control" name="emergency_phone" value="{{ old('emergency_phone', $user->emergency_phone) }}">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="marketing_opt_in" name="marketing_opt_in" value="1"
                     {{ old('marketing_opt_in', $user->marketing_opt_in) ? 'checked' : '' }}>
              <label for="marketing_opt_in" class="form-check-label">Send me travel deals and updates</label>
            </div>
          </div>
        </div>

        <div class="actions">
          <button type="submit" class="btn btn-primary btn-pill">Save</button>
          <button type="button" class="btn btn-ghost btn-pill" id="btnCancel">Cancel</button>
        </div>
      </form>
    </section>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle edit mode
  const viewMode = document.getElementById('viewMode');
  const editMode = document.getElementById('editMode');
  const btnEdit  = document.getElementById('btnEdit');
  const btnCancel= document.getElementById('btnCancel');
  const card     = document.getElementById('profileCard');

  if (btnEdit) btnEdit.addEventListener('click', () => {
    viewMode.classList.add('hidden');
    editMode.classList.remove('hidden');
    card.setAttribute('data-editing','true');
  });

  if (btnCancel) btnCancel.addEventListener('click', () => {
    editMode.classList.add('hidden');
    viewMode.classList.remove('hidden');
    card.setAttribute('data-editing','false');
  });

  // Live preview avatar
  const input = document.getElementById('avatarInput');
  const preview = document.getElementById('avatarPreview');
  if (input && preview) {
    input.addEventListener('change', (e) => {
      const [file] = e.target.files || [];
      if (!file) return;
      const url = URL.createObjectURL(file);
      preview.src = url;
      preview.onload = () => URL.revokeObjectURL(url);
    });
  }

  // Province → District (Sri Lanka)
  const SL_MAP = {
    "Western":["Colombo","Gampaha","Kalutara"],
    "Central":["Kandy","Matale","Nuwara Eliya"],
    "Southern":["Galle","Matara","Hambantota"],
    "Northern":["Jaffna","Kilinochchi","Mannar","Vavuniya","Mullaitivu"],
    "Eastern":["Batticaloa","Ampara","Trincomalee"],
    "North Western":["Kurunegala","Puttalam"],
    "North Central":["Anuradhapura","Polonnaruwa"],
    "Uva":["Badulla","Monaragala"],
    "Sabaragamuwa":["Ratnapura","Kegalle"]
  };

  const provinceEl = document.getElementById('province');
  const districtEl = document.getElementById('district');
  const oldProvince = @json(old('province', $user->province));
  const oldDistrict = @json(old('district', $user->district));

  function fillProvinces(){
    if(!provinceEl) return;
    provinceEl.innerHTML = '<option value="" disabled>Select province</option>';
    Object.keys(SL_MAP).forEach(p=>{
      const o = document.createElement('option');
      o.value = p; o.textContent = p;
      if (oldProvince === p) o.selected = true;
      provinceEl.appendChild(o);
    });
  }
  function fillDistricts(p){
    if(!districtEl) return;
    districtEl.innerHTML = '<option value="" disabled>Select district</option>';
    (SL_MAP[p]||[]).forEach(d=>{
      const o = document.createElement('option');
      o.value = d; o.textContent = d;
      if (oldDistrict === d) o.selected = true;
      districtEl.appendChild(o);
    });
  }

  fillProvinces();
  if (oldProvince) fillDistricts(oldProvince);
  if (provinceEl) provinceEl.addEventListener('change', e => fillDistricts(e.target.value));
</script>
</body>
</html>
