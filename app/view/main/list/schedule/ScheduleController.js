Ext.define('scheduleApp.view.main.schedule.ScheduleController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.schedule',

    ren: function(value, a, b, c, colIndex) {
        return value[colIndex].subject
    },

    cellClick: function(me, td, cellIndex, record,tr,rowIndex) {
        if (cellIndex === 0){
            return
        }

        let cellData = me.getSelectionModel().getSelection()[0].get('days')[cellIndex];
        cellData.times = me.getSelectionModel().getSelection()[0].get('time');
        Ext.create('scheduleApp.view.main.list.detailWin.Detail', {
            viewModel: {
                data: {
                    schedule: cellData,
                }
            }
        }).show()
    },
});