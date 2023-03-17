<form method="get" class="p-4">
  <select name="lang" onchange="this.form.submit()" id="lang" >
    <option default value="en"><?php echo LANG_CHOOSE?></option>
    <option value="en">en</option>
    <option value="fr">fr</option>
  </select>
</form>

<script>
function changeLang() {
  document.cookie = "lang="
}
let editBtnClicked = (editBtn, id, confirmStr) => {
  // check if current todo is being edited or not

  let inputEl = document.getElementById(`todoInput-${id}`);
  let inputValue = inputEl.value;

  if (inputEl.readOnly) {
    inputEl.removeAttribute("readonly"); // make todo's input editable
    inputEl.focus(); // focus on the input for good UX

    // dirty trick to move cursor to the end of the input field
    inputEl.value = "";
    inputEl.value = inputValue;

    console.log(confirmStr)
    editBtn.innerText = confirmStr; // change the button's text to "confirm"
  } else {
    // in this case, the button does the "confirm" task


    if (!inputValue) return; // to prevent empty todo

    location = `index.php?action=do_edit&item_id=${id}&title=${inputValue}`;
  }
};

// return to login page with logging out
function logout() {
  location = "login.php?action=logout";
}

// rediret to signup
function redirect() {
  location = "signup.php";
}
</script>
</body>