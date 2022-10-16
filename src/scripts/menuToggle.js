const signIn = document.querySelector(".container--sign-in");
const signUp = document.querySelector(".container--sign-up");
const toggleButtons = document.querySelectorAll(".underline");

function ToggleIt() {
  signIn.classList.toggle("show");
  signUp.classList.toggle("hidden");
}

toggleButtons.forEach((toggleButton) => {
  toggleButton.addEventListener("click", ToggleIt);
});
