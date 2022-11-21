{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Drag and Drop to Sort Expertise</h3>
    {!! Form::select('lang', ['' => 'Select Language']+$languages, config('default_lang'), array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshExpertiseSortData();')) !!}
    <div id="majorSubjectSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshExpertiseSortData();
    });
    function refreshMajorSubjectSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('major.subject.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#majorSubjectSortDataDiv").html('');
                $("#majorSubjectSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var majorSubjectOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('major.subject.sort.update') }}", {majorSubjectOrder: majorSubjectOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush