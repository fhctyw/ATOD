var arr = [];
var should_refresh = false;

function deleteFromArr(arr, id) {
    var i = 0;
    arr.forEach(elem => {
        if (elem.product_id == id){
            arr.splice(i, 1);
        }
        i++;
    });
}

function process(arr)
{
    send_arr = getArrIndexs(arr);
    send_arr = send_arr.toString();
    /* $.post("../constructor/index", {arr: send_arr, should_refresh: should_refresh}); */
    $.ajax({
        type: 'post',
        url: "../constructor/index",
        data: {arr: send_arr, should_refresh: should_refresh},
        error: function(e)
        {
            console.log("error");
            console.log(e.responseText);
        },
        success: function(r) {
            console.log("success");
           /*  var html = e.responseText; */
            /* console.log(e); */
            if (r.includes('<!DOCTYPE html>') && should_refresh)
            {
                document.open();
                document.write(r);
                document.close();
            }
        } 
    });
}

function remove(e) {
    e.currentTarget.remove();
    deleteFromArr(arr, e.currentTarget.myParam);
    process(arr);
    sessionStorage.setItem('arr', JSON.stringify(arr));
}

function addPart(e)
{
    e.preventDefault();

    if (sessionStorage.getItem('arr') != null) {
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
        arr.push(product);
    

    row.innerHTML = '';
    arr.forEach(elem => {
        d = document.createElement('div');
        d.className = 'col-6';
        d.innerHTML = '<img class="img-fluid" src="' + elem.url_photo + '"></img>';
        d.myParam = elem.product_id;
        d.addEventListener("click", remove);
        row.appendChild(d);
    });

    should_refresh = true;

    process(arr);
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

    process(arr);
    should_refresh = false;
}

function getArrIndexs(arr) {
    indexs = []
    arr.forEach(elem => {
        indexs.push(elem.product_id);
    });
    return indexs;
}

function getValue(arr, name) {
    var r;
    arr.forEach(elem => {
        if (elem.name == name)
            r = elem.value;
    });
    return r;
}

function post_build(e) {
    e.preventDefault();
    arr = getArrIndexs(arr);
    data = $(this).serializeArray();
    data.push({name:'arr', value:arr.toString()});
    //data.forEach(element => {
        /* console.log({
            build_name: getValue(data, 'BuildsForm[build_name]'),
            arr: getValue(data, 'arr')
        }); */
        
   // });

    $.ajax({
        type: "post",
        url: "../constructor/post-build",
        data: {
            build_name: getValue(data, 'BuildsForm[build_name]'),
            arr: getValue(data, 'arr')
        },
        error: function(e)
        {
            console.log("error");
            console.log(e.responseText);
        },
        success: function(){
            console.log("success");
        } 
    });
}

$('.ctgy-constr').on('click', addPart);
$(this).on('load', load);
$('.form-build').on('beforeSubmit', post_build);
$('.category').on('click', function() {
    var arr = Array.from(document.getElementsByClassName('cat-'+$(this.parentElement).data('id')));
    arr.forEach(elem => {
        elem.style.display = elem.style.display == 'none' ? 'inherit' : 'none';
    });
});