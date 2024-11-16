<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details Lookup</title>
    <style>
        #student-details {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Student Details Lookup</h1>
    
    <label for="student-select">Select Student Reg-No:</label>
    <select id="student-select">
        <option value="">Select a student</option>
        <!-- Options will be populated dynamically from the server -->
    </select>

    <div id="student-details"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('student-select');
            const detailsDiv = document.getElementById('student-details');

            // Fetch student registration numbers from the server
            function loadStudentOptions() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'students.php', true);

                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        const students = JSON.parse(xhr.responseText);
                        students.forEach(student => {
                            const option = document.createElement('option');
                            option.value = student.regNo;
                            option.textContent = student.regNo;
                            selectElement.appendChild(option);
                        });
                    } else {
                        detailsDiv.innerHTML = '<p class="error">Failed to load student list.</p>';
                    }
                };

                xhr.onerror = function() {
                    detailsDiv.innerHTML = '<p class="error">Request failed. Please try again.</p>';
                };

                xhr.send();
            }

            // Fetch student details when a new student is selected
            selectElement.addEventListener('change', function() {
                const regNo = selectElement.value;
                
                if (regNo) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', `student-details.php?regNo=${encodeURIComponent(regNo)}`, true);

                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            const student = JSON.parse(xhr.responseText);
                            if (student) {
                                detailsDiv.innerHTML = `
                                    <h2>Student Details</h2>
                                    <p><strong>Registration Number:</strong> ${student.regNo}</p>
                                    <p><strong>Name:</strong> ${student.name}</p>
                                    <p><strong>Course:</strong> ${student.course}</p>
                                    <p><strong>Email:</strong> ${student.email}</p>
                                `;
                            } else {
                                detailsDiv.innerHTML = '<p class="error">Student not found.</p>';
                            }
                        } else {
                            detailsDiv.innerHTML = '<p class="error">Failed to load student details.</p>';
                        }
                    };

                    xhr.onerror = function() {
                        detailsDiv.innerHTML = '<p class="error">Request failed. Please try again.</p>';
                    };

                    xhr.send();
                } else {
                    detailsDiv.innerHTML = '';
                }
            });

            loadStudentOptions(); // Initial call to populate the dropdown
        });
    </script>
</body>
</html>