Ext.define('scheduleApp.view.main.schedule.ScheduleController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.schedule',

    ren: function(value, a, b, c, colIndex) {
        if (value[colIndex] !== null) {
            return value[colIndex].subject.name
        } else {
            return null
        }
    },

    cellClick: function(me, td, cellIndex, record,tr,rowIndex) {
        if (cellIndex === 0){
            return
        }

        let cellData = me.getSelectionModel().getSelection()[0].get('days')[cellIndex];
        if (cellData != null){
            cellData.times = me.getSelectionModel().getSelection()[0].get('time');
            Ext.create('scheduleApp.view.main.list.detailWin.Detail', {
                viewModel: {
                    data: {
                        schedule: cellData,
                    }
                }
            }).show()
        }
    },
});