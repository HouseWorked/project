$( ".truns" ).css('height', $('.wrap').height() + 'px');
$(document).ready(function() {
    $('.addPopup').magnificPopup({
        type: 'inline',
        modal: true
    });
    $('#body0, #body1, #body2, #body3, #body4').sortable({
        connectWith:".table_body_truns",
        containment: ".truns",
        handle: '.handle',
        stop: function(event, ui) {
            console.log($(ui.item[0]).css('top', ''));
            console.log($(ui.item[0]).css('left', ''));
        }
    }); // для отмены выделения текста на элементах

    $('#CurrentDay').text(Day); // Текущий день
    $('#procent_complete').text(width.toFixed(0)); // Текущий % выполненой работы
    $('#remainder').text(total - complete); // Текущий остаток
    $('#complete_progress').text(width.toFixed(2)); // Текущий % выполненой работы
    $('#progres_goal').css('width', width + '%'); //прогресс бар выполненых
    $('#progress_day').css('width', widthDay + '%');  //прогресс бар дней
    $('#current_date').css('margin-left', (widthDay - 4.5) + '%'); // ширина блока с текущем днем
    // $('.truns').css('height', $('.wrap').height());
    /*план личных прожаж персоналда*/
    var personal = $('.personal_plan');
    personal.each(function () {
        var current = $(this).data('current');
        var full = $(this).data('full');
        var procent = current / full * 100;
        $(this).parent().css('width', procent + "%");
        $(this).text(current + "руб. из " + full + 'руб.');
    });
    /*Данные для графика*/
    $.ajax({
        url: '/crm/service/grafic-profit',
        dataType: 'json',
        type: 'POST',
        // data: ({
        //
        // }),
        beforeSend: function () {
        },
        success: function (data) {
            switch (data.status) {
                case 'success':
                    var popCanvas = $("#popChart");
                    var barChart = new Chart(popCanvas, {
                        type: 'line',
                        data: {
                            labels: data.label,
                            datasets: [
                                {
                                    label: 'Прибыль',
                                    data: data.content1,
                                    lineTension: 0,
                                    backgroundColor: [
                                        // 'rgba(255, 99, 132, 0.6)',
                                        'rgba(54, 162, 235, 0.6)',
                                        // 'rgba(255, 206, 86, 0.6)',
                                        // 'rgba(75, 192, 192, 0.6)',
                                        // 'rgba(153, 102, 255, 0.6)',
                                        // 'rgba(255, 159, 64, 0.6)',
                                        // 'rgba(255, 99, 132, 0.6)',
                                        // 'rgba(54, 162, 235, 0.6)',
                                        // 'rgba(255, 206, 86, 0.6)',
                                        // 'rgba(75, 192, 192, 0.6)',
                                        // 'rgba(153, 102, 255, 0.6)'
                                    ]
                                },
                                {
                                    label: 'Сделки',
                                    data: data.content2,
                                    lineTension: 0,
                                    backgroundColor: [
                                        // 'rgba(255, 99, 132, 0.6)',
                                        // 'rgba(54, 162, 235, 0.6)',
                                        // 'rgba(255, 206, 86, 0.6)',
                                        // 'rgba(75, 192, 192, 0.6)',
                                        'rgba(153, 102, 255, 0.6)',
                                        // 'rgba(255, 159, 64, 0.6)',
                                        // 'rgba(255, 99, 132, 0.6)',
                                        // 'rgba(54, 162, 235, 0.6)',
                                        // 'rgba(255, 206, 86, 0.6)',
                                        // 'rgba(75, 192, 192, 0.6)',
                                        // 'rgba(153, 102, 255, 0.6)'
                                    ]

                                }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'График',
                                fontSize: 40
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                                fontColor: '#930900',
                                labels: {
                                    boxWidth: 80,
                                    fontColor: 'black'
                                }
                            },
                            tooltips: {
                                borderWidth: 4,
                                titleFontSize: 20,
                                bodyFontSize: 15
                                // callbacks: {
                                //     label: function(tooltipItem, data) {
                                //         // let account: Account = that.accounts[tooltipItem.index];
                                //         return account.accountNumber+":"+account.balance+"€";
                                //     }
                                // }
                            }
                        }
                    });
                    break;
            }
        }
    });
});

