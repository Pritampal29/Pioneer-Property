jQuery(document).ready(function ($) {
  $("#datetime-picker").datetimepicker({
    dateFormat: "yy-mm-dd",
    timeFormat: "HH:mm:ss",
    controlType: "select",
    oneLine: true,
    minDate: 0,
  });
});
