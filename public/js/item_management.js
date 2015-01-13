$(document).ready(function(){
	 //move items up/down for reordering setting items
    window.orderList = function(list_id, go_up) {
    	var click = $(this);
    	var row = $(this).parent().parent().parent();

    	//console.log(row);

        var index = row.attr('data-a');
        //alert(index);
        if (go_up) {
            if (index == 0)
                return;
            row.insertBefore(row.prev());
        } else {
            row.insertAfter(row.next());
        }

        //list.focus();
    }

});