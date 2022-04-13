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
        let data = detailWindow.getViewModel().getData().schedule;
        Ext.Ajax.request({
            url: 'https://127.0.0.1:8000/Grid/updateSchedule',
            params: {
                groupsId: data.group.id,
                subjectId: data.subject.id,
                cabinetId: data.cabinet.id,
                teacherId: data.teacher.id,
                timeId: data.time.id,
                date: data.date,
                id: data.id,
            },
            success: function () {
                detailWindow.close();
                let mainSchedule = Ext.ComponentQuery.query('mainSchedule')[0];
                mainSchedule.getStore().reload();
            }
        })
    },

    deletePara: function (me) {
        let detailWindow = me.up('#detailWindow');
        let data = detailWindow.getViewModel().getData().schedule;
        Ext.Ajax.request({
            url: 'https://127.0.0.1:8000/Grid/deleteSchedule',
            params: {
                id: data.id
            },
            success: function () {
                detailWindow.close();
                Ext.ComponentQuery.query('mainSchedule')[0].getStore().reload();
            }
        });
    }
});