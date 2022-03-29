Ext.define('scheduleApp.view.main.list.ListController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.list',

    redirect: function() {
        this.redirectTo(`http://127.0.0.1:8000/List/getGroups`)
    }
});
