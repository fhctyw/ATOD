var arr = [];

/* function checkArr(arr, id) {
    b = true;
    arr.forEach(elem => {
        if (elem.product_id == id) {
            b = false;
        }
    });
    return b;
} */

function deleteFromArr(arr, id) {
    var i = 0;
    arr.forEach(elem => {
        if (elem.product_id == id){
            arr.splice(i, 1);
        }
        i++;
    });
}

function remove(e) {
    e.currentTarget.remove();
    deleteFromArr(arr, e.currentTarget.myParam);
    sessionStorage.setItem('arr', JSON.stringify(arr));
}

function addPart(e)
{
    e.preventDefault();

    

    if (sessionStorage.getItem('arr') != null){
        arr = JSON.parse(sessionStorage.getItem('arr'));
    }
    
    const product = {
        product_id: $(this).data('product_id'),
        product_name: $(this).data('product_name'),
        url_photo: $(this).data('url_photo'),
        price: $(this).data('price'),
        url_site: $(this).data('url_site'),
    }

    var row = document.getElementById('desk').children[0];
    //if (checkArr(arr, product.product_id)) {
        arr.push(product);
    //}

    row.innerHTML = '';
    arr.forEach(elem => {
        d = document.createElement('div');
        d.className = 'col-6';
        d.innerHTML = '<img class="img-fluid" src="' + elem.url_photo + '"></img>';
        d.myParam = elem.product_id;
        d.addEventListener("click", remove);
        row.appendChild(d);
    });

    sessionStorage.setItem('arr', JSON.stringify(arr));
}

function load() {
    if (sessionStorage.getItem('arr') != null){
        arr = JSON.parse(sessionStorage.getItem('arr'));
    }

    var row = document.getElementById('desk').children[0];

    row.innerHTML = '';
    arr.forEach(elem => {
        d = document.createElement('div');
        d.className = 'col-6';
        d.innerHTML = '<img class="img-fluid" src="' + elem.url_photo + '"></img>';
        d.myParam = elem.product_id;
        d.addEventListener("click", remove);
        row.appendChild(d);
    });
}

function getArrIndexs(arr) {
    indexs = []
    arr.forEach(elem => {
        indexs.push(elem.product_id);
    });
    return indexs;
}

function post_build() {
    console.log('post_build()...');
    arr = getArrIndexs(arr);
    
    $.post("../constructor/add", {arr: arr.toString()});

    /* $.ajax({
        type: "get",
        url: "../constructor/add",
        data: {'arr': JSON.stringify(arr)},
        error: function(e)
        {
            console.log("error");
            console.log(e.responseText);
        },
        success: function(){
            console.log("success");
        } 
    }); */
}

$('.category').on('click', function() {
    var v = document.getElementById($(this).data('id'));
    console.log(v);
});
$('.img-fluid').on('load', load);
$('.img-fluid').on('click', addPart);
$('.btn').on('click', post_build);