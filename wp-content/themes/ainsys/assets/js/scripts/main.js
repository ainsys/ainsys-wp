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


		$('.numbers__phone-disabled').click(function() {
			$( this ).removeClass('numbers__phone-disabled');
		});
		$('.burger').click(function() {
			$('.socials').toggleClass('socials-active');
			$('.burger span').toggleClass('active');
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
	if(loadLink.textContent == "Показать ещё") {
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
		loadLink.textContent = "Показать ещё"
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
