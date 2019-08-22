

<table id="myTable" border="1">
    <thead>
        <tr>
            <td>เพิ่ม</td>
            <td>สินค้า</td>
        </tr>
    </thead>
        <tr>
            <td><button type='button' onclick='addRow()'>+</button></td>
            <td><input type='text'></td>
            <td><input type="button" value="Delete" onclick="deleteRow(this)"></td>
        </tr>
</table>

<script>
function addRow() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(2);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
   var cell3 = row.insertCell(2);
  cell1.innerHTML = "<button type='button' onclick='addRow()'>+</button>";
  cell2.innerHTML = "<input type='text'>";
  cell3.innerHTML = "<input type='button' value='Delete' onclick='deleteRow(this)'>"
  }
function deleteRow(r) {
  document.getElementById("myTable").deleteRow(0);
}
</script>
