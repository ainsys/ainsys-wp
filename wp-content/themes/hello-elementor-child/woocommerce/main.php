<?php
/**
 * The main template file
 * Template Name: Main Page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

wp_head();
?>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/hello-elementor/assets/css/land.css">
<link rel="stylesheet" type="text/css" href="/wp-content/themes/hello-elementor/assets/css/fonts/Vela Sans/font.css">
<?php
$pageId = get_queried_object()->ID;

get_header()
?>
    <style type="text/css">
        input[type="text"]{
            background: #FFFFFF;
            /* Light grey */

            border: 1px solid #D0D5DD;
            box-sizing: border-box;
            /* Shadow/xs */

            border-radius: 8px;
            cursor: auto;
            margin-top: 20px;
            height: 52px;
            font-size: 15px;
            font-family: Vela Sans;
            font-weight: 500;
        }
        input[type="text"]::placeholder{
            color: #666666;
            font-weight: 500;
        }
        input[type="tel"]{
            background: #FFFFFF;
            /* Light grey */

            border: 1px solid #D0D5DD;
            box-sizing: border-box;
            /* Shadow/xs */

            border-radius: 8px;
            cursor: auto;
            margin-top: 20px;
            height: 52px;
            font-size: 15px;
            font-family: Vela Sans;
            font-weight: 500;
        }
        input[type="email"]{
            background: #FFFFFF;
            /* Light grey */

            border: 1px solid #D0D5DD;
            box-sizing: border-box;
            /* Shadow/xs */

            border-radius: 8px;
            cursor: auto;
            margin-top: 20px;
            height: 52px;
            color: #000000;
            font-size: 15px;
            font-family: Vela Sans;
            font-weight: 500;
        }
        input[type="tel"]::placeholder{
            color: #666666;
            font-weight: 500;
        }
        input[type="email"]::placeholder{
            color: #666666;
            font-weight: 500;
        }
        .wpcf7-list-item-label{
            color: #666666;
            font-size: 15px;
            font-family: Vela Sans;
            font-weight: 500;
        }
        input[type="submit"]{
            margin: 0px auto 0px auto;
            width: 314px;
            height: 60px;
            background: #2E0033;
            border-radius: 32px;
            font-family: 'Vela Sans';
            font-style: normal;
            font-weight: 600;
            font-size: 18px;
            line-height: 28px;
            /* identical to box height, or 156% */

            text-align: center;

            color: #FFFFFF;
            border: none;
        }
        input[type="submit"]:hover{
            background-color: #ab46bc;
        }
        .pop-submit{
            display: flex;
        }
        .wpcf7-spinner{
            display: none;
        }
        .wpcf7-form > p > br{
            display: none;
        }
        .wpcf7-not-valid-tip{
            font-size: 14px;
            font-family: Vela Sans;
            font-weight: 500;
            color: red;
        }
    </style>