var Data = new Date();
var Year = Data.getFullYear();
var CurrentMonth = Data.getMonth();
var Day = Data.getDate();
var Month = ['31', '28', '31', '30', '31', '30', '31', '31', '30', '31', '30', '31'];
var total = $('#total').text();
var complete = $('#complete').text();

var width = complete / total * 100;
var widthDay = Day / Month[CurrentMonth] * 100;


var $doc = $(document);
var $ratio = $doc.width() / $('.truns').width(); //отношение окна к общей ширене блока, чтобы тянуть весь блок.
var $mousepos;
var $to;
$doc.on('mousedown', '.table_truns', dragstart);
$doc.on('mouseup', '.table_truns', function(){
    $doc.off('mousemove.drag mouseup.drag mouseout.drag');
});

function dragstart(e) {
    e.preventDefault();
    $mousepos = e.screenX;
    $doc.on('mousemove.drag', drag);
}

function drag(e) {
    clearTimeout($to);
    var delta = (e.screenX - $mousepos) * $ratio;
    $to = setTimeout(function () { // таймаут чтобы события от мыши не перекрывали друг друга,
        $doc.scrollLeft($doc.scrollLeft() - delta);
        $mousepos = e.screenX;
    }, 1);
}


$(document).on('click', '.button_delete_sugg', function(){ // При удалении передаем id
    var id = $(this).parent().parent().attr('id');
    $('.btn_delete').attr('data-id', id);
    console.log("first this "+id);
    // console.log("first parent "+$('#delete .delete').data('id'));
});
$(document).on('click', '.btn_delete', function(){ // Удаление
    var id = $(this).attr('data-id');
    $('#'+id).hide();
    $.magnificPopup.close();
});







/*Горизонтальная прокрутка блока с задачами*/
$('.truns').mousedown(function (event) {
    if(event.target.nodeName !== 'IMG' && event.target.nodeName !== 'INPUT') {
        // прикрепить 3 data элементу #timeline
        $(this)
            .data('down', true) // индикатор того, что мышь нажата
            .data('x', event.clientX) // текущая X-координата мышки
            .data('scrollLeft', this.scrollLeft); // текущая позиция скролла

        // вернуть false, чтобы избежать выделение текста и перетаскивания ссылок
        //внутри окна прокрутки
        return false;
    }
}).mouseup(function (event) {
    // Когда мышь отжата (mouse up), «выключить» индикатор down
    $(this).data('down', false);
}).mousemove(function (event) {
    var info = event.target;
    // console.log($(info).hasClass('.truns'));
    // если мышь нажата – начать эффект перетаскивания (drag)
    // console.log(event.target);
    if(event.target.nodeName !== 'IMG' && event.target.nodeName !== 'INPUT'){
        if ($(this).data('down') == true) {

            // this.scrollLeft - это scrollbar, появившийся из-за слишком большого
            //контента (overflowing content)
            // Новая позиция высчитывается по формуле: начальная позиция скролла +
            //начальная X-координата нажатой мышки – новая X-координата
            // Ищу того, кто мог бы как-то увеличить скорость прокрутки
            // $('body').animate({
            //     'scrollLeft': this.scrollLeft = $(this).data('scrollLeft') + $(this).data('x') - event.clientX
            // });
            this.scrollLeft = $(this).data('scrollLeft') + $(this).data('x') - event.clientX;
        }
    }

}).css({
    // 'overflow' : 'hidden', // изменить на hidden для пользователей с поддержкой JS
    'cursor' : '-moz-grab' // добавить курсор с изображением лапки
});
// И наконец, вызываем событие, если мышка вышла за пределы прокручиваемой области
// Мы не вызываем событие mouse up (так как мышь все еще нажата)
$(window).mouseout(function (event) {
    if ($('.truns').data('down')) {
        try {
            // *try* (попробовать) вычислить элемент, на который перешла мышка после того,
            //как покинула область
            // и если мы мы действительно вышли за пределы этой области,
            //то отключаем индикатор события mouse down
            if (event.originalTarget.nodeName == 'BODY' || event.originalTarget.nodeName == 'HTML') {
                $('.truns').data('down', false);
            }
        } catch (e) {}
    }
    if ($('.task_truns').data('down')) {
        try {
            // *try* (попробовать) вычислить элемент, на который перешла мышка после того,
            //как покинула область
            // и если мы мы действительно вышли за пределы этой области,
            //то отключаем индикатор события mouse down
            if (event.originalTarget.nodeName == 'BODY' || event.originalTarget.nodeName == 'HTML') {
                $('.task_truns').data('down', false);
            }
        } catch (e) {}
    }
});



