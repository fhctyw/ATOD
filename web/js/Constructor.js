var arr;

/* function getProduct(id)
{
    $.get('../constructor/get-product?id='+id, function(data){
        return data;
    });
} */

function showPart(div, product) {
    console.log(product);
    d = document.createElement('div');
    d.className = 'card';
    d.innerHTML = '<img src="'+ product['url_photo'] +'"></img>';
    console.log(d);
    div.appendChild(d);
}

function checkArr(arr, id) {
    b = true;
    arr.forEach(elem => {
        if (elem.product_id == id) {
            b = false;
        }
    });
    return b;
}

function addPart()
{
    if (sessionStorage.getItem('arr') != null)
        arr = sessionStorage.getItem('arr');
    console.log(arr);
    const product = {
        product_id: $(this).data('product_id'),
        product_name: $(this).data('product_name'),
        url_photo: $(this).data('url_photo'),
        price: $(this).data('price'),
        url_site: $(this).data('url_site'),
    };

    var div = document.getElementById('desk');
    if (checkArr(arr, product.product_id)) {
        arr.push(product);
    }

    div.innerHTML = '';
    /* arr.forEach(element => {
        
        $.get('../constructor/get-product?id='+element, function(data){
            showPart(div, data);
        })

    }); */

    sessionStorage.setItem('arr', arr);
}

$('.img-fluid').on('click', addPart);