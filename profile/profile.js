const optionFocusProfile = (obj) => {
  obj.style.background = '#C1C1C1';document.getElementById('option2').style.backgroundColor = 'white';
}

const optionFocusThemes = (obj) => {
  obj.style.background = '#C1C1C1';document.getElementById('option1').style.backgroundColor = 'white';
}

const fileUpload = () => {
  document.getElementById('fileUpload').click();
}

const loadFile = (event) => {
  let output = document.getElementById('profileImage');
  output.src = URL.createObjectURL(event.target.files[0]);
}
