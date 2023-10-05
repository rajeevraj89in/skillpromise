function initiateAjax(table, searchId, searchVal, requestFields, callbackFunction, elementID) {
//table - table in database to fing records, searchId & searchVal for where clause in query,
//requestFields - are array of requested fields to be returned by query,
//callbackFunction - is the name of callback function that execute on ajax success
//elementID- is the elementID of html element to be populated with data after ajax success, returned with callback function call
    var dataObject = {};
    dataObject['req_table'] = table;
    dataObject['search_key'] = searchId;
    dataObject['search_value'] = searchVal;
    dataObject['req_fields'] = requestFields;
    var data = JSON.stringify(dataObject);
    $.ajax({
        type: "POST",
        url: base_url + 'ajax_fetch',
        data: data,
        success: function (data) {
            callbackFunction(data, elementID); //
        },
        failure: function (errMsg) {
            alert('Unable to get data !\nCheck Internet connectivity, refresh page and try again.');
        }
    });
}

function requestAjax(functionName, requestID, callbackFunction) {
//    alert(requestID);
    var returnData;
    var dataObject = {};
//    dataObject = requestDataArray; //need to check values are passed properly
    dataObject['data'] = requestID;
    var data = JSON.stringify(dataObject);
    $.ajax({
        type: "POST",
        url: base_url + 'ajax_feeder/' + functionName, //working............
        data: data,
        success: function (data) {
            var myJSONobject = eval("(" + data + ")");
//            myJSONobject = parseInt(myJSONobject);
            callbackFunction(requestID, myJSONobject); //
        },
        failure: function (errMsg) {
            alert('Unable to get data !\nCheck Internet connectivity, refresh page and try again.');
        }
    });
//    alert(returnData);

}

function ajaxCallbackHandler(data, callbackFunction, elementID) {//Handling over to actual/requested callback function
//callbackFunction name to be passed without any quotes
    callbackFunction(data, elementID);
}


function fillSelect(JSONtext, idSelectBox) {
    var $subType = $('#' + idSelectBox);
    JSONobject = eval("(" + JSONtext + ")");
    $subType.empty();
    var tbl = idSelectBox + '';
    if (tbl !== 'quiz') {
        tbl = tbl.substr(0, tbl.length - 1);
    }
    $subType.append($('<option></option>').attr("value", "0").text(' -- Select a ' + tbl + ' -- '));
    $.each(JSONobject, function () {
        $subType.append($('<option></option>').attr("value", this.id).text(this.name));
    });
}

function fillNodeSelect(JSONtext, idSelectBox) {

    var $subType = $('#' + idSelectBox);
    JSONobject = eval("(" + JSONtext + ")");
    $subType.empty();
    $subType.append($('<option></option>').attr("value", parent_id).text(' -- Select a Node -- '));

    $.each(JSONobject, function () {

        $subType.append($('<option></option>').attr("value", this.id).text(this.name));
    });
}


//    $( document ).ready(function() {
//        $("#programs").change(function(){
//            var  getValue=$(this).val();
//            initiateAjax('subprograms','program_id', getValue, ['id', 'name'],'subprograms');
//            });
//    });