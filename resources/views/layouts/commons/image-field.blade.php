@php($imagePath = $imageName.'_path')
@php($image = !empty($model) && $model->$imageName->value)
<!--begin::Image input-->
<div
    class="image-input image-input-outline {{empty($model) || (!empty($model) && !$image) ? 'image-input-empty' : ''}}"
    data-kt-image-input="true"
    style="background-image: url({{asset('public/image.png')}}) !important;">
    <!--begin::Preview existing avatar-->
    <div class="image-input-wrapper w-125px h-125px"
         style="background-image: url({{!empty($model) && $model->$imagePath ? $model->$imagePath : 'none'}});"></div>
    <!--end::Preview existing avatar-->
    <!--begin::Label-->
    <label
        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
        data-kt-image-input-action="change" data-bs-toggle="tooltip"
        title="{{trans('messages.change_image')}}">
        <i class="bi bi-pencil-fill fs-7"></i>
        <!--begin::Inputs-->
        <input type="file" name="{{$imageName}}" accept=".png, .jpg, .jpeg"/>
        <input type="hidden" name="{{$imageName}}_remove"/>
        <!--end::Inputs-->
    </label>
    <!--end::Label-->
    <!--begin::Cancel-->
    <span
        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
        title="{{trans('messages.cancel_image')}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
    <!--end::Cancel-->

@if(!empty($model) && $image)
    <!--begin::Remove-->
        <span
            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
            title="{{trans('messages.remove_image')}}">
																				<i class="bi bi-x fs-2"></i>
																			</span>
        <!--end::Remove-->
    @endif
</div>
<!--end::Image input-->
<!--begin::Hint-->
<div class="form-text">{{trans('messages.allowed_image_ext')}}</div>
<!--end::Hint-->
