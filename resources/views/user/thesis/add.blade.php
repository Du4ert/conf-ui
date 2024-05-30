
<form id="thesis-form" action="" method="post">
            @csrf
            @method('PUT')

            @include('user.inputs.field', ['field_name' => 'title', 'required' => true])
            @include('user.inputs.field', ['field_name' => 'first_name', 'required' => true])

            @include('user.inputs.section')
            @include('user.inputs.report_form')
</form>