$(document).on('click', '.add_task', function(e){
    e.preventDefault();
    e.stopPropagation();
    // $(this).css('background', 'white');
    $(this).find('.task_first').css('display', 'none');
    $(this).find('input').css('display', 'block');
    $(this).find('input').focus();
});

/*по символы открывается доп меню*/
$(document).on('focusout', '.add_task input', function(){
    $(this).parent().find('.task_first').css('display', 'block');
    $('.act').hide();
    $('.emp').hide();
    $(this).css('display', 'none');
    $(this).val('');
    $.cookie("employee", null); // очистка куки
});
$(document).click(function(event) { // Закрытие доп меню по клику вне элемента
    // event.stopPropagation();
    $('.task_first').css('display', 'block');
    $('.act').hide();
    $('.emp').hide();
    $('.add_task input').css('display', 'none');
    $(this).val('');
    $.cookie("employee", null);// очистка куки
});


var start = 0;
var type = 'none';
$(document).on('keydown', '.string_add_task input', function(event){
    var employee = $(this).parent().parent().find('.emp');
    var act = $(this).parent().parent().find('.act');
    var scroll = $(this).parent().parent().find('.'+type);
    var area = $(this).data('area'); // Определенная область задача (1 из 5)
    if(event.keyCode == 50){//окно выбора работника
        start = 0;
        type = 'emp';
        active(employee, act, $(this), type);
    }else if(event.keyCode == 49){//окно выбора действия
        start = 0;
        type = 'act';
        active(employee, act, $(this), type);
    }else if(event.keyCode == 40){ // стрелка вниз
        if(start < $('.'+type+$(this).data('area')).length){ start++; } // Останавливаем на последнем элементе
        var emp = $('.'+type+$(this).data('area')); // Строка работника
        var current = start - 1; //
        var count = current - 1;
        if(current >= 4){ scroll.scrollTop(scroll.scrollTop() + 75); }
        if(current !== 0){
            $(emp[count]).removeClass('active_emp');
        }
        $(emp[current]).addClass('active_emp');
    }else if(event.keyCode == 38){ // стрелка вверх
        event.preventDefault();
        if(start > 1){ start--; } // Останавлием на первом элементе
        var emp = $('.'+type+$(this).data('area')); // Строка работника
        var current = start - 1; // текущая строка
        var count = current + 1; //
        $(emp[count]).removeClass('active_emp');
        $(emp[current]).addClass('active_emp');
        scroll.scrollTop(scroll.scrollTop() - 75);
    }else if(event.keyCode == 13){//действия выбора enter
        event.stopPropagation();
        event.preventDefault();
        var _this = $(this);
        var firstString = $(this).val(); // Полностью строка
        var secondString = firstString.slice(0, -1); // Убираем последний символ
        var last = firstString.toString().slice(-1); // Запоминаем послений символ
        var completeString;
        var add;
        switch(type) {
            case 'act': // выбор действия
                add = last.replace(last, ' !' + $(this).parent().parent().find('.active_emp').data('user'));
                break;
            case 'emp': // Выбоор работника
                var emp = [];
                if($.cookie('employee') == null){
                    emp.push($(this).parent().parent().find('.active_emp').data('user'));
                }else{
                    emp.push($.cookie("employee").split(','), $(this).parent().parent().find('.active_emp').data('user'));
                }
                $.cookie('employee', emp.join(','));
                add = last.replace(last, '@id' + $(this).parent().parent().find('.active_emp').data('user'));
                break;
            case 'none': // Нет привязанного действия(В случае, если imput пуст, отправляем новую задачу)
                var bd_employee;
                // var text = taskText(firstString);
                // // firstString[text - 1]
                // console.log($.cookie("employee").split(','));
                // if($.cookie("employee") == null){
                //     bd_employee = null;
                // }else{
                //     bd_employee = $.cookie("employee").split(',');
                // }
                $.ajax({
                    url: '/crm/service/new-task',
                    dataType: 'json',
                    type: 'POST',
                    data: ({
                        'area': area,
                        'resp': ($.cookie("employee") == null) ? null : $.cookie("employee").split(','),
                        'text': taskText(firstString)
                    }),
                    success: function(data){
                        switch(data.status){
                            case 'success':
                                $('#body' + area).html(data.content);
                                break;
                            case 'fail':
                                console.log(data.content);
                                break;
                        }
                    },
                    complete: function(){
                        _this.parent().find('.task_first').css('display', 'block');
                        $('.act').hide();
                        $('.emp').hide();
                        _this.css('display', 'none');
                        _this.val('');
                        $.cookie("employee", null); // очистка куки
                        return false;
                    }
                });
                return false;
                break;
        }
        completeString = secondString+add;
        $(this).val(completeString);
        start = 0;
        type = 'none';
        active(employee, act, $(this), type);
    }else{
        type = 'none';
        employee.css('display', 'none');
        act.css('display', 'none');
    }
});

