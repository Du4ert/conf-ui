<!-- Filter Form -->
<form id="filter" action="{{ route('user.list') }}" class="w-100" method="get">
    <div class="filter row align-items-center">
        @csrf

        <div class="user-filters  col-md-4 px-md-4">
            <div class="form-group  mb-2">
                <label for="search">{{ __('auth.admin_last_name') }}:</label>
                <input type="text" name="search" id="search" value="{{ request()->input('search') }}" size="20">
            </div>
            <div class="form-group d-flex w-25 justify-content-between  mb-2 mb-md-0">
                <label for="accepted_status" class="me-1">{{ __('auth.admin_accepted') }}:</label>
                <input type="checkbox" name="accepted_status" id="accepted_status"
                    {{ request()->has('accepted_status') ? 'checked' : '' }}>
            </div>
            <div class="form-group d-flex w-25 justify-content-between  mb-2 mb-md-0">
                <label for="pay_status" class="me-1">{{ __('auth.admin_pay') }}:</label>
                <input type="checkbox" name="pay_status" id="pay_status"
                    {{ request()->has('pay_status') ? 'checked' : '' }}>
            </div>
    
            <div class="form-group d-flex w-25 justify-content-between  mb-2 mb-md-0">
                <label for="vavilov_article" class="me-1">{{ __('auth.admin_vavilov_article') }}:</label>
                <input type="checkbox" name="vavilov_article" id="vavilov_article" class="ms-auto"
                    {{ request()->has('vavilov_article') ? 'checked' : '' }}>
            </div>
        </div>

        <div class="thesis-filters col-md-4 ms-md-2">
        
            <div class="form-group d-flex w-25 justify-content-between   mb-2 mb-md-0">
                <label for="has_thesis" class="me-1">{{ __('auth.admin_thesis') }}:</label>
                <input type="checkbox" name="has_thesis" id="has_thesis" {{ request()->has('has_thesis') ? 'checked' : '' }}>
            </div>

            <div class="form-group mb-2 mb-md-0">
                <select data-selected="{{ request()->input('thesis_status') }}" {{ request()->input('has_thesis') ? '' : 'disabled' }} id="thesis_status" form="filter" class="form-select" name="thesis_status" aria-label="Default select example">
                    <option selected value="">{{ __('auth.filter_thesis_status') }}</option>
                    <option value="accepted">{{ __('auth.filter_thesis_status_accepted') }}</option>
                    <option value="submitted">{{ __('auth.filter_thesis_status_submitted') }}</option>
                    <option value="saved">{{ __('auth.filter_thesis_status_saved') }}</option>
                    </option>
                </select>
            </div>
    
            <div class="form-group mb-2 mb-md-0">
                <select data-selected="{{ request()->input('section') }}" {{ request()->input('has_thesis') ? '' : 'disabled' }} id="section" form="filter" class="form-select" name="section" aria-label="Default select example">
                    <option selected value="">{{ __('auth.filter_section') }}</option>
                    <option value="genomics">{{ __('auth.genomics') }}</option>
                    <option value="biotechnology">{{ __('auth.biotechnology') }}</option>
                    <option value="breeding">{{ __('auth.breeding') }}</option>
                    <option value="bioresource">{{ __('auth.bioresource') }}
                    </option>
                </select>
            </div>
    
            <div class="form-group  mb-2 mb-md-0">
                <select data-selected="{{ request()->input('report_form') }}" {{ request()->input('has_thesis') ? '' : 'disabled' }} id="report_form" form="filter" class="form-select" name="report_form" aria-label="Default select example">
                    <option selected value="">{{ __('auth.filter_report_form') }}</option>
                    <option value="oral">{{ __('auth.oral') }}</option>
                    <option value="poster">{{ __('auth.poster') }}</option>
                    <option value="absentee">{{ __('auth.absentee') }}</option>
                </select>
            </div>
        </div>
        

        

    <div class="col-md-2 ms-auto justify-content-end  mb-2 mb-md-0">
    <button type="submit" class="btn btn-primary d-inline mt-2 mt-md-0"><i
        class="fa-solid fa-filter me-md-2"></i><span
        class="d-none d-md-inline">{{ __('auth.admin_filter') }}</span></button>
    </div>
</div>
</form>

<script type="module">
const thesisCheck = $('#has_thesis');
const reportSelect = $('#report_form');
const sectionSelect = $('#section');
const statusSelect = $('#thesis_status');

reportSelect.val(reportSelect.data('selected'));
sectionSelect.val(sectionSelect.data('selected'));
statusSelect.val(statusSelect.data('selected'));


thesisCheck.on('change', function(e) {
    if ($(this).is(':checked')) {
        reportSelect.prop('disabled', false);
        sectionSelect.prop('disabled', false);
        statusSelect.prop('disabled', false);
    } else {
        reportSelect.prop('disabled', true).val('');
        sectionSelect.prop('disabled', true).val('');
        statusSelect.prop('disabled', true).val('');
    }
})
</script>