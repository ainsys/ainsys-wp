jQuery(document).ready(function ($) {


    let wrapperConRegFormDevIp = document.querySelector('.js-reg-dev-form-connectors-ip'),
        itemInSearch = document.getElementsByClassName('js-item-search-reg-form'),
        regFormDev = document.querySelector('.my-acc-reg-form');

    if (regFormDev) {
        let indDevBtn = regFormDev.querySelector('.wpcf7-list-item.first label');

        let btnOpenModalAddWork = document.querySelector('.js-reg-dev-add-work'),
            modalAddWork = document.querySelector('.modal-add-work'),
            sidebarAddWork = document.querySelector('.modal-sidebar-work'),
            body = document.querySelector('html'),
            btnAddAltConnect = document.querySelector('.js-acc-reg-form-plus-alternate');

        //Добавление альтернативных способов связи
        if (btnAddAltConnect) {
            let wrapper = document.querySelector('.reg-dev-form-alternate');
            btnAddAltConnect.addEventListener('click', function (e) {
                let item = document.createElement('div');
                item.classList.add('alternate-item');
                createInput(item, 'text');
                createSelect(['Website', 'Whatsapp', 'Telegram', 'Email', 'Viber', 'Дополнительный номер', 'Почтовый адрес', 'Ссылка на социальную сеть', 'Другое...'], item);
                wrapper.append(item);
            });
        }
        //Добавление опыта работы
        if (btnOpenModalAddWork && modalAddWork && sidebarAddWork) {
            btnOpenModalAddWork.addEventListener('click', (e) => {
                e.preventDefault();
                modalAddWork.classList.add('active');
                sidebarAddWork.classList.add('active');
                body.style.overflowY = 'hidden';
            })

            let btnSaveWork = document.querySelector('.js-add-work-item'),
                wrapper = document.querySelector('.js-wrapper-works-dev'),
                btnExit = document.querySelector('.modal-add-work__exit');

            btnExit.addEventListener('click', e => {
                closeModal(e)
            });

            function closeModal(e) {
                e.preventDefault();
                modalAddWork.classList.remove('active');
                sidebarAddWork.classList.remove('active');
                body.style.overflowY = 'scroll';
            }

            btnSaveWork.addEventListener('click', function (e) {


                let workItem = document.createElement('div'),
                    nowDate = document.querySelector('[name="now-date-work"]'),
                    lastDate = document.querySelector('[name="last-date-work"]'),
                    name = document.querySelector('[name="name-work-item"]'),
                    dol = document.querySelector('[name="name-work-dol"]'),
                    text = document.querySelector('[name="text-work-item"]'),
                    check = document.querySelector('[name="now-date-check"]');


                if (check.checked === true) {
                    lastDate = 'по настоящее время';
                } else {
                    lastDate = document.querySelector('[name="last-date-work"]').value;
                }

                if (nowDate.value === '' || dol.value === '' || name.value === '' || text.value === '') {
                    e.preventDefault();
                    this.innerHTML = 'Заполните все поля!';
                    setTimeout(e => {
                        this.innerHTML = 'Сохранить';
                    }, 3000);
                } else {
                    let deleteElement = document.createElement('div'),
                        editElement = document.createElement('div');

                    deleteElement.classList.add('con-item__delete');
                    editElement.classList.add('con-item__edit');

                    deleteElement.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
                    editElement.innerHTML = `<svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0779 1.61229C10.2368 1.41817 10.4255 1.26419 10.6332 1.15913C10.8409 1.05407 11.0635 1 11.2883 1C11.513 1 11.7356 1.05407 11.9433 1.15913C12.151 1.26419 12.3397 1.41817 12.4986 1.61229C12.6576 1.80642 12.7837 2.03687 12.8697 2.2905C12.9557 2.54413 13 2.81597 13 3.0905C13 3.36503 12.9557 3.63687 12.8697 3.8905C12.7837 4.14413 12.6576 4.37459 12.4986 4.56871L4.32855 14.5466L1 15.6553L1.90779 11.5902L10.0779 1.61229Z" stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/></svg>`;

                    workItem.classList.add('reg-dev-work-item');
                    workItem.innerHTML = `
                        <div class="reg-dev-work-item__header">
                            <span class="reg-dev-work-item__date"><span class="reg-dev-work-item__date-now">${nowDate.value}</span> - <span class="reg-dev-work-item__date-last">${lastDate}</span></span>
                            <span class="reg-dev-work-item__name">${name.value}</span>
                        </div>
                        <div class="reg-dev-work-item__content">
                            <span class="reg-dev-work-item__dol">${dol.value}</span>
                            <div class="reg-dev-work-item__text">${text.value}</div>
                        </div>
                        `;
                    nowDate.value = '';
                    lastDate.value = '';
                    name.value = '';
                    dol.value = '';
                    text.value = '';
                    check.checked = false;
                    workItem.append(deleteElement);
                    workItem.append(editElement);
                    wrapper.appendChild(workItem);
                    closeModal(e);
                    deleteElement.addEventListener('click', function (e) {
                        e.preventDefault();
                        this.parentElement.remove();
                    });

                    editElement.addEventListener('click', function (e) {
                        e.preventDefault();
                        modalAddWork.classList.add('active');
                        sidebarAddWork.classList.add('active');
                        body.style.overflowY = 'hidden';
                        btnSaveWork.innerHTML = 'Редактировать';
                        let parent = this.parentElement,

                            nowDateVal = document.querySelector('.reg-dev-work-item__date'),
                            lastDate = document.querySelector('[name="last-date-work"]'),

                            nameVal = parent.querySelector('.reg-dev-work-item__name').innerHTML,
                            dolVal = parent.querySelector('.reg-dev-work-item__dol').innerHTML,

                            textVal = parent.querySelector('.reg-dev-work-item__text').innerHTML;

                        name.value = nameVal;
                        dol.value = dolVal;
                        text.value = textVal;
                        nowDate.value = nowDateVal;
                        lastDate.value = '';
                        btnExit.addEventListener('click', e => {
                            nowDate.value = '';
                            lastDate.value = '';
                            name.value = '';
                            dol.value = '';
                            text.value = '';
                            check.checked = false;
                            btnSaveWork.innerHTML = 'Сохранить';
                        });
                        btnSaveWork.addEventListener('click', function (e) {
                            nameVal = name.value;
                            dolVal = dol.value;
                            textVal = text.value;
                            btnSaveWork.innerHTML = 'Сохранить';
                            parent.remove();
                            closeModal(e);
                        });
                    });
                }
            });
        }

        //!
        function createInput(wrapper, type, extraClass = 'form__input-text') {
            let input = document.createElement("input"),
                label = document.createElement("label");


            //label.innerHTML = labelText;
            input.type = type;
            input.classList.add('form__input', extraClass);

            if (type == 'number') {
                input.value = 0;
            } else {
                input.placeholder = 'Введите данные';
            }

            label.appendChild(input);
            wrapper.appendChild(label);

        }

        function createSelect(array, wrapper) {

            let selectList = document.createElement("select"),
                label = document.createElement("label");

            //label.innerHTML = labelText;
            selectList.classList.add('form__input', 'form__select');
            wrapper.appendChild(label);
            label.appendChild(selectList);
            for (let i = 0; i < array.length; i++) {
                let option = document.createElement("option");
                option.value = array[i];
                option.text = array[i];
                selectList.appendChild(option);
            }
        }

        let partnerTrigger = document.querySelector('.my-acc-reg-form-partner');

        //Закидывание данных в общий массив формы
        document.addEventListener('wpcf7beforesubmit', function (event) {
            let dopInputs = document.querySelectorAll('.con-item-integration'),
                dopComp = document.querySelectorAll('.con-item-comp'),
                worksItems = document.querySelectorAll('.reg-dev-work-item'),
                alternateItems = document.querySelectorAll('.alternate-item');
            let inputs = event.detail.inputs,
                competencies = {
                    name: 'competencies',
                    value: []
                },
                connectors = {
                    name: "connectors",
                    value: []
                }, works = {
                    name: "works",
                    value: []
                }, alt = {
                    name: "alternateConnect",
                    value: []
                };


            if (dopInputs.length > 0) {
                if (partnerTrigger) {
                    for (let i = 0; i < dopInputs.length; i++) {
                        let name = dopInputs[i].querySelector('.js-reg-name').innerHTML,
                            juniorVal = dopInputs[i].querySelector('label:nth-of-type(1) input').value,
                            middleVal = dopInputs[i].querySelector('label:nth-of-type(2) input').value,
                            middlePlusVal = dopInputs[i].querySelector('label:nth-of-type(3) input').value,
                            seniorVal = dopInputs[i].querySelector('label:nth-of-type(4) input').value,
                            successProjectVal = dopInputs[i].querySelector('label:nth-of-type(5) input').value,
                            projectYearVal = dopInputs[i].querySelector('label:nth-of-type(6) input').value;


                        let connector = {
                            name: name,
                            junior: juniorVal,
                            middle: middleVal,
                            middlePlus: middlePlusVal,
                            senior: seniorVal,
                            successProject: successProjectVal,
                            projectYear: projectYearVal,

                        };
                        connectors.value.push(connector);
                    }

                } else {
                    for (let i = 0; i < dopInputs.length; i++) {
                        let name = dopInputs[i].querySelector('.js-reg-name').innerHTML,
                            competenceVal = dopInputs[i].querySelector('label:nth-of-type(1) select').value,
                            successProjectVal = dopInputs[i].querySelector('label:nth-of-type(2) input').value,
                            projectYearVal = dopInputs[i].querySelector('label:nth-of-type(3) input').value,
                            comExpVal = dopInputs[i].querySelector('label:nth-of-type(4) input').value,
                            lastExpVal = dopInputs[i].querySelector('label:nth-of-type(5) input').value;

                        let connector = {
                            name: name,
                            competence: competenceVal,
                            successProject: successProjectVal,
                            projectYear: projectYearVal,
                            comExp: comExpVal,
                            lastExp: lastExpVal,
                        };
                        connectors.value.push(connector);
                    }

                }
                let hiddenInput = document.querySelector('[name="reg-dev-comp-integr"]');

                hiddenInput.value = JSON.stringify(connectors);
                inputs[18].value = JSON.stringify(connectors);
                console.log(inputs[18].value);
                inputs.push(connectors);

            }

            if (dopComp.length > 0) {
                let hiddenInput = document.querySelector('[name="reg-dev-comp-dev"]');

                for (let i = 0; i < dopComp.length; i++) {
                    let name = dopComp[i].querySelector('.js-reg-name').innerHTML,
                        competenceVal = dopComp[i].querySelector('label:nth-of-type(1) select').value,
                        comExpVal = dopComp[i].querySelector('label:nth-of-type(2) select').value,
                        lastExpVal = dopComp[i].querySelector('label:nth-of-type(3) input').value;

                    let comp = {
                        name: name,
                        competence: competenceVal,
                        comExp: comExpVal,
                        lastExp: lastExpVal,
                    };
                    competencies.value.push(comp);
                }
                hiddenInput.value = JSON.stringify(competencies);
                inputs[17].value = JSON.stringify(competencies);
                console.log(hiddenInput);
                inputs.push(competencies);
            }

            if (worksItems.length > 0) {
                let hiddenInput = document.querySelector('[name="reg-dev-exp-work"]');
                for (let i = 0; i < worksItems.length; i++) {
                    let dateStart = worksItems[i].querySelector('.reg-dev-work-item__date-now').innerHTML,
                        dateEnd = worksItems[i].querySelector('.reg-dev-work-item__date-last').innerHTML,
                        nameOrganization = worksItems[i].querySelector('.reg-dev-work-item__name').innerHTML,
                        position = worksItems[i].querySelector('.reg-dev-work-item__dol').innerHTML,
                        description = worksItems[i].querySelector('.reg-dev-work-item__text').innerHTML;


                    let work = {
                        dateStart: dateStart,
                        dateEnd: dateEnd,
                        nameOrganization: nameOrganization,
                        position: position,
                        description: description
                    };
                    works.value.push(work);
                }
                hiddenInput.value = JSON.stringify(works);
                inputs[19].value = JSON.stringify(works);
                console.log(inputs[19].value);
                console.log(hiddenInput);
                inputs.push(works);
            }

            if (alternateItems.length > 0) {
                let hiddenInput = document.querySelector('[name="reg-dev-alternate-connect"]');

                for (let i = 0; i < alternateItems.length; i++) {
                    let alernateValue = alternateItems[i].querySelector('.alternate-item label:first-child input').value,
                        alternateType = alternateItems[i].querySelector('.alternate-item label:last-child select').value;

                    let alternateItem = {
                        alernateValue: alernateValue,
                        alternateType: alternateType,
                    };
                    alt.value.push(alternateItem);
                }
                hiddenInput.value = JSON.stringify(alt);
                inputs[16].value = JSON.stringify(alt);
                console.log(inputs[16].value);
                console.log(hiddenInput);

                inputs.push(alt);
            }

            let messageSucces = document.querySelector('.reg-dev-succes');

            messageSucces.classList.add('active');

            setTimeout((e) => {
                messageSucces.classList.remove('active');
            }, 5000)


            console.log(inputs);
        }, false);


        //Добавление компетенций по интеграциям
        function checkItemOnConRegForm() {

            for (let i = 0; i < itemInSearch.length; i++) {
                itemInSearch[i].addEventListener('click', function (e) {
                    e.preventDefault();
                    let wrapper = document.createElement('div'),
                        name = document.createElement('div'),
                        img = itemInSearch[i].querySelector('img'),
                        a = itemInSearch[i].querySelector('a'),
                        span = a.querySelector('span');
                    let deleteElement = document.createElement('div');
                    deleteElement.classList.add('con-item__delete');

                    deleteElement.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                `
                    wrapper.append(deleteElement);
                    span.remove();


                    name.classList.add('con-item__name');
                    wrapper.classList.add('con-item', 'con-item-integration');
                    wrapper.append(name);
                    name.append(img);

                    name.innerHTML = name.innerHTML + '<span class="js-reg-name">' + a.innerHTML + '</span>';
                    if (partnerTrigger) {
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                    } else {
                        createSelect(['Junior', 'Middle', 'Middle+', 'Senior'], wrapper);
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'number');
                        createInput(wrapper, 'date');
                    }


                    wrapperConRegFormDevIp.append(wrapper);
                    deleteElement.addEventListener('click', function (e) {
                        e.preventDefault();
                        this.parentElement.remove();
                    });
                    itemInSearch[i].parentElement.parentElement.parentElement.classList.remove('active');
                    itemInSearch[i].parentElement.parentElement.parentElement.querySelector('input').value = '';
                    $('.codyshop-ajax-search').fadeOut().html(result);

                });
            }

            function createInput(wrapper, type, extraClass = 'form__input-text') {
                let input = document.createElement("input"),
                    label = document.createElement("label");

                //label.innerHTML = labelText;
                input.type = type;
                input.classList.add('form__input', extraClass);

                if (type == 'number') {
                    input.value = 0;
                } else {
                    input.placeholder = 'Введите данные';
                }

                wrapper.appendChild(label);
                label.appendChild(input);
            }

            function createSelect(array, wrapper) {

                let selectList = document.createElement("select"),
                    label = document.createElement("label");

                //label.innerHTML = labelText;
                selectList.classList.add('form__input', 'form__select');
                wrapper.appendChild(label);
                label.appendChild(selectList);
                for (let i = 0; i < array.length; i++) {
                    let option = document.createElement("option");
                    option.value = array[i];
                    option.text = array[i];
                    selectList.appendChild(option);
                }
            }
        }

        //Добавление Компетенций
        function checkItemOnCompRegForm() {
            let itemInSearch = document.getElementsByClassName('js-item-search-reg-form-comp');

            for (let i = 0; i < itemInSearch.length; i++) {

                itemInSearch[i].addEventListener('click', function (e) {
                    e.preventDefault();
                    let wrapper = document.createElement('div'),
                        name = document.createElement('div'),
                        img = itemInSearch[i].querySelector('.comp'),
                        a = itemInSearch[i].querySelector('a'),
                        span = a.querySelector('span');

                    let deleteElement = document.createElement('div');
                    deleteElement.classList.add('con-item__delete');

                    deleteElement.innerHTML = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.5 5.00001H4.16667M4.16667 5.00001H17.5M4.16667 5.00001V16.6667C4.16667 17.1087 4.34226 17.5326 4.65482 17.8452C4.96738 18.1577 5.39131 18.3333 5.83333 18.3333H14.1667C14.6087 18.3333 15.0326 18.1577 15.3452 17.8452C15.6577 17.5326 15.8333 17.1087 15.8333 16.6667V5.00001H4.16667ZM6.66667 5.00001V3.33334C6.66667 2.89131 6.84226 2.46739 7.15482 2.15483C7.46738 1.84227 7.89131 1.66667 8.33333 1.66667H11.6667C12.1087 1.66667 12.5326 1.84227 12.8452 2.15483C13.1577 2.46739 13.3333 2.89131 13.3333 3.33334V5.00001M8.33333 9.16667V14.1667M11.6667 9.16667V14.1667" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                `
                    wrapper.append(deleteElement);


                    span.remove();


                    name.classList.add('con-item__name');
                    wrapper.classList.add('con-item', 'con-item-comp');
                    wrapper.append(name);
                    name.append(img);

                    name.innerHTML = name.innerHTML + '<span class="js-reg-name">' + a.innerHTML + '</span>';

                    createSelect(['Junior', 'Middle', 'Middle+', 'Senior'], wrapper);
                    createSelect(['Меньше года', '1-3 года', '3-5 лет', 'Больше 5 лет'], wrapper);
                    createInput(wrapper, 'date');

                    document.querySelector('.reg-dev-form-competetion').append(wrapper);
                    deleteElement.addEventListener('click', function (e) {
                        e.preventDefault();
                        this.parentElement.remove();
                    });

                    itemInSearch[i].parentElement.parentElement.parentElement.classList.remove('active');
                    itemInSearch[i].parentElement.parentElement.parentElement.querySelector('input').value = '';
                    $('.codyshop-ajax-search').fadeOut().html(result);
                });
            }

            function createInput(wrapper, type, extraClass = 'form__input-text') {
                let input = document.createElement("input"),
                    label = document.createElement("label");

                //label.innerHTML = labelText;
                input.type = type;
                input.classList.add('form__input', extraClass);

                if (type == 'number') {
                    input.value = 0;
                } else {
                    input.placeholder = 'Введите данные';
                }

                wrapper.appendChild(label);
                label.appendChild(input);
            }

            function createSelect(array, wrapper) {

                let selectList = document.createElement("select"),
                    label = document.createElement("label");

                //label.innerHTML = labelText;
                selectList.classList.add('form__input', 'form__select');
                wrapper.appendChild(label);
                label.appendChild(selectList);
                for (let i = 0; i < array.length; i++) {
                    let option = document.createElement("option");
                    option.value = array[i];
                    option.text = array[i];
                    selectList.appendChild(option);
                }
            }
        }

        //Видимость формы поиска у компетенций
        let btnPlus = document.querySelectorAll('.js-acc-reg-form-plus');


            btnPlus.forEach((item, i) => {
                item.addEventListener('click', e => {
                    e.preventDefault();
                    item.parentElement.querySelector('.acc-reg-form-plus__search').classList.add('active');
                });
            });
        //Поиск по интеграциям
        $('.search-field-product').keypress(function (eventObject) {
            var searchTerm = $(this).val();
            // проверим, если в поле ввода более 2 символов, запускаем ajax
            if (searchTerm.length > 1) {
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action': 'codyshop_ajax_search',
                        'term': searchTerm
                    },
                    success: function (result) {
                        $('.codyshop-ajax-search-prod').fadeIn().html(result);
                        checkItemOnConRegForm();
                        searchTerm = '';
                    },

                });
            } else {
                $('.codyshop-ajax-search-prod').fadeOut();
            }
        });
        //Поиск по компетенциям
        $('.search-field-comp').keypress(function (eventObject) {
            var searchTerm = $(this).val();
            // проверим, если в поле ввода более 2 символов, запускаем ajax
            if (searchTerm.length > 1) {
                $.ajax({
                    url: '/wp-admin/admin-ajax.php',
                    type: 'POST',
                    data: {
                        'action': 'codyshop_ajax_search_comp',
                        'term': searchTerm
                    },
                    success: function (result) {
                        $('.codyshop-ajax-search-comp').fadeIn().html(result);
                        checkItemOnCompRegForm();
                        searchTerm = '';
                    },

                });
            } else {
                $('.codyshop-ajax-search-comp').fadeOut();
            }
        });
        //Поиск по компетенциям

    }

    $('.search-field-tarifscomp').keypress(function (eventObject) {
        var searchTerm = $(this).val();
        // проверим, если в поле ввода более 2 символов, запускаем ajax
        if (searchTerm.length > 1) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                data: {
                    'action': 'codyshop_ajax_search_tarifsconc',
                    'term': searchTerm
                },
                success: function (result) {
                    $('.codyshop-ajax-search-tarifscomp').fadeIn().html(result);
                    addConcurent();
                    searchTerm = '';
                },

            });
        } else {
            $('.codyshop-ajax-search-tarifscomp').fadeOut();
        }
    });
    let wrapperDopTariffs = document.querySelector('.js-tariffs-conc');

    function addConcurent() {
        let itemInSearch = document.getElementsByClassName('js-item-search-tarifsconc');
        const arrDataFront = wrapperDopTariffs.querySelectorAll('.landing-table-product-info-item .landing-table-prod__value'),
            name = wrapperDopTariffs.querySelector('.landing-table-product__name'),
            lastName = wrapperDopTariffs.querySelector('.landing-table__slogan'),
            price = wrapperDopTariffs.querySelector('.landing-table__price-bold'),
            header = wrapperDopTariffs.querySelector('.landing-table__header'),
            resetBtn = document.querySelector('.js-tarifs-item-reset'),

            inputSearch = wrapperDopTariffs.querySelector('.acc-reg-form-plus__search');

        for (let i = 0; i < itemInSearch.length; i++) {

            itemInSearch[i].addEventListener('click', function (e) {
                e.preventDefault();
                const arrDataBack = itemInSearch[i].querySelectorAll('.js-item-search-tarifsconc__attr'),
                    priceSearch = itemInSearch[i].querySelector('.js-item-search_tarifsconc__price'),
                    nameSearch = itemInSearch[i].querySelector('.js-item-search_tarifsconc__name');
                inputSearch.classList.remove('active');
                header.classList.remove('disabled');
                name.innerHTML = nameSearch.innerHTML;
                lastName.innerHTML = nameSearch.innerHTML;
                price.innerHTML = priceSearch.innerHTML;
                resetBtn.classList.add('active');
                wrapperDopTariffs.querySelector('.landing-table-product').classList.remove('disabled');
                for (let i = 0; arrDataBack.length; i++) {
                    if (arrDataBack[i].innerHTML) {
                        arrDataFront[i].innerHTML = arrDataBack[i].innerHTML;

                    } else {
                        arrDataFront[i].innerHTML = 'Нет данных';
                    }
                }
                $('.codyshop-ajax-search-tarifscomp').fadeOut().html(result);
            });
        }

        function createInput(wrapper, type, extraClass = 'form__input-text') {
            let input = document.createElement("input"),
                label = document.createElement("label");

            //label.innerHTML = labelText;
            input.type = type;
            input.classList.add('form__input', extraClass);

            if (type == 'number') {
                input.value = 0;
            } else {
                input.placeholder = 'Введите данные';
            }

            wrapper.appendChild(label);
            label.appendChild(input);
        }

        function createSelect(array, wrapper) {

            let selectList = document.createElement("select"),
                label = document.createElement("label");

            //label.innerHTML = labelText;
            selectList.classList.add('form__input', 'form__select');
            wrapper.appendChild(label);
            label.appendChild(selectList);
            for (let i = 0; i < array.length; i++) {
                let option = document.createElement("option");
                option.value = array[i];
                option.text = array[i];
                selectList.appendChild(option);
            }
        }
    }

    $(`input[type="tel"]`).mask("9(999)999-99-99");
    $('body').on('click', 'button.plus, button.minus', function () {

        var qty = $(this).parent().find('input'),
            val = parseInt(qty.val()),
            min = parseInt(qty.attr('min')),
            max = parseInt(qty.attr('max')),
            step = parseInt(qty.attr('step'));

        // дальше меняем значение количества в зависимости от нажатия кнопки
        if ($(this).is('.plus')) {
            if (max && (max <= val)) {
                qty.val(max).change();
                $('[name="update_cart"]').trigger('click');
            } else {
                qty.val(val + step).change();
                $('[name="update_cart"]').trigger('click');
            }

        } else {
            if (min && (min >= val)) {
                qty.val(min).change();
            } else if (val > 1) {
                qty.val(val - step).change();
            }
            $('[name="update_cart"]').trigger('click');
        }

    });
    let token = "c19bd1e4befd64fd8ca789c3078dcec314798be9";

    $('#shipping_address_1').suggestions({
        token: token,
        type: "ADDRESS",
        constraints: {
            locations: {country: "*"}
        },
    });
    $('#billing_address_1').suggestions({
        token: token,
        type: "ADDRESS",
        constraints: {
            locations: {country: "*"}
        },
    });
    $('#js-address').suggestions({
        token: token,
        type: "ADDRESS",
        constraints: {
            locations: {country: "*"}
        },
    });
});