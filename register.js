const roleDropdown = document.getElementById("role");
const admin_password_Cont = document.getElementById("admin-password-container");
const admin_password_Input = document.getElementById("admin-password");
const role_value_Input = document.getElementById("role-value");

roleDropdown.addEventListener("change", function () {
  if (this.value === "Admin") {
    admin_password_Cont.style.display = "block";
    admin_password_Input.required = true;
  } else {
    admin_password_Cont.style.display = "none";
    admin_password_Input.required = false;
  }
});

admin_password_Input.addEventListener("input", function () {
  role_value_Input.value = this.value;
});

window.onload = () => {
  if (roleDropdown.value === "Admin") {
    admin_password_Cont.style.display = "block";
    admin_password_Input.required = true;
  } else {
    admin_password_Cont.style.display = "none";
    admin_password_Input.required = false;
  }
};
