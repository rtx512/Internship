Ext.define('scheduleApp.view.main.list.detailWin.DetailController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.detailWin',
    requires: {

    },

    cancelEditing: function (me){
        me.up('window').close()
    },

    getEditing: function (me){
        let detailWindow = me.up('#detailWindow');

        Ext.Ajax.request({
            url: 'https://127.0.0.1:8000/Grid/updateSchedule',
            params: {
                groupsId: detailWindow.down('#groupId').getValue(),
                subjectId: detailWindow.down('#subjectId').getValue(),
                cabinetId: detailWindow.down('#cabinetId').getValue(),
                teacherId: detailWindow.down('#teacherId').getValue(),
                timeId: detailWindow.down('#timeId').getValue(),
                date: detailWindow.down('#date').getRawValue(),
                id: detailWindow.down('#scheduleId').getValue(),
            },
            success: function () {
                detailWindow.close();
                Ext.ComponentQuery.query('mainSchedule')[0].getStore().reload();
            }
        })
    },

    deletePara: function (me) {
        let detailWindow = me.up('#detailWindow');
        Ext.Ajax.request({
            url: 'https://127.0.0.1:8000/Grid/deleteSchedule',
            params: {
                id: me.up('#detailWindow').down('#scheduleId').getValue()
            },
            success: function () {
                detailWindow.close();
                Ext.ComponentQuery.query('mainSchedule')[0].getStore().reload();
            }
        });
    }
});