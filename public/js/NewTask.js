var numTasks = 0;
var numRows = 0;

function removeTask(rowNum)
{
  var row = document.getElementById('rowID' + (rowNum));
  row.outerHTML = "";
  numTasks--;
  if(numTasks == 0)
  {
    deleteTable();
  }
}

function newTask()
{
  var table = document.getElementById("tasksTable");
  if(numTasks == 0)
  {
    table.innerHTML = "<tr><th>Title</th><th>Description</th></tr>"
  }
  numTasks++;
  numRows++;
  var row = table.insertRow(numTasks);
  row.id = 'rowID' + numRows;
  var title = row.insertCell(0);
  var description = row.insertCell(1);
  title.innerHTML = '<td><textarea name="newTaskName[]" class="newTaskNameClass" rows="1" required></textarea></td>';
  description.innerHTML = '</td><td><textarea name="newTaskDescription[]" class="newTaskDescriptionClass" rows="1" required></textarea></td><td><input type="button" onclick="removeTask(' + (numRows) + ')" id="newTaskButton" value="Delete Task" /></td>';
}

function addNewTaskButton()
{
  var js = document.getElementById("javascriptDisabled");
  js.outerHTML = "";
  var button = document.createElement("input");
  var table = document.getElementById("tasksTable");
  var parent = table.parentNode;
  parent.insertBefore(button, table);
  button.outerHTML = '<input type="button" onclick="newTask()" id="newTaskButton" value="New Task" />'
  deleteTable();
}

function deleteTable()
{
    var table = document.getElementById("tasksTable");
    table.innerHTML = "";
}

function explainTask(studentId, taskId)
{
  document.getElementById("teammateTaskExplain_" + studentId + ","+ taskId).required = true;
}

function dontExplainTask(studentId, taskId)
{
  document.getElementById("teammateTaskExplain_" + studentId + ","+ taskId).required = false;
}

function explainReasonable(id)
{
  document.getElementById("teammateExpectationsExplanation" + id).required = true;
}

function dontExplainReasonable(id)
{
  document.getElementById("teammateExpectationsExplanation" + id).required = false;
}

function explainHours(id)
{
  document.getElementById("hourEvaluationsExplanation" + id).required = true;
}

function dontExplainHours(id)
{
  document.getElementById("hourEvaluationsExplanation" + id).required = false;
}

window.onLoad = addNewTaskButton();
