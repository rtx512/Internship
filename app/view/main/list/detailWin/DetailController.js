Ext.define('scheduleApp.view.main.list.detailWin.DetailController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.detailWin',

    closeDetail: function (me){
        me.up('window').close()
    }
});