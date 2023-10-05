// JavaScript Document

/** tooltip **/
$('document').ready(function () {

    $('#myToolTip').tooltip();

});
/** end tooltip **/


/** Question Pagination **/
jQuery(function ($) {

    var items = $("#question-content > div.row");

    var numItems = items.length;

    var perPage = 5;

    // only show the first 2 (or "first per_page") items initially
    items.slice(perPage).hide();

    // now setup pagination
    $("#paginationQ").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function (pageNumber) { // this is where the magic happens
            // someone changed page, lets hide/show trs appropriately
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
        }
    });
});
/** end Question pagination **/

/** Subjective Quiz Pagination **/
jQuery(function ($) {

    var items = $("#subquestion-content > div.row");

    var numItems = items.length;

    var perPage = 5;

    // only show the first 2 (or "first per_page") items initially
    items.slice(perPage).hide();

    // now setup pagination
    $("#sub_pagination").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function (pageNumber) { // this is where the magic happens
            // someone changed page, lets hide/show trs appropriately
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
        }
    });
});
/** End Subjective Quiz Pagination **/

/** Pagination **/
jQuery(function ($) {

    var items = $("#content tbody tr");

    var numItems = items.length;

    var perPage = 5;

    // only show the first 2 (or "first per_page") items initially
    items.slice(perPage).hide();

    // now setup pagination
    $("#pagination").pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function (pageNumber) { // this is where the magic happens
            // someone changed page, lets hide/show trs appropriately
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
        }
    });
});
/** end pagination **/

/** WYSIWYG **/

$('document').ready(function () {
    $('.skill_editor').summernote({
        toolbar: [
            ['heading', ['style']],
            ['style', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
//        toolbar: [
                //[groupname, [button list]]
//            ['fontsize', ['fontsize']]
//        ]
    });
});
/** end WYSIWYG **/
/* Pop up box */
function displayImport(content, target) {
//alert();
    //var content=$(this).data('content');
    //alert(content);
    //return false;
    var modelHtmlStr = '<div class="modal" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importTextModel">'
            + '<div class="modal-dialog" role="document">'
            + '<div class="modal-content">'
            + '<div class="modal-header">'
            + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            + '<h5 class="modal-title">' + content + '</h5>'
            + '</div>'
            + '<div class="modal-body">'
            + '<div class="form-group">'
            + '<label for="message-text" id="" class="control-label"></label>'
            + '<textarea class="form-control legacy" rows="12" id="legacy_text"></textarea>'
            + '</div>'
            + '</div>'
            + '<div class="modal-footer">'
            + '<button type="button" id="importBtn" class="btn btn-success"  data-dismiss="modal">save</button>'
            + '</div>'
            + '</div>'
            + '</div>'
            + '</div>';

    $('body').prepend(modelHtmlStr);
    $('#importModal').modal('show');
    $('#importBtn').click(function () {
        var input_text = $("#legacy_text").val();
        $('#' + target).attr("value", input_text);

//        alert(input_text);
    });
}

/* Pop up for tooltip */
function displayTooltip_old(content) {
//    alert(content);die;
    var modelHtmlStr = '<div class="modal" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importTextModel">'
            + '<div class="modal-dialog" role="document">'
            + '<div class="modal-content">'
            + '<div class="modal-header">'
            // + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            + '<button type="button" id="" class="btn-xs btn-success tooltip_close"  data-dismiss="modal">Close</button>'
            //  + '<h4 class="modal-title"></h4>'
            + '</div>'
            + '<div class="modal-body">'
            + '<div class="form-group">'
            + '<label for="message-text" id="" class="control-label">Characteristics</label>'
            + '<textarea class="form-control legacy" rows="12" id="">' + content + '</textarea>'
            + '</div>'
            + '</div>'
//             + '<div class="modal-footer">'
//             + '<button type="button" id="importBtn" class="btn btn-success"  data-dismiss="modal">Close</button>'
//             + '</div>'
            + '</div>'
            + '</div>'
            + '</div>';

    $('body').prepend(modelHtmlStr);
    $('#importModal').modal('show');
//     $('#importBtn').hover(function(){
//     var input_text= $("#legacy_text").val();
//  //   $('#'+ target).attr("value", input_text);
//
//        //alert(input_text);
//     });
}
/* End of Popup for tooltip*/


/* Pop up for tooltip */
function displayTooltip(content) {
//    alert("content");die;

    var modelHtmlStr = '<div class="modal" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importTextModel">'
            + '<div class="modal-dialog" role="document">'
            + '<div class="modal-content">'
            + '<div class="modal-header" style="background-color:#f4b184">'
             + '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            //+ '<button type="button" id="" class="btn-xs btn-success tooltip_close"  data-dismiss="modal">Close</button>'
              + '<h4 class="modal-title">Characteristics</h4>'
            + '</div>'
            + '<div class="modal-body">'
            + '<div class="form-group">'
            //+ '<label for="message-text" id="" class="control-label">Characteristics</label>'
            + '<label class="legacy" id="">' + content + '</label>'
            + '</div>'
            + '</div>'
//             + '<div class="modal-footer">'
//             + '<button type="button" id="importBtn" class="btn btn-success"  data-dismiss="modal">Close</button>'
//             + '</div>'
            + '</div>'
            + '</div>'
            + '</div>';

    $('body').prepend(modelHtmlStr);
    $('#importModal').modal('show');
//     $('#importBtn').hover(function(){
//     var input_text= $("#legacy_text").val();
//  //   $('#'+ target).attr("value", input_text);
//
//        //alert(input_text);
//     });
}
/* End of Popup for tooltip*/
