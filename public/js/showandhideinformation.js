/*
  Valida si el solicitante es ciudadano de cualquier otro país?
 */
function is_citizen($value){

    let $is_citizen = document.getElementById("is_citizen");
    if($value){
        $is_citizen.style.display = "block";
    }else{
        $is_citizen.style.display = "none";
    }
}
/*
¿Ha solicitado anteriormente la entrada o la permanencia en Canadá? *
 */
function before_request($value){
    let $before_request = document.getElementById("before_request");
    if($value){
        $before_request.style.display = "block";
    }else{
        $before_request.style.display = "none";
    }
}
/*
¿Alguna vez le han denegado un visado o permiso, le han negado la entrada o le han pedido que salga de Canadá? *
 */
function check_denied($value){

    let $check_container = document.getElementById("check_denied_container");
    if($value){
        $check_container.style.display = "block";
    }else{
        $check_container.style.display = "none";
    }
}
/*
En los últimos dos años, ¿le diagnosticaron tuberculosis o estuvo en contacto cercano con una persona con tuberculosis? *
 */
function check_tuberculosis($value) {
    let $check_container = document.getElementById("check_tuberculosis_container");
    if($value){
        $check_container.style.display = "block";
    }else{
        $check_container.style.display = "none";
    }
}
/*
¿Alguna vez ha cometido un delito o ha sido arrestado, acusado o condenado por un delito en cualquier país o territorio? *
 */
function check_comitted_crime($value) {
    let $check_container = document.getElementById("notice_comitted_crime");
    if($value){
        $check_container.style.display = "block";
        document.getElementById("btn-submit").setAttribute("disabled", "disabled");

    }else{
        $check_container.style.display = "none";
        document.getElementById("btn-submit").removeAttribute("disabled");

    }
}
