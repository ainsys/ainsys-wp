   /* let marks = document.querySelectorAll('.landing-product-info');
    marks.forEach(element => {
        if (element.getElementByTagName('span') == "Да"){
            element.getElementByTagName('span').classList.add('icon', 'icon-true');
        }

    });


    let sliderLandingTable = new Swiper('.swiper-landing-table', {
        spaceBetween: 64,
        slidesPerView: 3,
        watchOverflow: true,
        infinite: false,
        navigation: {
          nextEl: '.landing-table-nav__btn-next',
          prevEl: '.landing-table-nav__btn-prev'
        },
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 15
          },
          768: {
            slidesPerView: 2
          },
          992: {
            spaceBetween: 20,
            slidesPerView: 2
          },
          1100: {
            spaceBetween: 30,
            slidesPerView: 3
          },
          1200: {
            spaceBetween: 64,
            slidesPerView: 3
          }
        }
      });
    document.addEventListener("DOMContentLoaded", (function () {
            var e = document.querySelectorAll(".landing-product-info span");
            if (document.querySelector("#landing-trigger")) {
                var t = document.querySelectorAll(".jsa");
                if (t.length > 0) {
                    var n = function () {
                        for (var e = 0; e < t.length; e++) {
                            var n = t[e], r = n.offsetHeight, i = o(n).top, c = window.innerHeight - r / 4;
                            r > window.innerHeight && (c = window.innerHeight - window.innerHeight / 4), pageYOffset > i - c && pageYOffset < i + r && n.classList.add("active")
                        }
                    };
                    n(), window.addEventListener("scroll", n)
                }
            }
            for (var r = 0; r < e.length; r++) "-" === e[r].innerHTML  "Нет" === e[r].innerHTML  "нет" === e[r].innerHTML  "No" === e[r].innerHTML ? e[r].classList.add("icon", "icon-false") : "Да" !== e[r].innerHTML && "+" !== e[r].innerHTML  e[r].classList.add("icon", "icon-true");

            function o(e) {
                var t = e.getBoundingClientRect(), n = window.pageXOffset  document.documentElement.scrollLeft,
                    r = window.pageYOffset  document.documentElement.scrollTop;
                return {top: t.top + r, left: t.left + n}
            }
        }), !1) */
if(window.location.href == 'https://ainsys.com/'){
    var CharTimeout = 170; // скорость печатания
    var StoryTimeout = 2800; // время ожидания перед переключением

    var Summaries = new Array();
    var SiteLinks = new Array();

        Summaries[0] = 'Получайте';
        Summaries[1] = 'Передавайте';
        Summaries[2] = 'Используйте';
        Summaries[3] = 'Интегрируйте';

    /* Печатание текста - Тиккер
    ----------------------------------------------------------------
    var CharTimeout = 20;
    var StoryTimeout = 7000;
    var Summaries = new Array();
    var SiteLinks = new Array();
        Summaries[0] = "CMS для простых сайтов GetSimple на русском языке";
        SiteLinks[0] = "#link1";
        Summaries[1] = "Spectrum - шикарная тема для WordPress на русском языке";
        SiteLinks[1] = "#link2";
    startTicker();
    */

    function startTicker(){
        massiveItemCount =  Number(Summaries.length); //количество элементов массива
        // Определяем значения запуска
        CurrentStory     = -1;
        CurrentLength    = 0;
        // Расположение объекта
        AnchorObject     = document.getElementById("Ticker");
        runTheTicker();
    }
    // Основной цикл тиккера
    function runTheTicker(){
        var myTimeout;
        // Переход к следующему элементу
        if(CurrentLength == 0){
            CurrentStory++;
            CurrentStory      = CurrentStory % massiveItemCount;
            StorySummary      = Summaries[CurrentStory].replace(/"/g,'-');
        }
        // Располагаем текущий текст в анкор с печатанием
        AnchorObject.innerHTML = StorySummary.substring(0,CurrentLength) + znak();
        // Преобразуем длину для подстроки и определяем таймер
        if(CurrentLength != StorySummary.length){
            CurrentLength++;
            myTimeout = CharTimeout;
        } else {
            CurrentLength = 0;
            myTimeout = StoryTimeout;
        }
        // Повторяем цикл с учетом задержки
        setTimeout("runTheTicker()", myTimeout);
    }
    // Генератор подстановки знака
    function znak(){
        if(CurrentLength == StorySummary.length) return "";
        else return "<span style='color: #3b0a40; font-weight: 400'>|<span>";
    }

    startTicker();

    function faqView(num){
            document.querySelector('.faq-' + num).classList.toggle('view-faq');
        }
    function checkSwitchStep(step) {
      // Получить флажок
      let NumStep = step;
      let checkBox = document.getElementById(NumStep + "-switch");
      let off = document.querySelector(".switch-off");
      let on = document.querySelector(".switch-on");

      if (checkBox.checked == true){
            on.style.color = "#9fa5b3";
            off.style.color = "#AB47BC";
            document.querySelector('.'+NumStep+'-title-1').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-title-2').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-sub-1').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-sub-2').classList.toggle('visible');
        }
       else {
            on.style.color = "#AB47BC";
            off.style.color = "#9fa5b3";
            document.querySelector('.'+NumStep+'-title-1').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-title-2').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-sub-1').classList.toggle('visible');
            document.querySelector('.'+NumStep+'-sub-2').classList.toggle('visible');
        }
    }

    //Поп-ап окно
    function popUpDemo(){
        document.querySelector('.pop-wrapper').classList.toggle('view');
    }

    //Второй экран
    let carts = document.querySelectorAll('.role');
    let cartsParent = document.querySelector('.role-cards');

    cartsParent.addEventListener('mouseover', e => {

        if (e.target && e.target.classList.contains('role')) {
            e.preventDefault();
            smallCarts(e.target);

        }
    });
    cartsParent.addEventListener('mouseout', e => {

        if (e.target && e.target.classList.contains('role')) {
             e.preventDefault();
             defaultCarts(carts);

        }
    });


    function smallCarts(cart){
        carts.forEach(item=>{
            if(item === cart){
                item.classList.add('large');

            }else{
                item.classList.add('small');

            }
        });
    }
    function defaultCarts(cart){
        carts.forEach(item=>{
            item.classList.remove('large', 'small');

        });
    }

    function checkSwitch() {
          // Получить флажок
          let checkBox = document.getElementById("switch");
          let off = document.querySelector(".switch-off");
          let on = document.querySelector(".switch-on");
          let video = document.getElementById("video");
          let ogv = document.getElementById("ogv");
          let mp4 = document.getElementById("mp4");
          let webm = document.getElementById("webm");
          // Если флажок установлен, выводится текст вывода
          if (checkBox.checked == true){
            on.style.color = "#9fa5b3";
            off.style.color = "#AB47BC";
            ogv.src = "/wp-content/themes/hello-elementor/assets/videos/without.ogv";
            mp4.src = "/wp-content/themes/hello-elementor/assets/videos/without.mp4";
            webm.src = "/wp-content/themes/hello-elementor/assets/videos/without.webm";
            video.currentTime = 0;
            video.load();
          } else {
            on.style.color = "#AB47BC";
            off.style.color = "#9fa5b3";
            ogv.src = "/wp-content/themes/hello-elementor/assets/videos/with.ogv";
            mp4.src = "/wp-content/themes/hello-elementor/assets/videos/with.mp4";
            webm.src = "/wp-content/themes/hello-elementor/assets/videos/with.webm";
            video.currentTime = 0;
            video.load();
          }
    }
}