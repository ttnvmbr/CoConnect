document.getElementsByTagName("BODY")[0].onload = function() {init()};


function init(){

    document.getElementById('add_tag').addEventListener('click',addTags);

}




function addTags() {

    let tagInput = document.getElementById('tagInput').value;

    if(tagInput !== ""){
        let tagField = document.getElementsByTagName('tagCollection')[0]
        let addedTags = document.getElementById('currentTags')

        addedTags.value += tagInput + ', ';

        let tag = document.createElement('tag');
        tag.classList.add('btn');
        tag.classList.add('btn-info');

        tag.innerHTML = tagInput + " ";



        tagField.addEventListener('click',removeTags);


        tagField.appendChild(tag);


        document.getElementById('tagInput').value = "";
    }

}

function removeTags(){


    let toRemove = event.target.innerHTML;

    let currentValue = document.getElementById('currentTags').value.trim();

    let newValue = currentValue.replace(toRemove.trim() + ',','');

    document.getElementById('currentTags').value = newValue;

    event.target.closest('tag').remove();
}