<!-- Переключатель -->
    <style type="text/css">
        /* Переключатель - коробка вокруг ползунка */
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
              margin: 0 auto;
              position: relative;
              bottom: 20px;
            }

            /* Скрыть флажок HTML по умолчанию */
            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }

            /* Ползунок */
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ab47bc;
              -webkit-transition: .4s;
              transition: .4s;
            }

            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }

            input:checked + .slider {
              background-color: #cfd0d3;
            }

            input:focus + .slider {
              box-shadow: 0 0 1px #fff;
            }

            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }

            /* Закругленные ползунки */
            .slider.round {
              border-radius: 34px;
            }

            .slider.round:before {
              border-radius: 50%;
            }
    </style>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .wrapper{
            max-width: 1140px  !important;
            margin: 0 auto  !important;
            padding-top: 92px  !important;
        }
        @media (max-width: 1174px){
            .wrapper{
                max-width: 1024px  !important;
            }
        }
        @media (max-width: 1056px){
            .wrapper{
                max-width: 768px  !important;
            }
        }
        .flex-box{
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0 auto;
        }
        .first-screen{
            max-width: 699px;
            margin-top: 40px;
        }
        .big-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 56px;
            line-height: 72px;
            text-align: center;
            letter-spacing: -0.02em;
            color: #2E0033;
        }
        .sub-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 20px;
            line-height: 28px;
            text-align: center;
            color: #2E0033;
        }
        .first-screen-sub{
            max-width: 596px;
            margin-top: 29px;
            margin: 29px auto 18px auto;
        }
        .box-switch{
            max-width: 285px;
            margin: 0 auto;
            z-index: 0;
            height: 34px;
        }
        .switch-text{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 16px;
            line-height: 24px;
            text-align: center;
            letter-spacing: -0.02em;
            margin: 15px;
            position: relative;
            top: 3px;

        }
        .switch-on{
            color: #AB47BC;
        }
        .switch-off{
            color: #8c93a4;
        }
        video{
            width: 65%;
            height: auto;
            margin: 0 auto 127px auto;
            display: block;
            max-height: 650px;
        }
        @media (max-width: 732px){
            video{
                width: 90%;
            }
        }
        @media (max-width: 1024px){
            video{
                width: 75%;
            }
        }
        .fade{
            color: #ab47bc;
        }
    </style>
    <style type="text/css">
        .purple{
            background-color: #2E0033;
            padding-bottom: 70px;
        }
        .white{
            color: #ffffff;
        }
        .title{
            font-family: Vela Sans !important;
            font-style: normal !important;
            font-weight: bold !important;
            font-size: 36px !important;
            line-height: 64px !important;
            text-align: center !important;
            letter-spacing: -0.02em !important;
            margin: 0 auto 16px auto !important;
        }
        .sub-white{
            color: #ffffff;
            max-width: 776px;
            margin: 0 auto 64px auto;
        }
        .role-cards{
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 66px;

        }
        .role-cards-phone{
            width: 100%;
            display: none;
            flex-direction: column;
            justify-content: center;
            margin-bottom: 66px;
        }
        .role{
            background-color: #230026;
            display: flex;
            flex-direction: column;
            margin: 10px;
            padding: 53px 48px 88px 48px;
            border-radius: 12px;
            position: relative;
        }
        .role::before{
          content:'';
          position:absolute;
          top: 0;
          left: 0;
          width: 100%;
          height:100%;
        }
        .icon-1{
            width: 48px !important;
            height: 53px !important;
        }
        .icon-2{
            width: 58px !important;
            height: 48px !important;
        }
        .icon-3{
            width: 53px !important;
            height: 52px !important;
        }
        .card-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 22px;
            line-height: 30px;
            color: #FFFFFF;
            margin-top: 32px;
        }
        .card-desc{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 24px;
            color: #FFFFFF;
            margin-top: 16px;
        }
        .desc-screen{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 24px;
            /* identical to box height, or 133% */

            text-align: center;

            color: #FFFFFF;
        }
        .show-more{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            /* identical to box height, or 150% */

            margin-left: 12px;
            color: #AB47BC;
        }
        .text-3{
            display: none;
        }
        .more-oncard{
            position: absolute;
            bottom: 30px;
            right: 60px;
            display: none;
        }
        .white-form{
            background-color: #ffffff;
            border-radius: 188px;
            padding: 48px 122px 37px 122px;
        }
        .pink{
            background: url(/wp-content/themes/hello-elementor/assets/images/gback-1.jpg) center no-repeat;
            padding-bottom: 92px;
            background-size: cover;
        }
        .form-color{
            font-size: 38px !important;
            line-height: 46px !important;
            /* or 121% */

            text-align: center !important;
            letter-spacing: -0.02em !important;

            /* Primary/Dark */

            color: #2E0033 !important;
        }
        .phone{
            display: none;
        }
        .demo-button{
            max-width: 314px;
            height: 60px;
            left: 311px;
            top: 204px;

            /* Primary/Dark */

            background: #2E0033;
            border-radius: 32px;
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 28px;
            /* identical to box height, or 156% */

            text-align: center;

            color: #FFFFFF;
            border: none;
            margin: 28px auto 0 auto;
            cursor: pointer;
        }
        .demo-button:hover{
            background-color: #ab47bc;
        }
        .pop-up{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            width: 839px;

            background: #ffffff;
            border-radius: 16px;
            padding: 48px;
            box-sizing: border-box;

            position: absolute;
            z-index: 999;
        }
        @media(max-width: 837px){
            .pop-up{
                width: 100%;
            }
        }
        .pop-up > .sub-title{
            margin-bottom: 20px;
        }
        .pop-wrapper{
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            display: none;
            z-index: 998;
        }
        .shadow{
            background-color: #0000009e;
            width: 100%;
            height: 100%;
        }
        .view{
            display: flex;
        }
        .close-pop{
            width: 100%;
            position: absolute;
            box-sizing: border-box;
            left: -20px;
            top: 20px;
        }
        .video{
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: auto;
            z-index: 0;
            max-height: 650px;
            margin-top: 92px;
        }
        .close-pop-img{
            width: 35px;
            height: 35px;
            float: right;
            position: relative;
            transition: 0.2s;
            cursor: pointer;
        }
    </style>
    <style type="text/css">
        .steps-bt{
            color: #2E0033;
            font-weight: bold;
        }
        .step{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 41px;
        }
        .step-info{
            display: flex;
            width: 47%;
            flex-direction: column;
            padding-top: 20px;
        }
        .step-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 36px;
            line-height: 42px;
            letter-spacing: -0.02em;
            color: #2E0033;
            margin-top: 8px;
            margin-left: -1px;
        }
        .step-sub{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 26px;
            color: #2E0033;
            margin-top: 15px;
        }
        .step-switch{
            margin: unset;
            z-index: 0;
        }
        .step-switch{
            margin-left: 0px;
            margin-right: 15px;
        }
        .step-img-box{
            width: 47%;
            display: flex;
            justify-content: right;
        }
        .step-img{
            max-width: 587px;
            width: 100%;
            box-shadow: -9px 9px 3px 0px #AB47BC;
            border-radius: 12px;

        }
        .step:nth-child(odd){
            flex-direction: row-reverse;
        }
        .step:nth-child(odd) > .step-img-box{
            justify-content: left;
        }
    </style>
    <style type="text/css">
        .row-status{
            display: flex;
            width: 100%;
            justify-content: right;
            flex-direction: row;
        }
        .status{
            width: 18%;
            flex-direction: column;
            display: flex;
            justify-content: center;
        }
        .status-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 24px;
            line-height: 28px;
            letter-spacing: -0.02em;
            color: #000000;
            text-align: center;
        }
        .status-price{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 16px;
            line-height: 24px;
            text-align: center;
            color: #000000;
            margin: 14px 0 14px 0;
        }
        .status-create{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            text-align: center;
            color: #FFFFFF !important;
            background: #AB47BC;
            border-radius: 29px;
            width: 137px;
            padding: 6px;
            margin: 0 auto 14px auto;
        }
        .status-more{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 20px;
            color: #AB47BC;
            text-align: center;
            margin-bottom: 41px;
        }
        .status-info{
            width: 28%;

        }
        .info-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 19px;
            line-height: 22px;
            color: #000000;
            margin-bottom: 5px;
            margin-top: 23px;
        }
        .info-sub{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;
            line-height: 115%;
            color: #666666;
            margin-bottom: 23px;
        }
        .status-mark{
            width: 18%;
            display: flex;
        }
        .mark{
            height: 22px;
            width: 22px;
            background-color: #AB47BC;
            margin: auto;
            border-radius: 11px;
            display: flex;
        }
        .mark > img {
            width: 11px;
            height: 9px;
            margin: auto;
        }
        .marks{
            border-bottom: 2px solid #D5D5D5;
        }
        .wrapper > .title{
            margin-bottom: 49px;
        }
    </style>
    <style type="text/css">
        .question{
            display: flex;
            justify-content: left;
            flex-direction: column;
            border-bottom: 2px solid #667085;
            margin-top: 29px;
        }
        .que-info{
            display: flex;
            justify-content: space-between;
            flex-direction: row;
        }
        .que-title{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 24px;
            line-height: 36px;
            letter-spacing: -0.02em;
            text-indent: 20px;
            color: #2E0033;
            margin-bottom: 15px;
        }
        .que-open > img{
            width: 36px;
            height: 36px;
            margin-right: 10px;
        }
        .que-text{
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 24px;
            /* or 150% */

            padding: 20px 50px 25px 20px;
            color: #000000;
            display: none;
        }
        .view-faq{
            display: block;
            transition: 1s;
        }
    </style>
    <style type="text/css">
        @media (max-width: 816px){
            .wrapper{
                padding: 0 30px 0 20px;
            }
        }
        @media (max-width: 660px){
            .big-title{
                font-size: 46px;
            }
            .title{
                font-size: 30px !important;
            }
            .sub-title{
                font-size: 18px !important;
            }
            .step{
                flex-direction: column;
                justify-content: center;
            }
            .step-info{
                margin: 0 auto;
                width: 75%;
            }
            .step-img-box{
                margin: 0 auto;
                width: 75%;
                margin-top: 30px;
            }
            .demo-button{
                width: 100%;
            }
            .white-form{
                border-radius: 0px;
            }
            video{
                width: 100%;
            }
            .step:nth-child(odd){
                flex-direction: column;
            }

        }
        @media (max-width: 450px){
            .step-info{
                margin: 0 auto;
                width: 90%;
            }
            .step-img-box{
                margin: 0 auto;
                width: 90%;
                margin-top: 30px;
            }
            .step-info{
                margin: 0 auto;
                width: 100%;
            }
            .step-img-box{
                margin: 0 auto;
                width: 100%;
                margin-top: 30px;
            }
        }
        @media (max-width: 800px){
            .role-cards{
                display: none;
            }
            .role-cards-phone{
                display: flex;
            }
            .text-phone{
                display: block;
            }
            .white-form{
                padding: 48px 40px 37px 40px;
            }
        }
        .que-open{
            width: 10%;
            float: right;
        }
        .que-title{
            width: 90%;
            float: left;
        }
        .last{
            text-align: left !important;
            width: 100% !important;
            line-height: 48px !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
        .last-screen{
            background: url(/wp-content/themes/hello-elementor/assets/images/gback-2.jpg) center no-repeat;
            margin-top: 102px;
            background-size: cover;
        }
        .pop-upp{
            width: 280px;
            height: 55px;
            left: 311px;
            top: 204px;

            /* Primary/Dark */

            background: #2E0033;
            border-radius: 32px;
            font-family: Vela Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 26px;
            line-height: 36px;
            /* identical to box height, or 100% */

            letter-spacing: -0.02em;

            /* Primary / Main */

            color: #AB47BC;
            /* identical to box height, or 156% */

            text-align: center;

            border: none;
            margin: 28px 0 102px 0;
            cursor: pointer;
            transition: 0.1s;
        }
        .pop-upp:hover{
            background-color: #ffffff;
            transition: 0.1s;
            color: #2e0033;
        }
        .pop-form{
            display: flex;
            justify-content: center;
        }
        .table{
            margin-bottom: 40px;
        }
        @media(max-width: 1056px){
            .status-info{
                display: none;
            }
            .row-status{
                justify-content: space-between;
            }
            .status-mark{
                margin-bottom: 25px;
                flex-direction: column;
            }
            .phone{
                display: block;
                margin-top: 20px;
                margin-bottom: 10px;
                text-align: center;
            }
            .mark{
                margin-top: 10px;
            }
        }
        .white-body{
            background-color: #ffffff;
        } 
    </style>
    <style type="text/css">
        .anim-title {
            overflow: hidden;
            box-sizing: border-box;
            display: block;

            height: 72px;
            max-height: 72px;
            line-height: 72px;

            color: #ab47bc;
        }
        .anim-title ul{
            display: block;
            animation-duration: 9s !important;
            animation-timing-function: ease-in-out;
            animation-delay: 0s;
            animation-iteration-count: infinite !important;
            animation-direction: normal;
            animation-fill-mode: none;
            animation-play-state: running;
            animation-name: anim;
            padding: 0;

        }
        .anim-title > ul > li{
            list-style-type: none;
        }
        @keyframes anim {
            from{
                transform: translateY(0);
            }
            25%{
                transform: translateY(-72px);
            }
            28%{
                transform: translateY(-72px);
            }
            55%{
                transform: translateY(-144px);
            }
            58%{
                transform: translateY(-144px);
            }
            85%{
                transform: translateY(-216px);
            }
            88%{
                transform: translateY(-216px);
            }
            96%{
                transform: translateY(0);
            }
            to{
                transform: translateY(0);
            }
        }
        .wrap-anim{
             display: flex;
             justify-content: center;
        }
        .wrap-video{
            position: relative;
            z-index: 100;
            min-height: 650px;
        }
        .w-video{
            position: relative;
        }
        .small{
            width: 10%;
            transition: 1s;
            height: 110px;
            padding: 30px;
        }
        .small > .text-1{
            display: none;
        }
        .small > .text-2{
            display: none;
        }
        .large{
            width: 80%;
            
        }
        .large > .text-2{
            display: none;
        }
        .large > .text-3{
            display: block;
        }
        .role{
            transition: 0.5s;
        }
    </style>
<section class="white-body">
<!-- Первый экран -->
    <section class="w-video">
        <div class="wrapper wrap-video">
            <div class="flex-box first-screen">
                <div class="big-title">
                    <div class="wrap-anim">
                        >
                        <div class="anim-title">
                            <ul>
                                <li>Интегрируйте</li>
                                <li>Контролируйте</li>
                                <li>Передавайте</li>
                                <li>Исследуйте</li>
                            </ul>
                        </div>
                        <
                    </div>
                    данные Вашего бизнеса
                </div>
                <div class="sub-title first-screen-sub">
                     AINSYS — единая платформа для управления данными, внедрения ИТ решений и бизнес-процессов
                </div>
                <!-- Переключатель -->
                <div class="box-switch">
                    <span class="switch-on switch-text">C AINSYS</span>
                    <label class="switch">
                        <input type="checkbox" id="switch"  onclick="checkSwitch()">
                        <span class="slider round"></span>
                    </label>
                    <span class="switch-off switch-text">Без AINSYS</span>
                </div>
            </div>
        </div>
        <div class="video">
            <video id="video" autoplay muted loop>
                <source id="ogv" src="/wp-content/themes/hello-elementor/assets/videos/with.ogv" type='video/ogg; codecs="theora, vorbis"'>
                <source id="mp4" src="/wp-content/themes/hello-elementor/assets/videos/with.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                <source id="webm" src="/wp-content/themes/hello-elementor/assets/videos/with.webm" type='video/webm; codecs="vp8, vorbis"'>
            </video>
        </div>
    </section>
    <!-- Второй экран -->
    <section class="purple">
        <div class="wrapper purple">
            <div class="flex-box">
                <div class="title white">
                    Узнайте, как AINSYS поможет вам
                </div>
                <div class="sub-title sub-white">
                    Обменивайте данные между системами, автоматизируйте рабочие процессы, ускоряйте инновации и внедрения в компании!
                </div>
                <div class="role-cards">
                    <div class="role role-1">
                        <img class="icon-3" src="/wp-content/themes/hello-elementor/assets/images/Gicon2.png">
                        <div class="card-title text-1">
                            Разработчикам
                        </div>
                        <div class="card-desc text-2">
                            AINSYS разрабатывался как для физ лиц, так и для организаций любого размера.    
                        </div>
                        <div class="card-desc text-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                    <div class="role role-2">
                        <img class="icon-2" src="/wp-content/themes/hello-elementor/assets/images/Gicon1.png">
                        <div class="card-title text-1">
                            Пользователям
                        </div>
                        <div class="card-desc text-2">
                            AINSYS разрабатывался как для физ лиц, так и для организаций любого размера.    
                        </div>
                        <div class="card-desc text-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                    <div class="role role-3">
                        <img class="icon-1" src="/wp-content/themes/hello-elementor/assets/images/Gicon.png">
                        <div class="card-title text-1">
                            Партнерам
                        </div>
                        <div class="card-desc text-2">
                            Партнёры AINSYS получают доступ к заказам на интеграции от наших клиентов.
                        </div>
                        <div class="card-desc text-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                </div>
                <div class="role-cards-phone">
                    <div class="role role-1">
                        <img class="icon-3" src="/wp-content/themes/hello-elementor/assets/images/Gicon2.png">
                        <div class="card-title text-1">
                            Разработчикам
                        </div>
                        <div class="card-desc text-3 text-phone">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                    <div class="role role-2">
                        <img class="icon-2" src="/wp-content/themes/hello-elementor/assets/images/Gicon1.png">
                        <div class="card-title text-1">
                            Пользователям
                        </div>
                        <div class="card-desc text-3 text-phone">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                    <div class="role role-3">
                        <img class="icon-1" src="/wp-content/themes/hello-elementor/assets/images/Gicon.png">
                        <div class="card-title text-1">
                            Партнерам
                        </div>
                        <div class="card-desc text-3 text-phone">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Augue neque ullamcorper tempor in adipiscing integer condimentum tellus. Diam, posuere ac interdum scelerisque. Venenatis eget ipsum, in viverra dolor quam sollicitudin ac sed. Porttitor odio egestas eu magna purus. Lacus fermentum congue amet est. Velit neque sollicitudin vestibulum consectetur sed quisque nisi tincidunt eget. Aliquam, mi malesuada eu est dictum massa. Amet condimentum fermentum nisl, pharetra. Duis molestie mi morbi eget enim amet et.
                        </div>
                        <a href="#" class="show-more more-oncard">Узнать больше</a>
                    </div>
                </div>
                <div class="desc-screen">
                    Сотрудничайте с нами, чтобы обеспечить полную поддержку ваших проектов. 
                    <a href="#" class="show-more">Подробнее</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Третий экран -->
    <section class="pink">
        <div class="wrapper">
            <div class="flex-box white-form">
                <div class="title form-color">
                    Хотите поучаствовать в вебинаре и получить доступ к демо?
                </div>
                <div class="sub-title">
                    Запишитесь на вебинар с демонстрацией возможностей продукта:
                </div>
                <button class="demo-button" onclick="popUpDemo()">
                    Записаться на демонстрацию
                </button>
            </div>
        </div>
    </section>
    <!-- Четвертый экран -->
    <section >
        <div class="wrapper">
            <div class="flex-box">
                <div class="big-title steps-bt">
                    Возможности AINSYS
                </div>
                <div class="step">
                    <div class="step-info">
                        <div class="box-switch step-switch">
                            <span class="switch-on switch-text step-switch">C AINSYS</span>
                            <label class="switch">
                                <input type="checkbox" id="step-1-switch" onclick="checkSwitchStep('step-1',1)">
                                <span class="slider round"></span>
                            </label>
                            <span class="switch-off switch-text">Без AINSYS</span>
                        </div>
                        <div class="step-title step-1-title">
                            Быстрота подключения
                        </div>
                        <div class="step-sub step-1-sub">
                            Интеграция занимает недели, месяц и даже годы!
                        </div>
                    </div>
                    <div class="step-img-box">
                        <img class="step-img step-1-img" src="/wp-content/themes/hello-elementor/assets/images/step-1.png">
                    </div>
                </div>
                <div class="step">
                    <div class="step-info">
                        <div class="box-switch step-switch">
                            <span class="switch-on switch-text step-switch">C AINSYS</span>
                            <label class="switch">
                                <input type="checkbox" id="step-2-switch"  onclick="checkSwitchStep('step-2',2)">
                                <span class="slider round"></span>
                            </label>
                            <span class="switch-off switch-text">Без AINSYS</span>
                        </div>
                        <div class="step-title step-2-title">
                            Методология для внедрений
                        </div>
                        <div class="step-sub step-2-sub">
                            Много сложной документации<br>
                            Много длинных совещаний, много важных людей<br>
                            Больше трата времени<br>
                            Неконтролируемая трата денег<br>
                            Большая команда разработчиков<br>
                            Куча подрядчиков и внедренцев<br>
                        </div>
                    </div>
                    <div class="step-img-box">
                        <img class="step-img step-2-img" src="/wp-content/themes/hello-elementor/assets/images/step-2.png">
                    </div>
                </div>
                <div class="step">
                    <div class="step-info">
                        <div class="box-switch step-switch">
                            <span class="switch-on switch-text step-switch">C AINSYS</span>
                            <label class="switch">
                                <input type="checkbox" id="step-3-switch"  onclick="checkSwitchStep('step-3',3)">
                                <span class="slider round"></span>
                            </label>
                            <span class="switch-off switch-text">Без AINSYS</span>
                        </div>
                        <div class="step-title step-3-title">
                            Минимум участников
                        </div>
                        <div class="step-sub step-3-sub">
                            Куча участников всех мастей, долгие собрания, народ в переговорных
                        </div>
                    </div>
                    <div class="step-img-box">
                        <img class="step-img step-3-img" src="/wp-content/themes/hello-elementor/assets/images/step-3.png">
                    </div>
                </div>
                <div class="step">
                    <div class="step-info">
                        <div class="box-switch step-switch">
                            <span class="switch-on switch-text step-switch">C AINSYS</span>
                            <label class="switch">
                                <input type="checkbox" id="step-4-switch"  onclick="checkSwitchStep('step-4',4)">
                                <span class="slider round"></span>
                            </label>
                            <span class="switch-off switch-text">Без AINSYS</span>
                        </div>
                        <div class="step-title step-4-title">
                            Безопасность данных
                        </div>
                        <div class="step-sub step-4-sub">
                            Данные хранятся где попало<br>
                            Кража данных шпионами<br>
                            Хакеры, вирусы шифровальщики<br>

                        </div>
                    </div>
                    <div class="step-img-box">
                        <img class="step-img step-4-img" src="/wp-content/themes/hello-elementor/assets/images/step-4.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Пятый экран -->
    <section>
        <div class="wrapper">
            <?php echo do_shortcode('[my_elementor_php_output]'); ?>
        </div>
    </section>       
    <!-- Шестой экран -->
    <section>
        <div class="wrapper">
            <div class="flex-box">
                <div class="title form-color">
                    Ответы на популярные вопросы
                </div>
                <div class="question">
                    <div class="que-info" onclick="faqView('1')">
                        <div class="que-title">
                            Ваше решение дорогое?
                        </div>
                        <div class="que-open">
                            <img src="/wp-content/themes/hello-elementor/assets/images/que.png">
                        </div>
                    </div>
                    <div class="que-text faq-1">
                        Для физ лиц с малым количеством запросов – бесплатно. Если вы не тратите наши ресурсы и время – пользуйтесь на здоровье!

                        Для ИП и малого бизнеса – выгоднее и доступнее любого из конкурентов! Для всех, в т.ч. среднего бизнеса и Enterprise – быстро можно попробовать и по нашим расчётам очень быстро окупается! Если вдруг вам кажется дорого? Сомневаетесь, что окупится? Пишите, аргументируйте и договоримся! Хотите больше информации?
                    </div>
                </div>
                <div class="question">
                    <div class="que-info" onclick="faqView('2')">
                        <div class="que-title">
                            Чем вы лучше решения N?
                        </div>
                        <div class="que-open">
                            <img src="/wp-content/themes/hello-elementor/assets/images/que.png">
                        </div>
                    </div>
                    <div class="que-text faq-2">
                        Мы не хотели сделать просто ещё 1 платформу для интеграций! Есть лидеры и уже даже появилось много подражателей. Все обещают быстро, за 5 минут и без программистов. Но мы видим недостаток в сложности настройки любого внедрения и обмена для простых пользователей – т.к. Системная интеграция это вообще непростая задача и требует системного мышления, опыта. Получается, что “избавление” от программистов и интеграторов приводит людей к ещё большим затратам денег, времени. Страдает качество. Поэтому мы сделали платформу максимально простую, прозрачную и доступную для конечного пользователя при этом максимально гибкую, оптимизированную для работы в группах – для взаимодействия представителей клиентов с партнёрами и разработчиками.
                    </div>
                </div>
                <div class="question">
                    <div class="que-info" onclick="faqView('3')">
                        <div class="que-title">
                            Обязательно нужен программист или Ваш партнёр интегратор?
                        </div>
                        <div class="que-open">
                            <img src="/wp-content/themes/hello-elementor/assets/images/que.png">
                        </div>
                    </div>
                    <div class="que-text faq-3">
                        AINSYS это no code, low code платформа для интеграций, обмена данными. Вы сможете сами настроить обмен без кода, и быстрее, и более гибко – мы приготовили готовые сценарии, рецепты и шаблоны, которые позволят настроить обмен с неограниченным количеством систем буквально за минуты. (см инструмент план интеграций). Но AINSYS это не только обмен данными

                        Однако часто оптимизация рабочих процессов бизнеса лишь кажется простой и экономически целесообразнее нанять опытных специалистов и консультантов, которые помогут настроить автоматизацию быстрее, качественнее и оптимизировать её под бизнес-процессы Вашей организации. Для этого мы собираем сообщество специалистов индустрии и оптимизируем наш продукт не только как инструмент для конечного пользователя, но и платформу для управления проектом интеграции вместе с нашими партнёрами.
                    </div>
                </div>
                <div class="question">
                    <div class="que-info" onclick="faqView('4')">
                        <div class="que-title">
                            А сколько у Вас коннекторов к внешним системам?
                        </div>
                        <div class="que-open">
                            <img src="/wp-content/themes/hello-elementor/assets/images/que.png">
                        </div>
                    </div>
                    <div class="que-text faq-4">
                        Пока меньше чем у аналогов нашей системы, но мы очень быстро растём. Мы сделали систему, позволяющую нам создать и подключить коннектор меньше чем за 1 рабочий день программиста. Все коннекторы у нас с открытым исходным кодом – т.е, мы предоставляем конструктор ТЗ – чтобы упростить постановку задачи по интеграции и мы предоставляем API & SDK для программистов. Не хватает какого-то коннектора? Оплатите тариф на год и мы вам его сделаем быстрее чем вы соберёте рабочую группу для интеграции.
                    </div>
                </div>
                <div class="question">
                    <div class="que-info" onclick="faqView('5')">
                        <div class="que-title">
                            Вы новенькие?
                        </div>
                        <div class="que-open">
                            <img src="/wp-content/themes/hello-elementor/assets/images/que.png">
                        </div>
                    </div>
                    <div class="que-text faq-5">
                        Проекту уже больше года. Коллективный опыт нашей команды в разработке, системной интеграции и бизнесе – 100+ лет. Мы сами используем свой продукт в других проектам и протестировали всё на кошечках прежде чем предложить попробовать его Вам. И конечно же, как молодой стартап, мы приготовили для Вас несколько сюрпризов, которых, насколько мы знаем, ни у кого из конкурентов пока ещё нет. 

                        Заметим также, что в ближайшие 5 лет мы точно никуда не денемся, гарантируем поддержку системы. В ближайшие 6 месяцев планируем, что AINSYS будет стремительно развиваться и расти – идей у нас вагон! Не хватает в основном человеческих ресурсов для масштабирования. Если хотите предложить сотрудничество, почитайте про нас в разделе компания или Вакансии.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Седьмой экран -->
    <section class="last-screen">
        <div class="wrapper">
            <div class="flex-box">
                <div class="title white last">
                    Хотите поучаствовать в вебинаре и получить доступ к демо?
                </div>
                <button class="pop-upp" onclick="popUpDemo()">
                    Оставить заявку
                </button>
            </div>
        </div>
    </section>
    <div class="pop-wrapper">
        <div class="shadow" onclick="popUpDemo()">
            
        </div>
        <div class="pop-up">
            <div class="close-pop">
                <img class="close-pop-img" src="/wp-content/themes/hello-elementor/assets/images/close-pop.svg" onclick="popUpDemo()">
            </div>
            <div class="sub-title">
                Запишитесь на вебинар с демонстрацией возможностей продукта:
            </div>
            <div class="pop-form">
                <?php echo do_shortcode( '[contact-form-7 id="3673" title="Main Page ver2.0"]' ); ?>
            </div>
        </div>
    </div>
</section>
</body>
<script type="text/javascript">
    /*let sliderLandingTable = new Swiper('.swiper-landing-table', {
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
    function faqView(num){
            document.querySelector('.faq-' + num).classList.toggle('view-faq');
        }
    function checkSwitchStep(step,Num) {
      // Получить флажок
      let NumStep = step;
      let checkBox = document.getElementById(NumStep + "-switch");
      let off = document.querySelector(".switch-off");
      let on = document.querySelector(".switch-on");
      
      if (checkBox.checked == true){
        on.style.color = "#9fa5b3";
        off.style.color = "#AB47BC";
        if (Num == 1) {
            document.querySelector('.'+NumStep+'-title').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-sub').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-img').src = "/wp-content/themes/hello-elementor/assets/images/grey.png";
        } else if (Num == 2) {
            document.querySelector('.'+NumStep+'-title').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-sub').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-img').src = "/wp-content/themes/hello-elementor/assets/images/grey.png";
        } else if (Num == 3) {
            document.querySelector('.'+NumStep+'-title').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-sub').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-img').src = "/wp-content/themes/hello-elementor/assets/images/grey.png";
        } else if (Num == 4) {
            document.querySelector('.'+NumStep+'-title').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-sub').textContent = "БЕЗ АИНСИС, нужен контент";
            document.querySelector('.'+NumStep+'-img').src = "/wp-content/themes/hello-elementor/assets/images/grey.png";
        }
      } else {
        on.style.color = "#AB47BC";
        off.style.color = "#9fa5b3";
        if (Num == 1) {
            document.querySelector('.'+NumStep+'-title').textContent = "Быстрота подключения";
            document.querySelector('.'+NumStep+'-sub').textContent = "Интеграция занимает недели, месяц и даже годы!";
            document.querySelector('.'+NumStep+'-img').src ='/wp-content/themes/hello-elementor/assets/images/' + NumStep+'.png';
        } else if (Num == 2) {
            document.querySelector('.'+NumStep+'-title').textContent = "Методология для внедрений";
            document.querySelector('.'+NumStep+'-sub').textContent = `Много сложной документации
                                                                    Много длинных совещаний, много важных людей
                                                                    Больше трата времени
                                                                    Неконтролируемая трата денег
                                                                    Большая команда разработчиков
                                                                    Куча подрядчиков и внедренцев`;
            document.querySelector('.'+NumStep+'-img').src ='/wp-content/themes/hello-elementor/assets/images/' +  NumStep+'.png';
        } else if (Num == 3) {
            document.querySelector('.'+NumStep+'-title').textContent = "Минимум участников";
            document.querySelector('.'+NumStep+'-sub').textContent = "Куча участников всех мастей, долгие собрания, народ в переговорных";
            document.querySelector('.'+NumStep+'-img').src ='/wp-content/themes/hello-elementor/assets/images/' +  NumStep+'.png';
        } else if (Num == 4) {
            document.querySelector('.'+NumStep+'-title').textContent = "Безопасность данных";
            document.querySelector('.'+NumStep+'-sub').textContent = `Данные хранятся где попало
                                                                    Кража данных шпионами
                                                                    Хакеры, вирусы шифровальщики`;
            document.querySelector('.'+NumStep+'-img').src ='/wp-content/themes/hello-elementor/assets/images/' +  NumStep+'.png';
        }
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
        console.log(e.target);
        if (e.target && e.target.classList.contains('role')) {
            e.preventDefault();
            smallCarts(e.target);
            console.log('f');
        }
    });
    cartsParent.addEventListener('mouseout', e => {
        console.log(e.target);
        if (e.target && e.target.classList.contains('role')) {
             e.preventDefault();
             defaultCarts(carts);
             console.log('f');
        }
    });


    function smallCarts(cart){
        carts.forEach(item=>{
            if(item === cart){
                item.classList.add('large');
                console.log('1');
            }else{
                item.classList.add('small');
                console.log('2');
            }
        });
    }
    function defaultCarts(cart){
        carts.forEach(item=>{
            item.classList.remove('large', 'small');
            console.log('3');
        });
    }
    /*function Over(big,small1,small2){
        let active = document.querySelector(big);
        let neighbor1 = document.querySelector(small1);
        let neighbor2 = document.querySelector(small2);
        active.style.width = "80%";
        active.querySelector('.text-3').style.display = "inline"
        active.querySelector('.text-2').style.display = "none";
        active.querySelector('.more-oncard').style.display = "inline";
        neighbor1.style.width = "10%";
        neighbor1.style.height = "110px";
        neighbor1.style.padding = "30px";
        neighbor1.querySelector('.text-1').style.display = "none";
        neighbor1.querySelector('.text-2').style.display = "none";
        neighbor2.style.width = "10%";
        neighbor2.style.height = "110px";
        neighbor2.style.padding = "30px";
        neighbor2.querySelector('.text-1').style.display = "none";
        neighbor2.querySelector('.text-2').style.display = "none";
    }
    function Out(big,small1,small2){
        let active = document.querySelector(big);
        let neighbor1 = document.querySelector(small1);
        let neighbor2 = document.querySelector(small2);
        active.style.width = "30%";
        active.querySelector('.text-3').style.display = "none"
        active.querySelector('.text-2').style.display = "inline";
        active.querySelector('.more-oncard').style.display = "none";
        neighbor1.style.width = "30%";
        neighbor1.style.height = "auto";
        neighbor1.style.padding = "53px 48px 88px 48px";
        neighbor1.querySelector('.text-1').style.display = "inline";
        neighbor1.querySelector('.text-2').style.display = "inline";
        neighbor2.style.width = "30%";
        neighbor2.style.height = "auto";
        neighbor2.style.padding = "53px 48px 88px 48px";
        neighbor2.querySelector('.text-1').style.display = "inline";
        neighbor2.querySelector('.text-2').style.display = "inline";
    }*/

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
</script>
<?php



get_footer();