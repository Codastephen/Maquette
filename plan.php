<style>
@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css);
</style>
<script type="text/javascript">
function switchFrame(type){
    if(type=="taxi")
        $("#frameMap").attr("src","https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11555.95036015484!2d6.956089100000003!3d43.60680000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1staxi%2C+460+avenue+de+la+qui%C3%A9ra!5e0!3m2!1sfr!2sfr!4v1423822674108"); 
    if(type=="resto")
        $("#frameMap").attr("src","https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11556.18616675248!2d6.956797203124229!3d43.60557254189783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRESTAURANT+460+avenue+de+la+quiera!5e0!3m2!1sfr!2sfr!4v1423831045514");
    if(type=="hotel")
        $("#frameMap").attr("src","https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5777.939045371889!2d6.957258318392283!3d43.607176182735095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shotel%2C+460+avenue+de+la+qui%C3%A9ra!5e0!3m2!1sfr!2sfr!4v1423822638395");
}
</script>
<div class="row  text-center" style="padding-top:20px">
    <div class="btn-group" data-toggle="buttons">
      <label class="btn btn-lg btn-primary active" onclick="switchFrame('taxi')">
        <input type="radio" name="options" id="option1" autocomplete="off" checked ><i class="fa fa-taxi"></i> Taxis
    </label>
    <label class="btn btn-lg btn-primary" onclick="switchFrame('hotel')">
        <input type="radio" name="options" id="option2" autocomplete="off"><i class="fa fa-bed"></i> Hotels
    </label>
    <label class="btn btn-lg btn-primary" onclick="switchFrame('resto')">
        <input type="radio" name="options" id="option3" autocomplete="off" ><i class="fa fa-cutlery"></i> Restaurants
    </label>
</div>
<div class="col-xs-12"style="overflow: hidden; height: 500px;padding:0">
   <iframe id="frameMap" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11555.95036015484!2d6.956089100000003!3d43.60680000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1staxi%2C+460+avenue+de+la+qui%C3%A9ra!5e0!3m2!1sfr!2sfr!4v1423822674108" width="100%" height="650" frameborder="0" style="border:0; margin-top: -150px;">
   </iframe>
</div>
</div>

