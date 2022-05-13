let btnClass = null;
let btn = null;
let text = null;
$.each(jsParams,function(index, book){
    if(book.dateEnd)
    {
        btnClass = " btn-danger disabled";
        text = "Книга занята до " + book.dateEnd;
    }else
    {
        btnClass = " btn-success";
        text = "Забронировать";
    }
    btn = $('#'+book.idbook+'_btn')[0];
    btn.className += btnClass;
    btn.innerHTML = text;
});
