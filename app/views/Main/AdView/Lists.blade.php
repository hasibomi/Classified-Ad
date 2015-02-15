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
          @foreach($ads as $ad)
            <tr>
              <td><a href="{{ url("ads/view/" . $ad->ad_id) }}">{{ HTML::image($ad->ad_image, "", ["height"=>100, "width"=>100, "class"=>"img-thumbnail"]) }}</a></td>
              <td>
                <h3><a href="{{ url("ads/view/" . $ad->ad_id) }}">{{ $ad->ad_title }}</a></h3>
                @if(strlen($ad->ad_description) <= 100)
                  <p>{{ $ad->ad_description }}</p>
                @else
                  <p>{{ substr($ad->ad_description, 0, 100) }}...</p>
                @endif
                <?php $date = explode(" ", $ad->created_at); $date_for_human = explode("-", $date[0]); ?>
                <p>{{ $date_for_human[2] }}-{{ $date_for_human[1] }}-{{ $date_for_human[0] }}</p>
              </td>
              <td><h3>৳ {{ $ad->product_price }}</h3></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--  table-responsive End -->
  
  <!-- Pagination -->
  {{ $ads->links() }}
</div>

@stop

@section("script")
{{ HTML::script("assets/js/search_ad.js") }}
@stop