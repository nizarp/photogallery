$('document').ready(function() {    
       
    /** For datePicker **/
    var datePickerOpts = {
        createButton: false
    };
    
    initDatePicker = function(dpObj){
    	dpObj.dpDisplay();
        this.blur();
        return false;
    }
    
    var dobDp = $('#dob').datePicker(datePickerOpts);
    $('#dob-btn').click(function(){ initDatePicker(dobDp); });
    
});