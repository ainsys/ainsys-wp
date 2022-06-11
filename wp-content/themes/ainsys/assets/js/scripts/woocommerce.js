( function( $ ) {
	function showModal( modalForm ) {
		const modal = $( modalForm );
		//let closeModal = $(modal).find('.modal__button--close');
		$( modal ).addClass( 'show' );
	}
	const authBtn = document.getElementById( 'noticeAuthorize' );
	const addModal = document.getElementById( 'modalAddBtn' );

	/*const cardQnt = document.querySelectorAll('.product__qnt ');
	let cartTotal = 0;
	cardQnt.forEach( function(item){
		let value = item.value;
		cartTotal = cartTotal + Number(value);

	})*/

	if ( authBtn ) {
		authBtn.addEventListener( 'click', () => {
			showModal( '#authModal' );
		} );
	}
	if ( addModal ) {
		addModal.addEventListener( 'click', () => {
			showModal( '#addModal' );
		} );
	}

	function addToCard() {
		const btns = document.querySelectorAll(
			'.product__qnt-buttons .btn-qnty'
		);

		let initialValue = 0;

		if ( btns ) {
			btns.forEach( function( item ) {
				item.addEventListener( 'click', function() {
					if ( item.classList.contains( 'not-authorized' ) ) {
						showModal( '#authModal' );
					} else {
						$( '.woocommerce-notices-wrapper' ).html( '' );

						const inputNumber = item.parentNode.querySelector(
							'.product__qnt'
						);
						if ( inputNumber ) {
							let inputValue = Number( inputNumber.value );
							initialValue = inputValue;

							if ( item.classList.contains( 'plus-btn' ) ) {
								inputValue = inputValue + 1;
							}
							if ( item.classList.contains( 'minus-btn' ) ) {
								if ( inputValue > 0 ) {
									inputValue = inputValue - 1;
								}
							}
							inputNumber.value = inputValue;
							inputNumber.dispatchEvent( new Event( 'change' ) );
						}
					}
				} );
			} );
		}
	}
	addToCard();
	//////////

	$( '.products__category-list li' ).each( function() {
		if ( $( this ).find( '.children' ).length > 0 ) {
			$( this ).addClass( 'has-children' );
		}
	} );

	$( '.product__qnt' ).on( 'change', function( e ) {
		e.preventDefault();
		const qty = $( this ).val();
		const cartItemKey = $( this ).data( 'product-id' );
		const input = $( this );

		$.ajax( {
			type: 'POST',
			dataType: 'json',
			url: cart_ajax.ajaxurl,
			data: {
				action: 'ainsys_update_cart',
				cart_item_key: cartItemKey,
				qty,
			},
			success( data ) {
				const fragments = data.fragments;
				//console.log(fragments);
				//$('.button-info ').html(fragments);
				if ( fragments ) {
					$.each( fragments, function( key, value ) {
						$( key ).replaceWith( value );
					} );
					$( document.body ).trigger( 'wc_fragments_loaded' );
				}
			},
			error( data ) {
				$( '.woocommerce-notices-wrapper' ).html( data.responseText );
				input.val( initialValue );
			},
		} );
	} );

	/**
	 * Catalog Filter
	 */
	function ajaxSubmit() {
		const filter = $( '#filter' ),
			$content = $( '#catalogList' ),
			contentBox = $( '.products__right' );
		scrollPage = 2;
		//let filterData = filter.serializeArray(),
		//paged = filterData[5]['value'];
		//console.log(filterData);

		$.ajax( {
			url: filter.attr( 'action' ),
			data: filter.serialize(), // form data
			type: filter.attr( 'method' ), // POST

			beforeSend() {
				contentBox.addClass( 'loader' );
			},
			complete() {
				contentBox.removeClass( 'loader' );
			},
			success( data ) {
				console.log('SEARCH');
				stopFlag();
				const LoadmoreBtn =
					'<div class="products-list__loadmore container grid-container ">\n' +
					'         <button class="products-list__loadmore__btn btn" id="loadmore_btn">Load More</button> <div class="loader loadmore-loader" style="display: none">\n' +
					'       </div>';
				$( '#catalogList' ).html( data ); // insert data
				addToCard();
				const $maxPages = $( '#max-pages' ).data( 'maxpages' );
				console.log( 'MAXPAGE:' + $maxPages );
				console.log( 'CURRENT:' + scrollPage );
				if ( scrollPage < $maxPages ) {
					$( '#catalogList' ).append( LoadmoreBtn );
				}

				$( '#catalogList' ).removeClass( 'fade-deactive' );
				$( '#catalogList' ).addClass( 'fade-active' );
			},
		} );
		//console.log('flag -' + stopFlag());
		return false;
	}
	//helper function for ajax loadmore + search
	function stopFlag() {
		let container = $( '.heroes-list__list' ),
			noResultDiv = container.find( '.no-results' ),
			flag;

		if ( noResultDiv.length > 0 ) {
			flag = 1;
		} else {
			flag = 0;
		}
		//console.log(noResultDiv);
		//console.log('first Flag =' + flag);
		return flag;
	}

	/**
	 * Loadmore
	 *
	 */


		//stopFlag();
		let scrollPage = 2,
			//canBeLoaded = true,
			filter = $('#filter');


		$(document).on('click', '#loadmore_btn', function () {
			let flag = stopFlag();
			//$content = $('body');
			if (flag < 1) {
				$.ajax({
					url: filter.attr('action'),
					data: filter.serialize() + '&paged=' + scrollPage,
					type: 'POST',
					beforeSend: function () {
						//$content.addClass('loader');
						$('#loadmore_btn').hide();
						//$('.loadmore-loader').show();
						flag = 1;
					},
					complete: function(){
						//$('.loadmore-loader').hide();
						//$content.removeClass('loader');

					},
					success: function (data) {

						if (data) {

							$(data).appendTo('#catalogList');

							console.log('LOADMORE');
							let $maxPages = $('#max-pages').data('maxpages');
							setTimeout(function () {

							}, 150);

							scrollPage++;
							if (scrollPage <= $maxPages) {
								$('#loadmore_btn').show();
							}

							$('.no-results').hide();
							$('.no-results').css('width', '100%');
						} else {
							flag = 1;
							$('.no-results').hide();
							$('.no-results').css('width', '100%');
							scrollPage = 2;
						}

					},
				});
			} else {
				$('.catalogList__loadmore').hide();
				$('.no-results').hide();
				$('.no-results').css('width', '100%');

				//scrollPage = 2;
			}


			console.log('paged: '+scrollPage);
			//console.log('max: '+$maxPages);
			return false;

		});

	//Search filter

	$( '.search-input' ).on( 'input', function() {
		const searchValue = $( this ).val().length;

		if ( searchValue < 3 && searchValue !== 0 ) {
			//$('.notification-tooltip').show();
			console.log( 'type more than 3 character' );
		} else {
			//$('.notification-tooltip').hide();
			ajaxSubmit();
		}
	} );
	$('.products__category-list li').on('click', function() {
		let value = $(this).data('filter');
		$('#categoryFilter').val(value);
		ajaxSubmit();
	})

} )( jQuery );
