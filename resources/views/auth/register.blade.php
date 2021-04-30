@include('pages.homepage', App::call('App\Http\Controllers\HomepageController@homepageGames'))


<script type="text/javascript" defer>
  window.addEventListener("load", function() {
    $("#SignupModal").modal("show");
  });
</script>