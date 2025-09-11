<div class="package-filter-sidebar card p-3">
    <h3 class="card-title">Filter Packages</h3>
    <form id="package-filter-form">
        <div class="mb-3">
            <h5>Budget</h5>
            <div class="mb-2">
                <label for="min_price" class="form-label">Min Price ($)</label>
                <input type="number" class="form-control" id="min_price" name="min_price" min="0" step="1" placeholder="0">
            </div>
            <div>
                <label for="max_price" class="form-label">Max Price ($)</label>
                <input type="number" class="form-control" id="max_price" name="max_price" min="0" step="1" placeholder="100000">
            </div>
        </div>
        <div class="mb-3">
            <h5>Rating</h5>
            <select class="form-select" id="min_rating" name="min_rating">
                <option value="">Any Rating</option>
                <option value="1">1+ Stars</option>
                <option value="2">2+ Stars</option>
                <option value="3">3+ Stars</option>
                <option value="4">4+ Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>
        <div class="mb-3">
            <h5>Days</h5>
            <select class="form-select" id="days" name="days">
                <option value="">Any Days</option>
                <option value="1">1 Day</option>
                <option value="2">2 Days</option>
                <option value="3">3 Days</option>
                <option value="4">4 Days</option>
                <option value="5">5+ Days</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100 mb-2">Apply Filters</button>
        <button type="button" id="reset-filters" class="btn btn-danger w-100">Reset Filters</button>
    </form>
</div>

<style>
.package-filter-sidebar {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.package-filter-sidebar h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
}
.package-filter-sidebar h5 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}
</style>
