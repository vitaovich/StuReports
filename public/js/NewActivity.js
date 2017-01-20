var numActivities = 0;

function newActivity()
{
  var table = document.getElementById("activitiesTable");
  if(numActivities == 0)
  {
    table.innerHTML = "<tr><th>Title</th><th>Description</th></tr>"
  }
  numActivities++;
  var row = table.insertRow(numActivities);
  var title = row.insertCell(0);
  var description = row.insertCell(1);
  title.innerHTML = '<td><input type="text" class="newActivityTitle" id="newActivityTitle' + numActivities + '">';
  description.innerHTML = '</td><td><input type="text" class="newActivityDescription" id="newActivityDescription' + numActivities + '"></td>';
}
