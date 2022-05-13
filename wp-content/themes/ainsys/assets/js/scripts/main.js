( function( $ ) {

	$(window).on('load', function () {
		setTimeout(function(){ $('#preloader').addClass('preloader-noactive')}, 1000);
	});

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
			$( this )
			  .removeClass('numbers__phone-disabled')
			  .find( '.soc_href' )
			  .removeClass('disabled');
		});
		$('.burger').click(function() {
			$('.socials').toggleClass('socials-active');
			$('.burger span').toggleClass('active');
		});
		$('.close_coockie').click(function() {
			$('#coockie').addClass('coockie-disabled');
		});
		$('.tbody_list').click(function() {
			$( this ).toggleClass('tbody_list-disabled');
		});


		// Range script

		window.addEventListener("DOMContentLoaded",() => {
			let range1 = new rSlider({
				element: "#range1",
				tick: 98
			}),
			range2 = new rSlider({
				element: "#range2",
				tick: 99500
			})
		});
		class rSlider {
			constructor(args) {
				this.el = document.querySelector(args.element);
				this.min = +this.el.min || 0;
				this.max = +this.el.max || 100;
				this.step = +this.el.step || 1;
				this.tick = args.tick || this.step;
				this.addTicks();
				this.dataRange = document.createElement("div");
				this.dataRange.className = "data-range";
				this.el.parentElement.appendChild(this.dataRange,this.el);    
				this.dataValue = document.createElement("div");
				this.dataValue.className = "data-value";
				this.el.parentElement.appendChild(this.dataValue,this.el);    
				this.updatePos();
				this.el.addEventListener("input",() => {
					this.updatePos();
				});
			}
			addTicks() {
				let wrap = document.createElement("div");
				wrap.className = "range";
				this.el.parentElement.insertBefore(wrap,this.el);
				wrap.appendChild(this.el);
				let ticks = document.createElement("div");
				ticks.className = "range-ticks";
				wrap.appendChild(ticks);
				for (let t = this.min; t <= this.max; t += this.tick) {
					let tick = document.createElement("span");
					tick.className = "range-tick";
					ticks.appendChild(tick);
					let tickText = document.createElement("span");
					tickText.className = "range-tick-text";
					tick.appendChild(tickText);
					tickText.textContent = t;
				}
			}    
			getRangePercent() {
				let max = this.el.max,
				min = this.el.min,
				relativeValue = this.el.value - min,
				ticks = max - min,
				percent = relativeValue / ticks;
				return percent;
			}    
			updatePos() {
				let percent = this.getRangePercent(),
				left = percent * 100,
				emAdjust = percent * 3;
				this.dataRange.style.left = `calc(${left}% - ${emAdjust}em)`;
				this.dataValue.innerHTML = this.el.value;
				this.dataValue.style.left = `calc(${left}% - ${emAdjust}em)`;
			}    
		}    



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
