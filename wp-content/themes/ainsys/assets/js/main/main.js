( function( $ ) {
	$( '.form-check-input-content' ).on( 'click', function() {
		$( this )
			.parent()
			.siblings( '.toggler__switch__label' )
			.toggleClass( 'active' );
		$( this )
			.closest( 'section' )
			.find( '.toggler__screen' )
			.toggleClass( 'active' );
	} );

	$( document ).ready( function() {
		$( '.form-check-input-content' ).click( function() {
			$( '.form-check-input' ).each( function( i, value ) {
				const { id } = value;

				if ( this.checked ) {
					// content
					$( `#pageContentAfter-${ id }` ).removeClass(
						'page__content__active'
					);
					$( `#pageContentBefore-${ id }` ).addClass(
						'page__content__active'
					);
					// label
					$( `#pageSwitchAfter-${ id }` ).removeClass(
						'label_active'
					);
					$( `#pageSwitchBefore-${ id }` ).addClass( 'label_active' );
				} else {
					// content
					$( `#pageContentAfter-${ id }` ).addClass(
						'page__content__active'
					);
					$( `#pageContentBefore-${ id }` ).removeClass(
						'page__content__active'
					);
					// label
					$( `#pageSwitchAfter-${ id }` ).addClass( 'label_active' );
					$( `#pageSwitchBefore-${ id }` ).removeClass(
						'label_active'
					);
				}
			});
		});

		$( '.burger' ).click( function() {
			$( '.burger span' ).toggleClass( 'active' );
			$( '.menu__mob' ).toggleClass( 'animate' );
		});

		$('.numbers__phone-disabled').click(function() {
			$( this ).removeClass('numbers__phone-disabled');
		});


	});


	let animBlock = document.querySelectorAll( '.animBlock' );

	window.addEventListener( 'scroll', () => {
		animBlock.forEach( ( anim ) => {
			if ( pageYOffset > anim.offsetTop - 500 ) {
				anim.classList.add( 'animateBlock' );
			}
		} );
	} );
	var faqParent = document.querySelectorAll(".ewd-ufaq-faqs .ewd-ufaq-faq-div");
var mainFaq = document.querySelector(".ewd-ufaq-faqs");
var loadBlock = document.getElementById("load-more");
var loadLess = document.querySelector(".load-less a");
var loadLink = document.querySelector("#load-more a");
console.log(loadBlock)
for(var i=0; i<faqParent.length; i++){
	if(i>6) {
		faqParent[i].style.display = "none";

	}
}

let currentItems = 6;
loadBlock.addEventListener("click", () => {
	loadLink.classList.add("load-more");
	loadBlock.className = "load-less";
	if(loadLink.textContent == "Ещё") {
		setTimeout(() => {
			const elementList = [...faqParent];

			for (let i = currentItems; i <= currentItems + 5; i++) {
				if (elementList[i]) {
					elementList[i].style.display = 'block';
					loadLink.classList.remove("load-more");
				}

			}
			currentItems += 5;
			if (currentItems >= elementList.length) {
				loadLink.textContent = "Свернуть"
				loadLink.classList.remove("load-more");
				currentItems = 4;
			}
			console.log(currentItems, elementList.length)


		}, 1500)
	}else if(loadLink.textContent == "Свернуть"){
		for(var i=0; i<faqParent.length-1; i++){
			if(i>6) {
				faqParent[i].style.display = "none";
				loadLink.classList.remove("load-more");
			}
		}
		loadLink.textContent = "Ещё"
		loadBlock.className = "load-less";
		window.scrollTo({
			top: mainFaq.offsetTop - 100,
			behavior: "smooth"
		});

	}
})

	// fixed header
	let header = document.querySelector(".header");
	window.addEventListener("scroll", () => {
		if(pageYOffset > 100) {
			header.classList.add("fixed-menu");
		}else {
			header.classList.remove("fixed-menu");
		}
	})
} )( jQuery );
