let textarea = document.getElementById("textarea");
let limit = 110;

textarea.oninput = function () {
  textarea.style.height = "";
  textarea.style.height = Math.min(textarea.scrollHeight, limit) + "px";
};
