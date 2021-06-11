<form action="" method="post">
    <label for=""><span class="iconify" data-icon="fluent:number-symbol-16-regular" data-inline="false"></span> Masukkan NIK Anda</label>
    <input type="number" name="nik" class="form-control" placeholder="Nik Anda Akan Dicek..." onkeyup="showHint(this.value)">
    <span id="searchNik"></span>

<script>
    </form>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("searchNik").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("searchNik").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "getNik.php?nik=" + str, true);
    xmlhttp.send();
  }
}
</script>
