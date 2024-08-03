function validateForm() {
    const courseType = document.getElementById("course-type").value;
    const subjectCode = document.getElementById("sub-code").value;

    if (courseType === "CORE") {
        const corePattern = /^[a-zA-Z]{2}\d{5}$/;
        if (!corePattern.test(subjectCode)) {
            alert("For CORE, the first 2 characters should be letters and the next 5 characters should be numbers.");
            return false;
        }
    } else if (courseType === "PE") {
        const pePattern = /^[A-Z]{2}19P\d{2}$/;
        if (!pePattern.test(subjectCode)) {
            alert("For PE, the first 2 characters should be uppercase letters, the 3rd and 4th characters should be '19', the 5th character should be 'P', and the last 2 characters should be numbers.");
            return false;
        }
    } else if (courseType === "OE") {
        const oePattern = /^\d{3}19\d{2}$/;
        if (!oePattern.test(subjectCode)) {
            alert("For OE, the 4th and 5th characters should be '19'.");
            return false;
        }
    }
    return true;
}