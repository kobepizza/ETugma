<html>

<head>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;" viewBox="0 0 210 38">
        <g id="name" data-name="Group 228" transform="translate(-158 102)">
            <text id="Scribbles_Schemes" data-name="Scribbles &amp; Schemes" transform="translate(263 -84)" fill="#360" font-size="20" font-family="CooperBlack, Cooper"><tspan x="-104.199" y="0">Scribbles </tspan><tspan y="0" fill="#fc3">&amp;</tspan><tspan y="0" xml:space="preserve"> Schemes</tspan></text>
            <text id="EARLY_CHILDHOOD_CENTER" data-name="EARLY CHILDHOOD CENTER" transform="translate(263 -67)" fill="red" font-size="13" font-family="BerlinSansFB-Reg, Berlin Sans FB"><tspan x="-81.11" y="0">EARLY CHILDHOOD CENTER</tspan></text>
        </g>
    </svg>
</head>
<nav class="navbar border">
  <div class="container-fluid">
    <div class="d-flex align-items-center me-auto">
      <a class="navbar-brand d-flex align-items-center me-0" href="{{route('home')}}">
        <img src="" alt="logo" height="105" width="100" id="logo"><!--CMS scribbles logo-->
        <svg class="bi ms-2" height="40" width="220">
          <use xlink:href="#name" />
        </svg>
      </a>
      @if($page =='Legal Center')
      <h4 class="mb-0 legal-text">legal</h4>
      @endif
    </div>
  </div>
</nav>
<script>
  $(document).ready(function() {
    loadCMS();
  });

  function loadCMS() {
    $.ajax({
      type: "GET",
      url: "{{ route('guest.cms.load') }}",
      success: function(data) {
        //console.log('data:', data);

        if (data.success) {
          buildLogo(data);
        }

        function buildLogo(data) {
          let logo = data.cms.logo;
          $('#logo').attr('src', logo);
        }
      },
      error: function() {

      }
    });
  };
</script>

</html>
<style>
  .legal-text{
    font-family:Arial, Helvetica, sans-serif;
    font-weight: lighter;
    color: #B2B2B2;
  }
</style>