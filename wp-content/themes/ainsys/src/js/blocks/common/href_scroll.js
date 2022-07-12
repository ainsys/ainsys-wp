( function( $ ) {
    var myHash = location.hash; //получаем значение хеша
    location.hash = ''; //очищаем хеш
    if(myHash[1] != undefined){ //проверяем, есть ли в хеше какое-то значение
        $('html, body').animate({ scrollTop : $(myHash).offset().top}, 500); //скроллим за полсекунды
    };
} )( jQuery ); 