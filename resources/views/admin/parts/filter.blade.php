<!-- Filter Form -->
<form id="filter" action="{{ route('user.list') }}" class="w-100" method="get">
    <div class="filter d-md-flex align-items-center justify-content-between">
        @csrf


        <div class="form-group">
            <label for="has_thesis" class="me-1">{{ __('auth.admin_thesis') }}:</label>
            <input type="checkbox" name="has_thesis" id="has_thesis" {{ request()->has('has_thesis') ? 'checked' : '' }}>
        </div>

        
        
        <div class="form-group">
            <label for="accepted_status" class="me-1">{{ __('auth.admin_accepted') }}:</label>
            <input type="checkbox" name="accepted_status" id="accepted_status"
                {{ request()->has('accepted_status') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="pay_status" class="me-1">{{ __('auth.admin_pay') }}:</label>
            <input type="checkbox" name="pay_status" id="pay_status"
                {{ request()->has('pay_status') ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label for="search">{{ __('auth.admin_last_name') }}:</label>
            <input type="text" name="search" id="search" value="{{ request()->input('search') }}" size="10">
        </div>
        <button type="submit" class="btn btn-primary d-inline mt-2 mt-md-0"><i
                class="fa-solid fa-filter me-md-2"></i><span
                class="d-none d-md-inline">{{ __('auth.admin_filter') }}:</span></button>
    </div>
    {{-- <div class="row">
        <div class="form-group col-md-6">
            <select form="filter" class="form-select" name="section" aria-label="Default select example">
                <option selected value="any">{{ __('auth.filter_any') }}</option>
                <option value="genomics">{{ __('auth.genomics') }}</option>
                <option value="biotechnology">{{ __('auth.biotechnology') }}</option>
                <option value="breeding">{{ __('auth.breeding') }}</option>
                <option value="bioresource">{{ __('auth.bioresource') }}
                </option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <select form="filter" class="form-select" name="report_form" aria-label="Default select example">
                <option selected value="any">{{ __('auth.filter_any') }}</option>
                <option value="oral">{{ __('auth.oral') }}</option>
                <option value="poster">{{ __('auth.poster') }}</option>
                <option value="absentee">{{ __('auth.absentee') }}</option>
            </select>
        </div>
    </div> --}}
</form>