function active(employee, act, _this, type){
    employee.find('.emp'+_this.data('area')).removeClass('active_emp'); //очистка активного поля работника
    act.find('.act'+_this.data('area')).removeClass('active_emp'); //очистка активного поля действия
    $('.'+type).animate({ scrollTop: 0 }, "slow");
    if(type == 'act'){
        employee.css('display', 'none');
        act.css('display', 'block');
    }else if(type == 'emp'){
        employee.scrollTop(0);
        act.css('display', 'none');
        employee.css('display', 'block');
    }else{
        $('.act').hide();
        $('.emp').hide();
    }
}

function taskText(string){
    string = string.replace(/ @id[0-9]*/g, '');
    string = string.replace(/ "id[0-9]*/g, '');
    string = string.replace(/ !/g, '');
    return string;
}
$(document).on('dblclick', '.task_truns', function(){ //открываем модалку
    // $.magnificPopup.open({
    //     items: {src: jQuery(this).attr('href')},
    //     type: 'inline'
    // });
    $('body').css('overflow', 'hidden');
    $( "#substrate" ).css('display', 'block');
    $( "#substrate" ).css('width', $('.wrap').width());
    $( "#substrate" ).css('height', $('.wrap').height() - 22);
    // $( ".modal_edit_task" ).css('height', $('.wrap').height() - 22);
    $( ".modal_edit_task" ).toggle( "slide", {direction : "right"});
    $.ajax({
        url: '/crm/service/task-edit',
        dataType: 'json',
        type: 'POST',
        data: ({
            'id': $(this).attr('id')
        }),
        success: function(data){
            switch(data.status){
                case 'success':
                    $( ".modal_edit_task" ).html(data.content);
                    break;
            }
        }
    });
});
$(document).on('click', '#substrate', function(){ //закрываем модалку
    $('body').css('overflow', 'auto');
    $('body').css('overflow', 'auto');
    $( ".modal_edit_task" ).toggle( "slide", {direction : "right"});
    $( "#substrate" ).css('display', 'none');
});
$(document).on('click', '#repiat', function(){ //Открываем модалку повторять задчу
    $('.repiat_modal').css('display', 'block');
});
$(document).on('mouseup', '.header_modal_edit_task, .settings_modal_edit_task, .bodys_modal_edit_task, .text_edit__modal_task, .files_modal_edit_task, .comments_modal_edit_task', function(e){
    var div = $(".repiat_modal");
    if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
        div.css('display', 'none'); // скрываем его
        div.find('.dependent-sub').css('display', 'none'); // скрываем select побочные
        div.find('section').css('display', 'none'); // скрываем select побочные
    }
});
$(document).on('click', '.repiat_modal input', function(){ // Открываем доп окно с выбором интервала повтора
    var checked = $(this).prop("checked");
    if(checked){
        $(this).parent().find('select[name="location"]').css('display', 'block');
    }else{
        if($(this).data('action') !== 'datep'){
            $(this).parent().find('select').css('display', 'none');
            $(this).parent().find('.dependent-sub').css('display', 'none');
            $(this).parent().find('section').css('display', 'none');
        }
    }
});

