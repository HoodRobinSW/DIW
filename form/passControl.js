const passInput = () => {
  const okCheck = document.getElementById("ok");
  const passCheck = document.getElementById("pass_strength_ok");
  const form = document.forms[0];

  if (okCheck.style.display  === "block" && passCheck.style.display === "block") {
    form.action = "../public_HTML/index.html";
    form.submit();
  } else {
    form.action = "#";
    document.getElementById("error").style.display = "block";
  }
}

const whenType = () => {
  const pass = document.getElementById("pass").value;
  const passConfirm = document.getElementById("confirm_pass").value;
  const okCheck = document.getElementById("ok");
  const cross = document.getElementById("cross");
  const passCheck = document.getElementById("pass_strength_ok");
  const passCross = document.getElementById("pass_stregth_cross");
  let upper = false;
  let lower = false;
  document.getElementById("confirm_pass").value = "";
  okCheck.style.display = "none";
  cross.style.display = "none";
  if (pass.length < 8) {
    passCheck.style.display = "none";
    passCross.style.display = "block";
  } else {
    for (x=0;x<pass.length;x++) {
      if (pass[x] >= 'a' && pass[x] <= 'z') {
        lower = true;
      } else if (pass[x] >= 'A' && pass[x] <= 'Z') {
        upper = true;
      }
    }
    if (lower && upper) {
      passCross.style.display = "none";
      passCheck.style.display = "block";
    } else {
      passCheck.style.display = "none";
      passCross.style.display = "block";
    }
  }
}

const whenTypeConfirm = () => {
  const passConfirmCheck = document.getElementById("ok");
  const passConfirmCross = document.getElementById("cross");
  const passCheck = document.getElementById("pass_strength_ok");
  const passCross = document.getElementById("pass_stregth_cross");
  const pass1 = document.getElementById("pass").value;
  const pass2 = document.getElementById("confirm_pass").value;
  if (passCheck.style.display == "block") {
    if (pass1 === pass2) {
      passConfirmCross.style.display = "none";
      passConfirmCheck.style.display = "block";
    } else {
      passConfirmCheck.style.display = "none";
      passConfirmCross.style.display = "block";
    }
  } else {
    passConfirmCheck.style.display = "none";
    passConfirmCross.style.display = "block";
  }
}
