<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        .product-input {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .product-input input[type="text"] {
            flex: 1;
            margin-right: 10px;
        }
        .add-button {
            display: block;
            margin-top: 10px;
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Entry Form</h2>
        <form action="insert_data.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" id="company_name" name="company_name" required>
            </div>
            <div class="form-group">
                <label for="company_address">Company Address:</label>
                <input type="text" id="company_address" name="company_address" required>
            </div>
            <div class="form-group">
                <label for="manufacturing_address">Manufacturing Address:</label>
                <input type="text" id="manufacturing_address" name="manufacturing_address" required>
            </div>
            <div class="form-group">
                <label for="valid_until">Valid Until:</label>
                <input type="date" id="valid_until" name="valid_until" required>
            </div>
            <label for="product">Products:</label><br>
            <div class="form-group">
            <div id="product-container">
                <div class="product-input">
                    <input type="text" name="products[]" required>
                    <button type="button" onclick="removeProductField(this)">Remove</button>
                </div>
            </div>
            <span class="add-button" onclick="addProductField()">+ Add another product</span><br><br>
            <div class="form-group">
                <label for="dc_executive_officer">DC Executive Officer:</label>
                <input type="text" id="dc_executive_officer" name="dc_executive_officer" required>
            </div>
            <div class="form-group">
                <label for="auditor">Auditor:</label>
                <input type="text" id="auditor" name="auditor" required>
            </div>
            <div class="form-group">
                <label for="chief_auditor">Chief Auditor:</label>
                <input type="text" id="chief_auditor" name="chief_auditor" required>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        function validateForm() {
            var requiredFields = [
                "company_name",
                "company_address",
                "manufacturing_address",
                "valid_until",
                "dc_executive_officer",
                "auditor",
                "chief_auditor"
            ];

            for (var i = 0; i < requiredFields.length; i++) {
                var field = document.getElementById(requiredFields[i]);
                if (field.value.trim() === "") {
                    alert(field.previousElementSibling.textContent + " is required");
                    return false;
                }
            }

            var productInputs = document.getElementsByName("products[]");
            for (var i = 0; i < productInputs.length; i++) {
                if (productInputs[i].value.trim() === "") {
                    alert("All product fields must be filled out");
                    return false;
                }
            }

            return true;
        }

        function addProductField() {
            var container = document.getElementById("product-container");
            var newProductField = document.createElement("div");
            newProductField.className = "product-input";
            newProductField.innerHTML = `
                <input type="text" name="products[]" required>
                <button type="button" onclick="removeProductField(this)">Remove</button>
            `;
            container.appendChild(newProductField);
        }

        function removeProductField(button) {
            var container = document.getElementById("product-container");
            container.removeChild(button.parentElement);
        }
    </script>
</body>
</html>