$(document).on('mouseover', '.settings_info_responsible_modal_edit_task', function(){// При наведении на ответственного показываем кнопку удаления
    var w = $(this).width() / 2 - 40; // ширина блока / 2 - 40 px
    $(this).addClass('blur');
    $(this).before("<div class='q' style='position: absolute; left: "+ ($(this).position().left + w) +"px; top: 0; color: red'>Удалить</div>");
}).on('mouseout', '.settings_info_responsible_modal_edit_task', function () {
    $(this).removeClass('blur');
    $(this).parent().find(".q").each(function(){
        $(this).hide();
    });
});
$(document).on('change', '#mainSelect', function(){ // Открываем/скрываем дни недель
    if($(this).val() == 'weeek'){
        $(this).parent().find('section').css('display', 'block');
    }else{
        $(this).parent().find('section').css('display', 'none');
    }
});
/*AJAX запросы*/
// Изменение даты создания задачи
$(document).on('click', '#substrate', function(){
    var id = $('.body_modal_edit_task').attr('id');
    var nDate = $('input[name="nDate"]').val();
    var nTitle = $('input[name="nTitle"]').val();
    var nDesc = $('textarea[name="nDesc"]').val();
    $.ajax({
        url: '/crm/service/new-date-edit?id='+id,
        dataType: 'json',
        type: 'POST',
        data: ({
            'date': nDate,
            'title': nTitle,
            'desc': nDesc
        }),
        success: function(data){
            switch(data.status){
                case 'success':
                    break;
            }
        }
    });
});
// Удаляем ответственного
$(document).on('click', '.settings_info_responsible_modal_edit_task', function(){
    var elem = $('.settings_info_responsible_modal_edit_task');
    var id = $(this).attr('id');
    var name = $(this).text();

    name = name.split(';');
    if(elem.length == 1){
        // $('#block_info').find('#title_block_info').css('display', 'none');
        $('#block_info').html('Отсутствует ответственный');
    }
    $(this).parent().find('.q').remove(); // Надпись "Удалить"
    $(this).remove(); // Удаляем сам элемент

    $('#resp').append("<option value='"+ id +"'>"+ name[0] +"</option>");
    /*AJAX запрос на удаление*/
    // ...
});
// Добавляем ответственного
$(document).on('change', '#resp', function(){
    var id = $(this).val();
    var name = $('#resp option:selected').text();
    $("#resp option[value='"+ id +"']").remove();
    if($('.settings_info_responsible_modal_edit_task').length > 0){
        console.log(">0 "+$('.settings_info_responsible_modal_edit_task').length);
        $('.settings_info_responsible_modal_edit_task').after("<span class='settings_info_responsible_modal_edit_task' id=' "+ id +" ' style='cursor: pointer; position: relative'>" + name + ";</span> ");
    }else{
        console.log("<0 "+$('.settings_info_responsible_modal_edit_task').length);
        $('#block_info').html(" Задача поставлена: <span class='settings_info_responsible_modal_edit_task' id=' "+ id +" ' style='cursor: pointer; position: relative'>" + name+ ";</span> ");

    }

});
/*files*/
// Эффект при наведении курсора с файлами на зону выгрузки
function dropenter(e) {
    e.stopPropagation();
    e.preventDefault();
    var tmp=document.getElementById('drag');
    tmp.style.background = '#dddddd';
    tmp.style.position = 'absolute';
    tmp.style.top = '0';
    tmp.style.left = '0';
    tmp.style.height = '100%';
    tmp.style.textAlign = '100%';
    tmp.style.zIndex = '2';

    tmp.innerHTML = 'Вставьте сюда ваш файл. Возможные файлы: изображения(jpg, png, gif), документы(pdf, doc, exl)';
}

// Эффект при отпускании файлов или выходе из зоны выгрузки
function dropleave() {
    var tmp=document.getElementById('drag');
    tmp.style.background='#ffffff';
    tmp.style.position = 'relative';
    tmp.style.top = '0';
    tmp.style.left = '0';
    tmp.style.height = 'auto';
    tmp.style.zIndex = '2';
    tmp.innerHTML = 'Прикрепленные файлы';
}

