Ext.define('scheduleApp.view.main.addendum.AddendumModel', {
    extend: 'Ext.app.ViewModel',

    alias: 'viewmodel.addendum',
    data: {
        form: {
            checkbox: false,
            groupsID: null,
            subjectID: null,
            teacherID: null,
            timeID: null,
            date: null,
            cabinetID: null,
            period: null,
            manyCouples: null
        }
    },

    formulas: {
        checkboxChecked: {
            bind: {
                bindTo: '{form.checkbox}'
            },
            get: function (checkbox) {
                return !checkbox
            }
        },
        addForm: {
            bind: {
                bindTo: '{form}',
                deep: true
            },
            get: function (form) {
                if (form.cabinetID && form.groupsID && form.subjectID && form.teacherID && form.timeID && form.date) {
                    if (form.checkbox) {
                        if (form.period && form.manyCouples) {
                            return false
                        } else {
                            return true
                        }
                    } else {
                        return false
                    }
                } else {
                    return true
                }
            }
        }
    }
});