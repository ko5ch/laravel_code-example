$('select[name="category"]').on('change', function() {
    var category = $(this).val();
    var page = 1;
    getData(page, category);
});

$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var category = $('select[name="category"]').val();
        var url = $(this).attr('href');
        var page= url.split('page=')[1];
        getData(page, category);
    });

});

function getData(page, category){
    $.ajax({
        url: '',
        type: "get",
        data: {page: page, category: category},
        datatype: "html",
        beforeSend: function () {
            $('#content').hide();
            $('#pagination').hide();
            $('#loading').show();
        },
        complete: function () {
            $('#loading').hide();
            $('#content').show();
            $('#pagination').show();
        },
        success: function () {
            $('#loading').hide();
            $('#content').show();
            $('#pagination').show();
        }
    })
        .done(function(data){
            $("#tasks_content").empty().html(data);
            location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
            alert('No response from server');
        });
}