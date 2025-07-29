<!--begin::Input-->
<div class="d-flex align-items-center">
    <div class="form-check form-check-solid form-switch fv-row">
        {!! Form::hidden((isset($key) ? $key : $name), 0, ['id'=>"hidden_".(isset($id) ? $id : $name)]) !!}
        {!! Form::checkbox((isset($key) ? $key : $name), 1, (!empty($model) && $model->$name->value ? true : false),['class' => 'form-check-input w-45px h-30px', 'id' => (isset($id) ? $id : $name)]) !!}
    </div>
</div>
<!--end::Input-->
