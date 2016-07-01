/**
 * @author Christian ZIRBES
 */
var priceUnit = 0;
var priceUnitHalf = 0;
var priceTot = 0;
var placeDispo = 0;
var placeZone = "";
var placeBloc = "";
var placeNb = 0;
var placeFullNb = 0;
var placeHalfNb = 0;
var lejour = "";
var abn = false;
var typeRes = "";

function selectBloc(bloc) {
    console.log(bloc);
     $.ajax({
        "url": "inc/getPlaceDispoOrg.php?bloc=" + bloc,
        "type": "POST",
        "dataType": "json",
        "success": function (data) {
            console.log(data);
            $("#helpZone").text("");
            placeDispo = data.nb_org;
            placeBloc = data.bloc;
            if (placeDispo <= 0) {
                $("#pZone").html(data.zone);
                $("#pBloc").html("<button class='btn btn-" + data.color + "' type='button'>" + data.bloc + " <span class='badge'>complet</span></button>");
                
                $('#btnReservOrg').hide();
            } else {
                $("#pZone").html(data.zone);
                $("#pBloc").html("<button class='btn btn-" + data.color + "' type='button'>" + data.bloc + " <span class='badge'>" + placeDispo + "</span></button>");

                $('#btnReservOrg').show();
                $('#salleHelp').html("");
            }

        }
    });
}



$(document).ready(function(){
    $('#btnReservOrg').hide();
   
/****************** click blocs*******************/
$("#bloc_a").click(function () {selectBloc("bloc_a");});
    $("#bloc_b").click(function () {selectBloc("bloc_b");});
    $("#bloc_c").click(function () {selectBloc("bloc_c");});
    $("#bloc_d").click(function () {selectBloc("bloc_d");});
    $("#bloc_f").click(function () {selectBloc("bloc_f");});
    $("#bloc_f0").click(function () {selectBloc("bloc_f0");});
    $("#bloc_e").click(function () {selectBloc("bloc_e");});
    $("#bloc_e0").click(function () {selectBloc("bloc_e0");});
    // Zone bleue sup
    $("#bloc_a_sup").click(function () {selectBloc("bloc_a_sup");});
    $("#bloc_b_sup").click(function () {selectBloc("bloc_b_sup");});
    $("#bloc_c_sup").click(function () {selectBloc("bloc_c_sup");});
    $("#bloc_d_sup").click(function () {selectBloc("bloc_d_sup");});
    $("#bloc_e_sup").click(function () {selectBloc("bloc_e_sup");});
    // Zone rouge
    $("#bloc_g").click(function () {selectBloc("bloc_g");});
    $("#bloc_h").click(function () {selectBloc("bloc_h");});
    $("#bloc_i").click(function () {selectBloc("bloc_i");});
    $("#bloc_j").click(function () {selectBloc("bloc_j");});
    $("#bloc_k").click(function () {selectBloc("bloc_k");});
    $("#bloc_z").click(function () {selectBloc("bloc_z");});
    $("#bloc_z0").click(function () {selectBloc("bloc_z0");});
    // Zone rouge sup
    $("#bloc_g_sup").click(function () {selectBloc("bloc_g_sup");});
    $("#bloc_h_sup").click(function () {selectBloc("bloc_h_sup");});
    $("#bloc_i_sup").click(function () {selectBloc("bloc_i_sup");});
    $("#bloc_j_sup").click(function () {selectBloc("bloc_j_sup");});
    $("#bloc_k_sup").click(function () {selectBloc("bloc_k_sup");});
    $("#bloc_z_sup").click(function () {selectBloc("bloc_z_sup");});
    $("#bloc_z0_sup").click(function () {selectBloc("bloc_z0_sup");});
    // Zone jaune
    $("#bloc_l").click(function () {selectBloc("bloc_l");});
    $("#bloc_m").click(function () {selectBloc("bloc_m");});
    $("#bloc_n").click(function () {selectBloc("bloc_n");});
    $("#bloc_o").click(function () {selectBloc("bloc_o");});
    $("#bloc_p").click(function () {selectBloc("bloc_p");});
    $("#bloc_q").click(function () {selectBloc("bloc_q");});
    $("#bloc_r").click(function () {selectBloc("bloc_r");});
    // Zone jaune sup
    $("#bloc_l_sup").click(function () {selectBloc("bloc_l_sup");});
    $("#bloc_m_sup").click(function () {selectBloc("bloc_m_sup");});
    $("#bloc_n_sup").click(function () {selectBloc("bloc_n_sup");});
    $("#bloc_o_sup").click(function () {selectBloc("bloc_o_sup");});
    $("#bloc_p_sup").click(function () {selectBloc("bloc_p_sup");});
    // Zone noire 
    $("#bloc_x").click(function () {selectBloc("bloc_x");});
    $("#bloc_v").click(function () {selectBloc("bloc_v");});
    $("#bloc_u").click(function () {selectBloc("bloc_u");});
    $("#bloc_t").click(function () {selectBloc("bloc_t");});
    $("#bloc_s").click(function () {selectBloc("bloc_s");});
    /**************************************************/
    
    $('#btnReservOrg').click(function () {
        console.log(placeBloc);
        $.ajax({
            "url": "inc/doReservOrg.php",
            "type": "POST",
            "dataType": "json",
            "data": {
                "inputPlaces": $('#inputPlaces').val(),
                "inputPlacesHalf":$('#inputPlacesHalf').val(),
                "inputBeneficiaire":$('#inputBeneficiaire').val(),
                "inputOrganisateur":$('#inputOrganisateur').val(),
                "inputMontant": $('#inputMontant').val(),
                "inputType": $('#inputType').val(),
                 "bloc": placeBloc,
            },
            "success": function (data) {
                console.log(data.msg);
                document.location.href = "index.php";
            }
        });

    });

});
