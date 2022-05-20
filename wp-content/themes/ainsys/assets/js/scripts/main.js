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
	});
	


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
	$('.coockie_close').click(function() {
		$('#coockie').addClass('coockie-disabled');
	});
	$('.country_close').click(function() {
		$('#counrty').addClass('country-disabled');
	});
	$('.tbody_list').click(function() {
		$( this ).toggleClass('tbody_list-disabled');
	});
	$('.rate_delete_first').click(function() {
		$('.rate_first')
		.addClass('rate-disabled');
	});
	$('.rate_delete_second').click(function() {
		$('.rate_second')
		.addClass('rate-disabled');
	});
	$('.rate_delete_third').click(function() {
		$('.rate_third')
		.addClass('rate-disabled');
	});
	$('.rate_delete_fourth').click(function() {
		$('.rate_fourth')
		.addClass('rate-disabled');
	});
	$('.country_select').click(function() {
		$( this )
		.toggleClass('country-active');
	});

	const final_val_initial = parseInt($('#final_val').text()); 
	const users_val_number = parseInt($('#users_val').text()); 
	const operations_val_number = parseInt($('#operations_val').text()); 

	const final_val_initial2 = parseInt($('#final_val_two').text()); 
	const users_val_number2 = parseInt($('#users_val2').text()); 
	const operations_val_number2 = parseInt($('#operations_val2').text());
	
	const var_first = parseInt($('.var_first').text()); 
	const var_second = parseInt($('.var_second').text()); 



	$('#range1').on('change', function() {
		let range_users_val = +$( this )
		.val();
		let users_val_number_new = users_val_number + range_users_val;
		$('#users_val').text(users_val_number_new);
		$('#user_val').text(users_val_number_new);
		
		const operations_val_number_din = parseInt($('#operations_val').text());
		const operations_val_range_din = +$('#range2').val();  
		let final_val_new = final_val_initial + (range_users_val * var_first) + ( (operations_val_range_din / 1000) * var_first);
		$('#final_val').text(final_val_new);
		$('#rate_val').text(final_val_new);


		let users_val_number_new2 = users_val_number2 + range_users_val;
		$('#users_val2').text(users_val_number_new2);
		$('#user_val2').text(users_val_number_new2);
		
		const operations_val_number_din2 = parseInt($('#operations_val2').text()); 
		let final_val_new2 = final_val_initial2 + (range_users_val * var_second) + ((operations_val_range_din / 1000) * var_second);
		$('#final_val_two').text(final_val_new2);
		$('#rate_val2').text(final_val_new2);
	});

	$('#range2').on('change', function() {
		let range_operations_val = +$( this )
		.val();

		let operations_val_number_new = operations_val_number + range_operations_val;
		$('#operations_val').text(operations_val_number_new);
		$('#operation_val').text(operations_val_number_new);

		const users_val_number_din = parseInt($('#users_val').text());
		const users_val_range_din = +$('#range1').val();   
		let final_val_new_two = final_val_initial + ((range_operations_val / 1000) * 350) + (users_val_range_din * 350);
		$('#final_val').text(final_val_new_two);
		$('#rate_val').text(final_val_new_two);


		let operations_val_number_new2 = operations_val_number2 + range_operations_val;
		$('#operations_val2').text(operations_val_number_new2);
		$('#operation_val2').text(operations_val_number_new2);

		const users_val_number_din2 = parseInt($('#users_val2').text()); 
		let final_val_new_two2 = final_val_initial2 + ((range_operations_val / 1000) * 210) + (users_val_range_din * 210);
		$('#final_val_two').text(final_val_new_two2);
		$('#rate_val2').text(final_val_new_two2);
	});

	$( '.form-check-input-rate_page' ).on( 'click', function() {
		$('.rate_page__list')
		.toggleClass('active');

		const final_val_din = parseInt($('#final_val').text()); 

		const final_val_din_two = parseInt($('#final_val_two').text()); 
		// console.log(final_val_din_two);

		if($('.rate_page__list').hasClass('active')){
			let final_val_sale = Math.floor(final_val_din / 0.85);
			$('#final_val').text(final_val_sale);
			$('#rate_val').text(final_val_sale);

			let final_val_sale_two = Math.floor(final_val_din_two / 0.85);
			$('#final_val_two').text(final_val_sale_two);
			$('#rate_val2').text(final_val_sale_two);
		}
		else {
			let final_val_sale = Math.floor(final_val_din * 0.85);
			$('#final_val').text(final_val_sale);
			$('#rate_val').text(final_val_sale);

			let final_val_sale_two = Math.floor(final_val_din_two * 0.85);
			console.log(final_val_sale_two);
			$('#final_val_two').text(final_val_sale_two);
			$('#rate_val2').text(final_val_sale_two);
		}

	});

	
	


	// Range script

	window.addEventListener("DOMContentLoaded",() => {
		let range1 = new rSlider({
			element: "#range1",
			tick: 50
		}),
		range2 = new rSlider({
			element: "#range2",
			tick: 50000
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
