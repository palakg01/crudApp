$(".btnedit").click((e) => {
  let textArray = updateData(e);

  let id = $("input[name*='id']");
  let bookname = $("input[name*='title']");
  let author = $("input[name*='author']");
  let price = $("input[name*='price']");

  id.val(textArray[0]);
  bookname.val(textArray[1]);
  author.val(textArray[2]);
  price.val(textArray[3].replace("$", ""));
});

function updateData(e) {
  let id = 0;
  let textArray = [];

  const td = document.querySelectorAll(".td-row");
  for (const item of td) {
    if (item.dataset.id == e.target.dataset.id) {
      textArray[id++] = item.textContent;
    }
  }
  return textArray;
}
