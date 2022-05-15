// функція для виклику модального вікна
function showbusket(busket) {
    $('#busket .modal-body').html(busket);
    $('#busket').modal();
}

$('#busket .modal-body').on('click','.del-item',function(){
    var id = $(this).data('id');
    $.ajax({ // ajax запрос
        url: '../busket/del-item',
        data: {id:id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Помилка');
            showbusket(res);
            console.log(id);
        },
        error: function(){
            alert('Error!');
        }
    })
})

function clearBusket(){ //функція очищення корзини
    $.ajax({ // ajax запрос
        url: '../busket/clear',
        type: 'GET',
        success: function(res){
            if(!res) alert('Помилка');
            showbusket(res);
        },
        error: function(){
            alert('Error!');
        }
    })
}

function onClick(e) 
{
    e.preventDefault(); // аби при нажиманні кнопки не перекідувало на другий адрес
    var id = $(this).data('id');
    var params = 
    { 
        // ajax запрос
        url: '../busket/add',
        data: {id:id},
        type: 'GET',
        success: function(res){
            if(!res) alert('Помилка');
            showbusket(res);
        },
        error: function(errorThrown) {
            alert('Error!');
        }
    }
    $.ajax(params);
}

$('.add-to-busket').on('click', onClick)