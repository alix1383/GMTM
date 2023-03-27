function CopyToClipboard(e) {
  var range = document.createRange();
  range.selectNode(document.getElementById(e));
  window.getSelection().removeAllRanges();
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
  alert("Copied Token");
}
