window.addEventListener('DOMContentLoaded', () => {
  function setCookie(cname, cvalue) {
    let d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  /* TABS */
  let authParent = document.querySelector('.auth'),
    authLink = document.querySelectorAll('.js-auth-link'),
    authTab = document.querySelectorAll('.js-auth-tab'),
    payInfoLink = document.querySelector('.js-order-link'),
    payInfoTab = document.querySelector('.js-order-tab'),
    accOrderLink = document.querySelectorAll('.js-acc-order-link'),
    accOrderTab = document.querySelectorAll('.js-acc-order-tab'),
    payInfoOrderTab = document.querySelector('.js-order-tab-2'),
    payInfoOrder2Tab = document.querySelector('.js-order-tab-3');
  if (accOrderLink.length > 1 && accOrderTab.length > 1) {
    toggleTabs(accOrderLink, accOrderTab, parent, 'js-acc-order-link')
  }
  if (authParent && authLink.length > 1) {
    authLink[0].addEventListener('click', function (e) {
      e.preventDefault();
      this.classList.add('active');
      authLink[1].classList.remove('active');
      authTab[0].classList.remove('active');
      authTab[1].classList.add('active');
    });
    authLink[1].addEventListener('click', function (e) {
      e.preventDefault();
      this.classList.add('active');
      authLink[0].classList.remove('active');
      authTab[1].classList.remove('active');
      authTab[0].classList.add('active');
    });
  }
  if (payInfoLink && payInfoTab) {
    payInfoLink.addEventListener('click', function (e) {
      if (this.classList.contains('active')) {
        this.classList.remove('active');
        payInfoTab.classList.remove('active');
        payInfoOrderTab.classList.remove('active');
        payInfoOrder2Tab.classList.remove('active');
      } else {
        this.classList.add('active');
        payInfoTab.classList.add('active');
        payInfoOrderTab.classList.add('active');
        payInfoOrder2Tab.classList.add('active');
      }
    });
  }

  let basketItem = document.querySelectorAll('.woocommerce-cart-form__cart-item'),
    basketCommentForm = document.querySelector('#order_comments'),
    body = document.querySelector('html');

  if (basketItem.length > 0 && basketCommentForm) {
    if (getCookie(`basketForm`) !== '') {
      basketCommentForm.value = getCookie(`basketForm`);
    } else {
      setCookie(`basketForm`, basketCommentForm.value);
    }
    for (let i = 0; i < basketItem.length; i++) {
      let link = document.querySelector(`.js-product-state-${i}`),
        modal = document.querySelector(`.js-modal-basket-item-${i}`),
        modalSidebar = document.querySelector(`.modal-sidebar-${i}`),
        btn = document.querySelector(`.modal-basket-item__btn-${i}`),
        textarea = document.querySelector(`.modal-basket-item__text-${i}`),
        name = document.querySelector(`.modal-basket-item__name-${i}`).innerHTML;

      if (getCookie(`textarea-${i}`) !== '') {
        textarea.value = getCookie(`textarea-${i}`);
      } else {
        setCookie(`textarea-${i}`, textarea.value);
      }

      if (btn && textarea) {
        btn.addEventListener('click', function (e) {
          e.preventDefault();
          textarea.value = getCookie(`textarea-${i}`);


          basketCommentForm.value = `${basketCommentForm.value}
                                     -----------------------------
                                     ${name} --- ${textarea.value}`;

          setCookie(`basketForm`, basketCommentForm.value);
          modal.classList.remove('active');
          body.style.overflowY = 'scroll';
          modalSidebar.classList.remove('active');
        })
      }

      if (link) {

        document.addEventListener('click', function (e) {

          let t = e.target;
          if (t && t.classList.contains(`js-product-state-${i}`)) {
            e.preventDefault();
            modal.classList.add('active');
            body.style.overflowY = 'hidden';
            modalSidebar.classList.add('active');
          } else if (t && (t.classList.contains('modal-center__exit') || t.classList.contains('modal-sidebar'))) {
            modal.classList.remove('active');
            body.style.overflowY = 'scroll';
            modalSidebar.classList.remove('active');
          }

        });
      }
    }
  }


  function toggleTabs(link, tabs, parent, classContains) {
    hideTabs(link, tabs);
    showTabs(0, link, tabs);


    parent.addEventListener('click', (e) => {

      if (e.target && e.target.classList.contains(classContains)) {
        e.preventDefault();
        for (let i = 0; i < link.length; i++) {
          if (link[i] === e.target) {
            hideTabs(link, tabs);
            showTabs(i, link, tabs);
          }
        }
      }
    });
  }

  function showTabs(i = 0, link, content) {
    link[i].classList.add('active');
    content[i].classList.add('active');
  }

  function hideTabs(link, content) {
    for (let i = 0; i < link.length; i++) {
      link[i].classList.remove('active');
    }
    for (let i = 0; i < content.length; i++) {
      content[i].classList.remove('active');
    }
  }


});