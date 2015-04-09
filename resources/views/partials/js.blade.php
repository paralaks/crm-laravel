  <!-- >script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script -->

  <script src="/js/jquery-2.1.3.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/jquery.datetimepicker.js"></script>

<script>
function submitFormAction(form, action)
{
  var form=document.getElementById(form);

  form.action.value=action;
  form.submit();
}

function expandTextarea(el)
{
  while($(el).outerHeight() < el.scrollHeight + parseFloat($(el).css("borderTopWidth")) + parseFloat($(el).css("borderBottomWidth")))
  {
    $(el).height($(el).height()+1);
  };
}

function updateAccountParentWindow(pId, pName)
{
  $('#account_id', window.opener.document).val(pId);
  $('#account_name', window.opener.document).text(pName);
  window.close();
}

function showHideBlock(pId, pShowHide)
{
  if (pShowHide)
    $('#'+pId).show(250);
  else
    $('#'+pId).hide(250)
}


$(function()
    {
      $("#dateFrom").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});
      $("#dateTo").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});
      $("#start_date").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});
      $("#end_date").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});
      $("#birthdate").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});
      $("#close_date").datepicker({ dateFormat: "yy-mm-dd", changeMonth: true, changeYear: true, yearRange: '-110:+10'});

      $("#remind_at").datetimepicker({ 	formatTime:"H:i", formatDate:"y-m-d", defaultDate:"<?php echo date("Y-m-d"); ?>", defaultTime:"10:00", timepickerScrollbar:false});

      $("#intervalDate").change(function()
        {
          //var tdy=new Date();
          //var tom=new Date(tdy.getFullYear(), tdy.getMonth(), tdy.getDate()+1, 0, 0, 0);
          //$("#dateFrom").val(tdy.toLocaleDateString());
          $("#dateFrom").val("");
          $("#dateTo").val("");
        });

      $("#description").keyup(function(e)
        {
          if (e.which==8 || e.which==46 )
          {
            lineCount = $(this).val().split("\n").length;
            $(this).height(lineCount-1 * parseInt(window.getComputedStyle(document.getElementById("description")).fontSize) );
          }
          expandTextarea(this);
        });

      if (document.getElementById("description"))
        expandTextarea(document.getElementById("description"));

    });

</script>