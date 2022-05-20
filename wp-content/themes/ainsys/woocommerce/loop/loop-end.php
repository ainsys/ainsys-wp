<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
    </ul>
  </div>
</div>
    
<script>
    
    console.log('scripts start');
    var btns = document.querySelectorAll('.qnty-buttons .btn-qnty');
    if(btns){
        btns.forEach(function(key, value){
            key.onclick = function(){
                var inp = key.parentNode.querySelector('.priduct-qnty');
                if(inp){
                   var v = Number(inp.value);
                }
                if(key.classList.contains('plus-btn')){
                   v = v + 1;
                }
                if(key.classList.contains('minus-btn')){
                    if(v>>0){
                        v = v - 1;
                    }
                }
                inp.value = v;
            }
        })
    }

    var li = document.querySelectorAll('.categories-block>a>span');
   
    if(li){
        li.forEach(function(key, value){
            key.onclick = function(){
                 var opens =  document.querySelectorAll('.categories-block>a .dropdown.open');
                if(!key.parentNode.querySelector('.dropdown').classList.contains('open')){
                    opens.forEach(function(key, value){
                        key.classList.remove('open');
                    })
                    key.parentNode.querySelector('.dropdown').classList.add('open');
                    key.parentNode.querySelector('svg').setAttribute('style', 'transform: rotate(180deg)');
                       
                }else{
                    
                    key.parentNode.querySelector('.dropdown').classList.remove('open');
                    key.parentNode.querySelector('svg').removeAttribute('style');
                }
            }
        })
    }

    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
    if(product){
        product.forEach(function(key, value){
            key.setAttribute('style', 'display: none');
            var d = key.getAttribute('data-category');
            if(d.search('Connector') !== -1){
                key.removeAttribute('style');
            }
            
        })
    }
    var no_child = document.querySelectorAll('.no-child');
    if(no_child){
        no_child.forEach(function(key, value){
            key.onclick = function(){
                if(key.classList.contains('active')){
                    key.classList.remove('active');
                    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                    if(product){
                        product.forEach(function(key, value){
                            key.setAttribute('style', 'display: none');
                            var d = key.getAttribute('data-category');
                            if(d.search('Connector') !== -1){
                                key.removeAttribute('style');
                                var a = document.querySelectorAll('.categories-block a');
                                a.forEach(function(key, value){
                                    var t = key.innerText;
                                    
                                    if(t.search('Connector') !== -1){
                                        if(!key.classList.contains('active')){
                                            key.classList.add('active');
                                        }
                                    }
                                })
                                
                            }

                        })
                    }
                    
                }else{
                
                
                    var active = document.querySelector('.categories-block .active');
                    if(active){
                       active.classList.remove('active');
                    }
                    key.classList.add('active');
                    var txt = key.innerText + ' ';
                    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                    if(product){
                        product.forEach(function(key, value){
                            key.setAttribute('style', 'display: none');
                            var d = key.getAttribute('data-category');
                            if(d.search(txt) !== -1){
                                key.removeAttribute('style');
                            }

                        })
                    }
                }
                
            }
        })
    }

    var svg = document.querySelectorAll('.has-child path');
    if(svg){
        svg.forEach(function(key, value){
            key.onclick = function(){
                
                if(!key.parentNode.parentNode.querySelector('.dropdown').classList.contains('open')){
                    var opens =  document.querySelectorAll('.categories-block>a .dropdown.open');
                      opens.forEach(function(key, value){
                        key.classList.remove('open');
                    })
                    key.parentNode.parentNode.querySelector('.dropdown').classList.add('open');
                }else{
                    key.parentNode.parentNode.querySelector('.dropdown').classList.remove('open');
                }
            }
        })
    }

     var dropdown = document.querySelectorAll('.has-child .dropdown li');
	 if(dropdown){
        dropdown.forEach(function(key, value){
            key.onclick = function(){
                if(key.classList.contains('active')){
                    key.classList.remove('active');
                    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                    if(product){
                        product.forEach(function(key, value){
                            key.setAttribute('style', 'display: none');
                            var d = key.getAttribute('data-category');
                            if(d.search('Connector') !== -1){
                                key.removeAttribute('style');
                                var a = document.querySelectorAll('.categories-block a');
                                a.forEach(function(key, value){
                                    var t = key.innerText;
                                     if(t.search('Connector') !== -1){
                                        if(!key.classList.contains('active')){
                                            key.classList.add('active');
                                        }
                                    }
                                })
                                
                            }

                        })
                    }
                    
                }else{
                
                
                    var active = document.querySelector('.categories-block .active');
                    if(active){
                        active.classList.remove('active');
                    }
                    key.classList.add('active');
                    var txt = key.innerText + ' ';
                    var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                    if(product){
                        product.forEach(function(key, value){
                            key.setAttribute('style', 'display: none');
                            var d = key.getAttribute('data-category');
                            if(d.search(txt) !== -1){
                                key.removeAttribute('style');
                            }

                        })
                    }
                    
                }
                
            }
        })
    }
 
    var srch = document.querySelector('.search-block input.search-input');
    if(srch){
        srch.oninput = function(){
            
            var v = srch.value;
            var l = v.length;
            if(l > 2){
                var txt = v;
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.querySelector('.title h3').innerText;
                        console.log(d);
                        if(d.search(txt) !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
            }else{
                var product = document.querySelectorAll('.right-block ul.products.columns-4 .product');
                if(product){
                    product.forEach(function(key, value){
                        key.setAttribute('style', 'display: none');
                        var d = key.getAttribute('data-category');
                        if(d.search('Connector') !== -1){
                            key.removeAttribute('style');
                        }

                    })
                }
                
                
            }
        }
    }

</script>