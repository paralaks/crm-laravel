@if ($recentViews!==null)
<br>
<div class="container">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover table-condensed searchResults">
      <tr class="ui-state-default">
        <th>Recent items you viewed</th>
      </tr>
      @if (count($recentViews))
        @foreach ($recentViews as $recent)
          <tr>
            <td> <a href="/{{ $recent['route'] }}/{{ $recent['id']}}">{{ $recent['name'] }}</a></td>
          </tr>
        @endforeach
      @else
      <tr><td>No records were found!</td></tr>
      @endif
    </table>
  </div>
</div>
@endif