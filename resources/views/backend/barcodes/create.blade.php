
<form action="{{route('barcodes.store')}}" method="post">
    <div class="row">
        <input type="hidden" class="form-check-input" name="is_plus" id="" value="0" >

        <input type="text" name="barcode" class="form-control col-md-3" placeholder="Enter Barcode ex: LW 1234 123">
        <div class="form-check col-md-2 ml-2 mt-2">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="is_plus" id="" value="1" >
            Plus
          </label>
        </div>
        <input type="submit" value="Save" class="col-md-1 btn btn-primary"/>
    </div>
</form>