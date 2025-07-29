<!-- Id Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('id', trans('stock.stock_id').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->id !!}</p>
    </div>
</div>


<!-- Asset Id Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('asset_id', trans('stock.stock_asset_id').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->asset->name !!}</p>
    </div>
</div>


<!-- Station Id Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('station_id', trans('stock.stock_station_id').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->station->name !!}</p>
    </div>
</div>


<!-- Corporate Branch Id Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('corporate_offer_id', trans('stock.stock_corporate_offer_id').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->corporateBranch->name !!}</p>
    </div>
</div>


<!-- Current Stock Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('current_stock', trans('stock.stock_current_stock').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->balance !!}</p>
    </div>
</div>


<!-- Is Active Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('is_active', trans('stock.stock_is_active').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! getBooleanColumn($stock, 'is_active') !!}</p>
    </div>
</div>


<!-- Created At Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('created_at', trans('stock.stock_created_at').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->created_at !!}</p>
    </div>
</div>


<!-- Updated At Field -->
<div class="form-group col-12 col-sm-6 col-md-4">
    {!! Form::label('updated_at', trans('stock.stock_updated_at').":", ['class' => 'control-label text-right']) !!}
    <div class="form-control dashed-border">
        <p>{!! $stock->updated_at !!}</p>
    </div>
</div>


