document.addEventListener("DOMContentLoaded", function () {
  // Add event listeners for each question
  addEventListenersForQuestion(1);
  addEventListenersForQuestion(2);
  addEventListenersForQuestion(3);
  addEventListenersForQuestion(4);
  addEventListenersForQuestion(5);
  const correctCount = 0;

  // Add event listener for submit button
  const submitButton = document.querySelector('input[type="submit"]');
  submitButton.addEventListener("click", function (event) {
    event.preventDefault();

    // Check answers for each question
    let correctCount = 0;

    // Check answers for each question
    correctCount += checkAnswer(1, "7");
    correctCount += checkAnswer(2, "24");
    correctCount += checkAnswer(3, "26");
    correctCount += checkAnswer(4, "7");
    correctCount += checkAnswer(5, "Camel");

    const percentage = correctCount * 20;

    // Display the result
    const resultParagraph = document.querySelector("#note");
    resultParagraph.textContent = `You got ${correctCount} out of 5 questions correct. ${percentage}%`;
    resultParagraph.style.color = "red";
  });

  const refreshButton = document.querySelector("#refresh");
  refreshButton.addEventListener("click", function (event) {
    event.preventDefault();

    // Clear all radio button selections
    const allOptions = document.querySelectorAll('input[type="radio"]');
    allOptions.forEach((option) => {
      option.checked = false;
    });
    const allLabels = document.querySelectorAll(".options label");
    allLabels.forEach((label) => {
      label.style.color = ""; // Reset color to default
    });
    const resultParagraph = document.querySelector("#note");
    resultParagraph.textContent = `NOTE: Each question is of 10 marks.`;
    resultParagraph.style.color = "#191d63";
  });
});

// Function to handle event listeners for each question
function addEventListenersForQuestion(questionNumber) {
  const options = document.querySelectorAll(
    `input[type="radio"][name="${questionNumber}"]`
  );

  options.forEach((option) => {
    option.addEventListener("change", function () {
      const selectedOption = document.querySelector(
        `input[type="radio"][name="${questionNumber}"]:checked`
      );
      console.log(
        `Selected option for question ${questionNumber}:`,
        selectedOption.value
      );
    });
  });
}

// Function to check answers for each question
function checkAnswer(questionNumber, correctAnswer) {
  const selectedOption = document.querySelector(
    `input[type="radio"][name="${questionNumber}"]:checked`
  );
  if (selectedOption) {
    if (selectedOption.value === correctAnswer) {
      selectedOption.parentElement.style.color = "green"; // Set color to green for correct answer
      selectedOption.classList.add("correct");
      return 1;
    } else {
      selectedOption.parentElement.style.color = "red"; // Set color to red for incorrect answer
      selectedOption.classList.add("incorrect");
      return 0;
    }
  }
}
