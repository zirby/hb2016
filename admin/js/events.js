/**
 * @author Christian ZIRBES
 */
function date2sql(laDate){
    var an = laDate.getFullYear().toString();
    var mois = (laDate.getMonth()+1).toString();
     if(mois.length == 1){mois = "0"+mois};
    var jour = laDate.getDate().toString();
    if(jour.length == 1){jour = "0"+jour};
    
    return an + "-" + mois + "-" +jour;
}



$(document).ready(function(){
    $('#blocModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      // je prends les valeurs des data-*
      var name = button.data('name'); 
      var max = button.data('max'); 
      var max_org = button.data('max_org'); 
      var price = button.data('price'); 
      var price_half = button.data('price_half'); 
      var price_abn = button.data('price_abn'); 
      var price_abn_half = button.data('price_abn_half'); 
      // je rempli les champs avec les valeurs
      var modal = $(this);
      modal.find('.modal-body input[name="inputBloc"]').val(name);
      modal.find('.modal-body input[name="inputMax"]').val(max);
      modal.find('.modal-body input[name="inputMaxOrg"]').val(max_org);
      modal.find('.modal-body input[name="inputPrice"]').val(price);
      modal.find('.modal-body input[name="inputPriceHalf"]').val(price_half);
      modal.find('.modal-body input[name="inputPriceAbn"]').val(price_abn);
      modal.find('.modal-body input[name="inputPriceAbnHalf"]').val(price_abn_half);
    });
    
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('id'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      //modal.find('.modal-title').text('Commande ' + recipient)
      modal.find('.modal-body input').val(recipient);
    });
    $('#envoyeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('id'); // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      //modal.find('.modal-title').text('Commande ' + recipient)
      modal.find('.modal-body input').val(recipient);
    });
    $('#placesModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('id'); 
      var jour = button.data('jour');
      var nbplaces = button.data('nbplaces');
      var modal = $(this);
      //modal.find('.modal-title').text('Commande ' + recipient)
      modal.find('.modal-body input').val(recipient);
      modal.find('.modal-body input[name="jour"]').val(jour);
      modal.find('.modal-body input[name="nbplaces"]').val(nbplaces);
      $.ajax({
            url: "inc/doPlaces.php",
            method: "POST",
            data: { reserv : recipient },
            dataType: "json"          
        })
        .done(function( data ) {
            $('#selPlaces').multiselect('dataprovider', data);
        });
      $('#selPlaces').multiselect({
            onChange: function(option, checked, select) {
                //alert('Changed option ' + $(option).val() + '.');
            }
        });
       
    });

    $('#dtPaye').datepicker()
        .on('changeDate', function(e) {
            var dtPayele = date2sql(e.date);
            var reserv = $('#Nreserve').val();
            $.ajax({
                url:'inc/doPayeLe.php?reserv='+reserv+'&payele='+dtPayele,
                success: function(data) {
                        $('#exampleModal').modal('toggle')
                        location.href="index.php";
                 }
            });
    });
    $('#btnPayeLeReset').click( function () {
            var reserv = $('#Nreserve').val();
            $.ajax({
                url:'inc/doPayeLe.php?reserv='+reserv,
                success: function(data) {
                        $('#exampleModal').modal('toggle')
                        location.href="index.php";
                 }
            });
        
    });
    $('#btnDoPlaces').click( function () {
            //var reserv = $('#Nreserve').val();
            $.ajax({
                url:'doPlacesReserv.php',
                success: function(data) {
                        $('#placesModal').modal('toggle')
                        location.href="index.php";
                 }
            });
        
    });
    /*
    $('#btnDoBlocsVen').click( function () {
            //var reserv = $('#Nreserve').val();
            $.ajax({
                url:'doBlocsVen.php',
                method: "POST",
                success: function(data) {
                        $('#blocVenModal').modal('toggle')
                        location.href="blocs_ven.php";
                 }
            });
        
    });
    */
    
    $('#dtEnvoye').datepicker()
        .on('changeDate', function(e) {
            var dtEnvoyele = date2sql(e.date);
            var reserv = $('#NEreserve').val();
            $.ajax({
                url:'inc/doEnvoyeLe.php?reserv='+reserv+'&envoyele='+dtEnvoyele,
                success: function(data) {
                        $('#envoyeModal').modal('toggle')
                        location.href="index.php";
                 }
            });
    });
    $('#btnEnvoyeLeReset').click( function () {
            var reserv = $('#NEreserve').val();
            $.ajax({
                url:'inc/doEnvoyeLe.php?reserv='+reserv,
                success: function(data) {
                        $('#envoyeModal').modal('toggle')
                        location.href="index.php";
                 }
            });
        
    });
    $('#btnSuppAuto').click( function () {
            $.ajax({
                url:'inc/doSupprimer.php',
                success: function(data) {
                        location.href="index.php";
                 }
            });
        
    });
    
    $('#btnDoDispo').click( function () {
            var jour = $('#jour').val();
            $.ajax({
                url:'inc/doDispo.php?jour='+jour,
                success: function(data) {
                        location.href="blocs.php?jour="+jour;
                 }
            });
        
    });

});
