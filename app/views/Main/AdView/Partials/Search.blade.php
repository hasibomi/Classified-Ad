<!-- Lest Sidebar -->
<div class="col-md-4">

    {{-- Ad search form start --}}
    {{ Form::open(["url" => "ads/search", "class" => "form-horizontal", "method" => "get"]) }}
    <div class="form-group">
        <label for="category" class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
            <select class="form-control" name="catagory" id="catagory">
                @if($catagories->count() == 0)
                    <option value="0">No catagories found</option>
                @else
                    <option value="0">All</option>
                    @foreach($catagories as $catagory)
                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-group" id="segment_div">
        <label for="segment" class="col-sm-2 control-label">Segment</label>
        <div class="col-sm-10">
            <select class="form-control" name="segment" id="segment">
                <option value="0">--- Select Catagory ---</option>
            </select>
        </div>
    </div>
    <div class="form-group" id="subsegment_div">
        <label for="subsegment" class="col-sm-2 control-label">Sub Segment</label>
        <div class="col-sm-10">
            <select class="form-control" name="subsegment" id="subsegment">
                <option value="0">--- Select Segment ---</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="region" class="col-sm-2 control-label">District </label>
        <div class="col-sm-10">
            <select class="form-control" name="district" id="district">
                @if($districts->count() == 0)
                    <option value="0">No districts found</option>
                @else
                    <option value="0">All</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="thana" class="col-sm-2 control-label">Thana</label>
        <div class="col-sm-10">
            <select class="form-control" name="thana" id="thana">
                <option value="0">--- Select District ---</option>
            </select>
        </div>
    </div>
    <div class="form-group" align="right">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Search</button>
        </div>
    </div>
    {{ Form::close() }}
    {{-- Ad search form end --}}
  
</div>
<!-- Lest Sidebar End-->