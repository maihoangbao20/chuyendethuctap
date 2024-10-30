document.addEventListener('DOMContentLoaded', function () {
    var sizeTypeSelect = document.getElementById('size_type');
    var specificSizesDiv = document.getElementById('specific_sizes');

    function toggleSizeFields() {
        if (sizeTypeSelect.value === 'specific') {
            specificSizesDiv.style.display = 'block';
        } else {
            specificSizesDiv.style.display = 'none';
        }
    }

    sizeTypeSelect.addEventListener('change', toggleSizeFields);
    toggleSizeFields();
    });