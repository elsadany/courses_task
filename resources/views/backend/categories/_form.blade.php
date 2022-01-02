@csrf
<div class="container">
    @success
    @errors
    <div class="row">
        <div class="col-md-6 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{request()->input('name')?request()->input('name'):$category->name}}" class="form-control" required>
        </div>
        <div class="col-md-6 form-group">
            <label for="active">Activation</label>
            <select name="active" class="form-control" required="">
                @foreach(active_cases as $key=>$value)
                <option value="{{$key}}" @if(request()->input('name')==$key||$category->active==$key) selected @endif>{{$value}}</option>
                @endforeach
            </select>
          
        </div>
       
        
     
    </div>

    <div class="row mt-3">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>
</div>