// Проверка и отправка файлов на загрузку
function dodrop(e) {
    var tmp=document.getElementById('drag');
    var dt = e.dataTransfer;
    if(!dt && !dt.files) { return false ; }

    // Получить список загружаемых файлов
    var files = dt.files;

    // Fix для Internet Explorer
    dt.dropEffect="copy";

    // Загрузить файлы по очереди, проверив их размер
    for (var i = 0; i < files.length; i++) {
        if (files[i].size<15000000) {
            tmp.style.background='#ffffff';
            tmp.style.position = 'relative';
            tmp.style.top = '0';
            tmp.style.left = '0';
            tmp.style.height = 'auto';
            tmp.style.zIndex = '2';
            tmp.innerHTML = 'Прикрепленные файлы';
            // Отправить файл в AJAX-загрузчик
            ajax_upload(files[i]);
        }
        else {
            alert('Размер файла превышает допустимое значение');
        }
    }

    // Подавить событие перетаскивания файла
    e.stopPropagation();
    e.preventDefault();
    return false;
}

// AJAX-загрузчик файлов
function ajax_upload(file) {
    // Mozilla, Safari, Opera, Chrome
    if (window.XMLHttpRequest) {
        var http_request = new XMLHttpRequest();
    }
    // Internet Explorer
    else if (window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
                // Браузер не поддерживает эту технологию
                return false;
            }
        }
    }
    else {
        // Браузер не поддерживает эту технологию
        return false;
    }
    var name = file.fileName || file.name;

    // Добавить для файла новую полосу-индикатор загрузки
    var tmp=document.getElementById('upload_overall');
    var new_div = document.createElement("div");
    new_div.className='percent_div';
    tmp.appendChild(new_div);

    // Обработчик прогресса загрузки
    http_request.upload.addEventListener('progress', function(event) {
        var percent = Math.ceil(event.loaded / event.total * 100);
        var back=Math.ceil((100-percent)*6);
        new_div.style.backgroundPosition='-'+back+'px 0px';
        new_div.innerHTML=(name + ': ' + percent + '%');
    }, false);

    // Отправить файл на загрузку
    http_request.open('POST', 'upload.php?fname='+name,true);
    http_request.setRequestHeader("Referer", location.href);
    http_request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    http_request.setRequestHeader("X-File-Name", encodeURIComponent(name));
    http_request.setRequestHeader("Content-Type", "application/octet-stream");
    http_request.onreadystatechange=ajax_callback(http_request,new_div,name);
    http_request.send(file);
}

// Callback-фунция для отработки AJAX
function ajax_callback(http_request, obj, name) {
    return function() {
        if (http_request.readyState == 4) {
            if (http_request.status==200) {
                // Вернулся javascript
                if (http_request.getResponseHeader("Content-Type")
                        .indexOf("application/x-javascript")>=0) {
                    eval(http_request.responseText);
                }
                // Файл загружен успешно
                else {
                    obj.style.backgroundPosition='0px 0px';
                    obj.innerHTML=(name + ': 100%');
                }
            }
            else {
                // Ошибка загрузки файла
            }
        }
    }
}
//comments
$(document).on('mouseover', '.commentsTask', function(e){ // открываем кнопку удалить коммент
    // $(this).find('.deleteCommentTask').animate({right: "0"}, 700);
    $(this).find('.deleteCommentTask').css('display', 'block');
});
$(document).on('mouseleave', '.commentsTask', function(){// скрываем кнопку удалить коммент
    $(this).find('.deleteCommentTask').css('display', 'none');
});
$(document).on('click', '.btn_group_comments button', function(){ // Добавление комментов
    var text = $(this).parent().find('textarea').val();
    var img = $(this).parent().find('textarea').val();
    var creator_id = $(this).attr('id');
    $('.blockComments').append("<div class='commentsTask'>" +
        "<img src='/images/avatar-6.jpg'><div class='nameCreatorComments'>Гончар Иван, <span class='time'>2 минуты назад</span></div><span class='deleteCommentTask'>Удалить</span><div class='textCommentTask'>" + text + "</div>" +
        "<span>Ответить</span></div>");
    console.log(creator_id);
});