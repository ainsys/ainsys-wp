( function( $ ) {

    const final_val_initial = parseInt($('#final_val').text()); 
    const users_val_number = parseInt($('#users_val').text()); 
    const operations_val_number = parseInt($('#operations_val').text()); 
    
    const final_val_initial2 = parseInt($('#final_val_two').text()); 
    const users_val_number2 = parseInt($('#users_val2').text()); 
    const operations_val_number2 = parseInt($('#operations_val2').text());
    
    const var_first = parseInt($('.var_first').text()); 
    const var_second = parseInt($('.var_second').text()); 
    
    
    
    $('#range1').on('change', function() {
        let range_users_val = +$( this ).val();
    
        let range_operations_val = +$('#range2').val();
    
          if(range_users_val >= users_val_number) {
            let users_val_number_new = range_users_val;
            $('#users_val').text(users_val_number_new);
            $('#user_val').text(users_val_number_new);
            
            const operations_val_range_din = +$('#range2').val();  
            let final_val_new = final_val_initial + ((range_users_val - users_val_number) * var_first) + ( (operations_val_range_din / 1000) * var_first);
            $('#final_val').text(final_val_new);
            $('#rate_val').text(final_val_new);
        }	
        if(range_users_val < users_val_number) {
            $('#users_val').text(users_val_number);
            $('#user_val').text(users_val_number);
            
            const operations_val_range_din = +$('#range2').val();
            let final_val_new = final_val_initial + ( (operations_val_range_din / 1000) * var_first);
            $('#final_val').text(final_val_new);
            $('#rate_val').text(final_val_new);
        }	
    
        if(range_users_val >= users_val_number2) {
            let users_val_number_new2 = range_users_val;
            $('#users_val2').text(users_val_number_new2);
            $('#user_val2').text(users_val_number_new2);
            
            const operations_val_range_din = +$('#range2').val();  
            let final_val_new2 = final_val_initial2 + ((range_users_val - users_val_number2) * var_second) + ( (operations_val_range_din / 1000) * var_second);
            $('#final_val_two').text(final_val_new2);
            $('#rate_val2').text(final_val_new2);
        }	
        
        if(range_users_val < users_val_number2) {
            $('#users_val2').text(users_val_number2);
            $('#user_val2').text(users_val_number2);
            
            const operations_val_range_din = +$('#range2').val(); 
            let final_val_new2 = final_val_initial2 + ( (operations_val_range_din / 1000) * var_second);
            $('#final_val_two').text(final_val_new2);
            $('#rate_val2').text(final_val_new2);
        }	
    
    });
    
    $('#range2').on('change', function() {
        let range_operations_val = +$( this ).val();
    
        let range_users_val = +$('#range1').val();
    
        if(range_operations_val >= operations_val_number) {
            let operations_val_number_new =  range_operations_val;
            $('#operations_val').text(operations_val_number_new);
            $('#operation_val').text(operations_val_number_new);
    
            const users_val_range_din = +$('#range1').val();   
            let final_val_new_two = final_val_initial + (((range_operations_val - operations_val_number) / 1000) * var_first) + (users_val_range_din * var_first);
            $('#final_val').text(final_val_new_two);
            $('#rate_val').text(final_val_new_two);
        }	
        if(range_operations_val < operations_val_number) {
            let operations_val_number_new =  operations_val_number;
            $('#operations_val').text(operations_val_number_new);
            $('#operation_val').text(operations_val_number_new);
    
    
            const users_val_range_din = +$('#range1').val();   
            let users_val_low =  (users_val_range_din * var_first);
    
            let final_val_new_two = final_val_initial + users_val_low;
            $('#final_val').text(final_val_new_two);
            $('#rate_val').text(final_val_new_two);
        }	
    
        if(range_operations_val >= operations_val_number2) {
            let operations_val_number_new2 =  range_operations_val;
            $('#operations_val2').text(operations_val_number_new2);
            $('#operation_val2').text(operations_val_number_new2);
    
            const users_val_range_din = +$('#range1').val();   
            let final_val_new_two2 = final_val_initial2 + (((range_operations_val - operations_val_number2) / 1000) * var_second) + (users_val_range_din * var_second);
            $('#final_val_two').text(final_val_new_two2);
            $('#rate_val2').text(final_val_new_two2);
        }	
        if(range_operations_val < operations_val_number2) {
            let operations_val_number_new2 =  operations_val_number2;
            $('#operations_val2').text(operations_val_number_new2);
            $('#operation_val2').text(operations_val_number_new2);
    
            const users_val_range_din = +$('#range1').val(); 
            let users_val_low2 = (users_val_range_din * var_second);
    
            let final_val_new_two2 = final_val_initial2 + users_val_low2;
            $('#final_val_two').text(final_val_new_two2);
            $('#rate_val2').text(final_val_new_two2);
        }	
    });
    
    $( '.form-check-input-rate_page' ).on( 'click', function() {
        $('.rate_page__list')
        .toggleClass('active');
    
        const final_val_din = parseInt($('#final_val').text()); 
    
        const final_val_din_two = parseInt($('#final_val_two').text()); 
        // console.log(final_val_din);
    
        if($('.rate_page__list').hasClass('active')){
            let final_val_sale = parseInt(final_val_din / 0.85 );
            $('#final_val').text(final_val_sale);
            $('#rate_val').text(final_val_sale);
    
            let final_val_sale_two = parseInt(final_val_din_two / 0.85 );
            console.log(final_val_sale_two);
            $('#final_val_two').text(final_val_sale_two);
            $('#rate_val2').text(final_val_sale_two);
        }
        else {
            let final_val_sale = parseInt(final_val_din - parseInt( final_val_din * 0.15 ) );
            $('#final_val').text(final_val_sale);
            $('#rate_val').text(final_val_sale);
    
            let final_val_sale_two = parseInt(final_val_din_two - parseInt( final_val_din_two * 0.15 ));
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
            this.min = this.el ? +this.el.min : 0;
            this.max = this.el ? +this.el.max : 100;
            this.step = this.el ? +this.el.step : 1;
            this.tick = args.tick || this.step;
            if ( this.el ) {
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
        }
        addTicks() {
            if ( this.el ) {
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

} )( jQuery );    