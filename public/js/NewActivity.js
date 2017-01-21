var numActivities = 0;
var numRows = 0;

function removeActivity(rowNum)
{
  var row = document.getElementById('rowID' + (rowNum));
  row.outerHTML = "";
  numActivities--;
  if(numActivities == 0)
  {
    deleteTable();
  }
}

function newActivity()
{
  var table = document.getElementById("activitiesTable");
  if(numActivities == 0)
  {
    table.innerHTML = "<tr><th>Title</th><th>Description</th></tr>"
  }
  numActivities++;
  numRows++;
  var row = table.insertRow(numActivities);
  row.id = 'rowID' + numRows;
  var title = row.insertCell(0);
  var description = row.insertCell(1);
  title.innerHTML = '<td><input type="text" name="newActivityTitle[]" class="newActivityTitleClass" required></td>';
  description.innerHTML = '</td><td><input type="text" name="newActivityDescription[]" class="newActivityDescriptionClass" required></td><td><input type="button" onclick="removeActivity(' + (numRows) + ')" id="newActivityButton" value="Delete Activity" /></td>';
}

function addNewActivityButton()
{
  var button = document.createElement("input");
  var table = document.getElementById("activitiesTable");
  var parent = table.parentNode;
  parent.insertBefore(button, table);
  button.outerHTML = '<input type="button" onclick="newActivity()" id="newActivityButton" value="New Activity" />'
  deleteTable();
}

function deleteTable()
{
    var table = document.getElementById("activitiesTable");
    table.innerHTML = "";
}

window.onLoad = addNewActivityButton();
