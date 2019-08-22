

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
        </tr>
</table>

<script>
function addRow() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(2);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "<button type='button' onclick='addRow()'>+</button>";
  cell2.innerHTML = "<input type='text'>";
}
</script>
