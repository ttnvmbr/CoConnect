document.getElementsByTagName("BODY")[0].onload = function() {init()};


function init(){

    window.addEventListener('scroll',scrollLoad);
    load_country_data(limit, start);

}


function getUrlParameter(sParam) {
    let sPageURL = window.location.search.substring(1);
    let sURLVariables = sPageURL.split('&');
    let sParameterName;
    let i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
}

let limit = 5;
let start = 0;
let action = 'inactive';

function load_country_data(limit, start){

    let search = getUrlParameter('search');
    let mood = getUrlParameter('mood');
    let order = getUrlParameter('order');

    $.ajax({
        url:"loadPosts.php",
        method:"POST",
        data:{limit:limit, start:start,search:search,mood:mood,order:order},
        cache:false,
        success:function(data){

            document.getElementById('load_data').insertAdjacentHTML('beforeend',data)

            if(data == ''){
                $('#load_data_message').html("<div class='alert alert-warning w-100'>Einde resultaat</div>");
                action = 'active';
            }else{
                $('#load_data_message').html("<div class='alert alert-warning w-100'>Laden....</div>");
                action = "inactive";
            }

            if ($("body").height() <=  window.innerHeight) {
                scrollLoad();
            }
        }
    });

}

function scrollLoad(){

    if(window.scrollY + window.innerHeight > document.getElementById('load_data').offsetHeight && action == 'inactive'){
        action = 'active';
        start = start + limit;
        setTimeout(function(){
            load_country_data(limit, start);
        }, 500);
    }

}

