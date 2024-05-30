// File: custom.js

document.addEventListener('DOMContentLoaded', function() {
    var showFieldsCheckbox = document.getElementById('showFields');
    var fieldsContainer = document.getElementById('fieldsContainer');

    showFieldsCheckbox.addEventListener('change', function() {
        if (this.checked) {
            fieldsContainer.style.display = 'block';
        } else {
            fieldsContainer.style.display = 'none';
        }
    });
});
