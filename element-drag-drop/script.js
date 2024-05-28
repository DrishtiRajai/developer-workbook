var totalCorrect = 0;

$(startGame);

function startGame() {
  totalCorrect = 0;

  $("#msg").hide();
  $("#msg").css({
    left: "200px",
    top: "500px",
  });

  $("#cards").html("");
  $("#slots").html("");

  var numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  numbers.sort(function () {
    return Math.random() - 0.5;
  });

  for (var i = 0; i < 10; i++) {
    $("<div>" + numbers[i] + "</div>")
      .data("number", numbers[i])
      .attr("id", "card-" + numbers[i])
      .appendTo("#cards")
      .draggable({
        containment: "#content",
        stack: "#cards div",
        cursor: "move",
        revert: true,
      });
  }

  var words = [
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine",
    "ten",
  ];
  for (var i = 1; i <= 10; i++) {
    $("<div>" + words[i - 1] + "</div>")
      .data("number", i)
      .appendTo("#slots")
      .droppable({
        accept: "#cards div",
        hoverClass: "hovered",
        drop: handleDrop,
      });
  }
}

function handleDrop(event, ui) {
  var slotNumber = $(this).data("number");
  var cardNumber = ui.draggable.data("number");

  if (slotNumber == cardNumber) {
    ui.draggable.addClass("correct");
    ui.draggable.draggable("disable");
    $(this).droppable("disable");
    ui.draggable.position({ of: $(this), my: "left top", at: "left top" });
    ui.draggable.draggable("option", "revert", false);
    totalCorrect++;
  }

  if (totalCorrect == 10) {
    $("#msg").show();
    $("#msg").animate({
      left: "380px",
      top: "200px",
      width: "400px",
      height: "100px",
      opacity: 1,
    });
  }
}
