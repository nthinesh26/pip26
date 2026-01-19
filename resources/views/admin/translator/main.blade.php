@extends('layouts.app')
@section('content')
<style>
.dropdown-scroll {
max-height: 200px;
/* limit height */
overflow-y: auto;
/* vertical scroll */
overflow-x: hidden;
/* avoid horizontal scroll */
}
</style>
<div class="row">
    <div class="col-lg-6">
        <div>
            <div class='card'>
                <div class='card-body'>
                    <h5>{{ $title }}</h5>
                    <div class="mt-3"></div>
                    <form method='POST' action='/portal/translate/post/phrase' enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class='form-group col-lg-6 col-md-12'>
                                <label for=""><i class="fa fa-tag"></i> Select Label Phrase (MY)</label>
                                <input type="text" id="item_name" name="item_name" class="form-control"
                                placeholder="Type or select item">
                            </div>
                            <div class='form-group col-lg-6 col-md-12'>
                                <label for='key_eng'><i class='fa fa-tag'></i>&nbsp;Translated from MY to Eng</label>
                                <input type='text' class='form-control' id='translation' name='translation'
                                required='required' placeholder='Enter Translated Prase' />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3">
                                <input type='submit' class='btn btn-primary' name='add-now' id='add-now'
                                value='Add Now' />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-3">
    <div class="col-lg-6">
        @include('admin.translator.translator-table')
    </div>
</div>
<script>
$(function() {
        let availableItems = [
        @foreach (Translator::where('flag', 'A')->get() as $trans)
        '{{ $trans->root }}',
        @endforeach
        ];
        $("#item_name").autocomplete({
        source: availableItems,
        minLength: 0
        }).focus(function() {
        $(this).autocomplete("search", "");
        });
});
</script>
@endsection
