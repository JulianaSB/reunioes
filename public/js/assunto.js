$('.Blocked').change( function() {
    $(this).parents("tr:eq(0)").find(".assunto").prop("disabled", this.checked); 
});