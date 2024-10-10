var unit =   jQuery('#ingredient_id option:selected').data('unit');
getStockUnit(unit);
jQuery('#ingredient_id').on('change', function() {
    var unit =  jQuery('option:selected').data('unit');;
    getStockUnit(unit);
});

function getStockUnit(unit){
    jQuery('#stockUnitSelect').show();
    
    if(unit == 'kg'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'kg', text: 'kg'}));
            $('#unit').append($('<option>', {value: 'mg', text: 'mg'}));
        } else if(unit =='gm'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'gm', text: 'gm'}));
        }else if(unit == 'ltr'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'ltr', text: 'ltr'}));
            $('#unit').append($('<option>', {value: 'ml', text: 'ml'}));
        }else if(unit == 'ml'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'ml', text: 'ml'}));
        }
         else if(unit == 'dz'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'dz', text: 'dz'}));
        }
        else if(unit == 'piece'){
            $('#unit').empty();
            $('#unit').append($('<option>', {value: 'piece', text: 'piece'}));
        }
    }

   
