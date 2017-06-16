@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="header center orange-text"> Guester <a class="btn btn-floating pulse btn-large"><i class="material-icons">person_pin</i></a></h1>
  <div class="row center">
    <form class="col s12 m12 l12">
      <div class="row">
        <div class="input-field col s10">
          <i class="material-icons prefix">account_circle</i>
          <input type="text" id="search-guest" class="validate">
          <label for="icon_prefix">Search Guest</label>
        </div>
        <div class="input-field col s2">
            <a id="clear" class="waves-effect waves-light btn">Clear</a>
        </div>

      </div>
    </form>
    <div id="txtHint" class="title-color" style="padding-top:50px; text-align:center;" >Guest information will be listed here...</div>


  <!-- Modal Structure -->
  <div id="modal1" class="modal">

      <div class="modal-content">
        <h4 id="full_name">Modal Header</h4>
        <p id="company">A bunch of text</p>
        <p id="email">A bunch of text</p>
        <p id="contact">09172</p>
        <h5 id="table_no">Table # 1</h5>
      </div>
      <form>
        <input type="hidden" name="guest" id="guest" value="">
        <div class="modal-footer">
          <button class="btn waves-effect waves-light" type="submit" name="action">Arrived
          </button>
        </div>
      </form>
  </div>

</div>




</div>
@stop

@section('pagescript')
<script>
$(document).ready(function(){
   $("#search-guest").keyup(function(){
       var str=  $("#search-guest").val();
       if(str == "") {
               $( "#txtHint" ).html("Guest information will be listed here...");
       }else {
               $.get( "{{ url('/search?id=') }}"+str, function( data ) {
                   $( "#txtHint" ).html(data);
            });
       }
   });

   $('.modal').modal();
   $('body').on('click','table tbody tr',function(){
      var full_name = $(this).find("td").eq(0).html() + " " + $(this).find("td").eq(1).html();
      var company = $(this).find("td").eq(2).html();
      $("#full_name").text(full_name);
      $("#company").text(company);
      $("#email").text($(this).find("td").eq(3).html());
      $("#contact").text($(this).find("td").eq(6).html());
      $("#table_no").text("Table # " +$(this).find("td").eq(4).html());
      $("#guest").val($(this).find("td").eq(7).html());
      $('#modal1').modal('open');
   });

   $('form').submit(function() {
      $.ajax({
          url: "{{ url('/') }}",
          data: {
              id: $("#guest").val()
          },
          method:'POST',
          success: function( json ) {
              // do what ever you want here. add content to <div> if it was not 1 .
              $('#modal1').modal('close');
              $("#search-guest").trigger( "keyup" );
              console.log(json);

          },
          error: function( xhr, status, errorThrown ) {
              console.log( "Sorry, there was a problem!" );
          }
      });
      json = '';
      return false;
  });

  $( "#clear" ).click(function() {
      $("#search-guest").val("");
      $("#search-guest").trigger( "keyup" );
  });

});
</script>

@stop
