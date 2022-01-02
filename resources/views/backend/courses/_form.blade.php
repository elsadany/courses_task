@csrf
<div class="container">
    @success
    @errors
    <div class="row">
        <div class="col-md-6 form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{request()->input('name')?request()->input('name'):$course->name}}" class="form-control" required>
        </div>
        <div class="col-md-6 form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control" required="">
                @foreach($categories as $category)
                <option value="{{$category->id}}" @if(request()->input('category_id')==$category->id||$course->active==$category->id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
          
        </div>
        <div class="col-md-6 form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required="">{{request()->input('description')?request()->input('description'):$course->description}}</textarea>
          
        </div>
         <div class="col-md-6 form-group">
            <label for="views">Views</label>
            <input type="number" min="0" name="views"  value="{{request()->input('views')?request()->input('views'):$course->views}}" class="form-control" required>
        </div>
        <div class="col-md-6 form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating"  value="{{request()->input('rating')?request()->input('rating'):$course->rating}}" class="form-control" required>
        </div>
        <div class="col-md-6 form-group">
            <label for="hours">Hours</label>
            <input type="number" name="hours"  value="{{request()->input('hours')?request()->input('hours'):$course->hours}}" class="form-control" required>
        </div>
        <div class="col-md-6 form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control" required="">
                @foreach(levels as $key=>$level)
                <option value="{{$level}}" @if(request()->input('level')==$level||$course->level==$level) selected @endif>{{$level}}</option>
                @endforeach
            </select>
          
        </div>
        <div class="col-md-6 form-group">
            <label for="active">Activation</label>
            <select name="active" class="form-control" required="">
                @foreach(active_cases as $key=>$value)
                <option value="{{$key}}" @if(request()->input('name')==$key||$course->active==$key) selected @endif>{{$value}}</option>
                @endforeach
            </select>
          
        </div>
       
        
     
    </div>

    <div class="row mt-3">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>
</div>