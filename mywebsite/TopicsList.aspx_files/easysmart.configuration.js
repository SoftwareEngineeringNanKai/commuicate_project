/* File Created: 二月 15, 2012 */

function AlertSuccess(content) {

    window.top.showOperationTip(content);
}

function ReturnParentTab() {
    window.top.closeCurrentTab();
}

function RefreshParent() {

    window.top.refreshParent();


}
function InitTable(tableId,hiddenId) {
    $("#" + tableId + " tr:gt(0)").click(function () {
        $("#" + tableId + " tr").removeClass("selectedRow");
        $(this).addClass("selectedRow");
        
        $("#" + hiddenId).val($(this).children("td:first").find(":hidden").val());
    })
}

function showDialog(DialogID, DialogModal) {
    $("#" + DialogID).dialog({
        open: function () {
            $(this).parent().appendTo("form:first");
        },
        modal: DialogModal
        
    });
}
function hideDialog(DialogID) {
    $("#" + DialogID).dialog("destroy");
}

function InitMenu(MenuHandler, MenuID) {
    $("#" + MenuHandler + ",#" + MenuID).hover(
        		function () {
        		    $("#" + MenuID).css("left", $("#" + MenuHandler).position().left);
        		    $("#" + MenuID).css("top", $("#" + MenuHandler).position().top + $("#" + MenuHandler).height());
        		    $("#" + MenuID).show()
        		}, function () {
        		    $("#" + MenuID).hide()
        		})
}