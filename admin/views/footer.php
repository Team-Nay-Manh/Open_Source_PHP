<!-- JS -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.mousewheel.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/admin.js"></script>
<script>
  let item_id = 0;

  function setDeleteItem(id) {
    item_id = id;
  }

  function deleteItem(api, href = './') {
    $.get(api, function(data) {
      window.location.href = href;
    });
  }
</script>
</body>

</html>