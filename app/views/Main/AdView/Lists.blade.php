@extends("Main.AdView.Boilerplate")

@section("title")
<title>Ads - OK Mobile Ltd.</title>
@stop

@section("content")

@include("Partials.Event")

@include("Main.AdView.Partials.Search")

<div class="col-md-8">
  <!--  table-responsive Start -->
  <div class="bs-example" data-example-id="simple-responsive-table">
    <div class="table-responsive">
      <table class="table">
        
        <tbody>
          @foreach($ads->get() as $ad)
            <tr>
              <td>{{ HTML::image($ad->ad_image, "", ["height"=>100, "width"=>100, "class"=>"img-thumbnail"]) }}</td>
              <td>
                <h3><a href="{{ url("ads/view/" . $ad->id) }}">{{ $ad->ad_title }}</a></h3>
                <p>{{ substr($ad->ad_description, 0, 20) }}....</p>
                <p>{{ $ad->created_at }}</p>
              </td>
              <td><h3>{{ $ad->product_price }}</h3></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--  table-responsive End -->
  
  <!-- Pagination -->
  <center><nav>
    <ul class="pagination">
      <li>
        <a href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li>
        <a href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
  </center>
</div>

@stop

@section("script")
{{ HTML::script("assets/js/search_ad.js") }}
@stop