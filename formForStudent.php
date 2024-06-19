<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "partials/_dbconnect.php";

$insert = false;

// Initialize variables
$firstname = $lastname = $studentNumber = $year = $degreeProgram = $email = $networkProvider = $phone = $month = $day = $birthYear = $streetAddress1 = $streetAddress2 = $city = $state = $postal = "";

$errors = [];

// Collect POST data and validate
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $studentNumber = isset($_POST['studentNumber']) ? $_POST['studentNumber'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $degreeProgram = isset($_POST['degreeProgram']) ? $_POST['degreeProgram'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $networkProvider = isset($_POST['networkProvider']) ? $_POST['networkProvider'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $month = isset($_POST['month']) ? $_POST['month'] : '';
    $day = isset($_POST['day']) ? $_POST['day'] : '';
    $birthYear = isset($_POST['birthYear']) ? $_POST['birthYear'] : '';
    $streetAddress1 = isset($_POST['streetAddress1']) ? $_POST['streetAddress1'] : '';
    $streetAddress2 = isset($_POST['streetAddress2']) ? $_POST['streetAddress2'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $postal = isset($_POST['postal']) ? $_POST['postal'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';

   
    // If all validations pass, proceed with inserting the data
   
    $sql = "INSERT INTO studentdetail (FirstName, LastName, studentNumber, Year, DegreeProgram, Email, Networkprovider, Phone, selectMonth, SelectDay, Selectyear, streetaddresss, streetaddresssecond, cityaddress, postal, state , country, Date) 
    VALUES ('$firstname', '$lastname', '$studentNumber', '$year', '$degreeProgram', '$email', '$networkProvider', '$phone', '$month', '$day', '$birthYear', '$streetAddress1', '$streetAddress2', '$city', '$postal', '$state', '$country', current_timestamp());";
    
    
        // echo "SQL Query: " . $sql; // Print out the SQL query for debugging purposes
    
        if (mysqli_query($conn, $sql)) {
            $insert = true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $insert = false;
        }
    }
    


// Close the connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" type="text/css" href="styleforform.css">
    <script>
        function showAlert(message) {
            alert(message);

        }
    </script>
</head>
<body>

<?php if ($insert): ?>
        <script>
            showAlert("Data successfully inserted!");
        </script>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !$insert): ?>
        <script>
            showAlert("Data insertion failed! Please check your inputs and try again.");
        </script>
    <?php endif; ?>



    <div class="heading">
        <div class="log">
            <div class="image-size"><img src="pictures/rvscet_logo.png" alt="rvslogo"></div>
            <div class="rvscet"><p>RVSCET</p><span>College</span></div>
        </div>
        <div class="address">
            <span>Rvs COLLEGE</span><br>
            <span>123 Maple Street, Houston, TX, 77002</span><br>
            <span>example@example.com</span><br>
            <span>www.example.com</span><br>
            <span>(123) 1234567</span><br>
        </div>
    </div>
    <div class="allInformation">
        <div class="addmissionForm">Student Registration Form</div>
        <div class="basicInformation">Basic Information Of Student</div>
        <form id="admissionForm" action="formForStudent.php" method="post">
            <div class="admissionform">
                <div class="name">Full Name</div>
                <div class="nameBox">
                    <div class="nameTypefirst">
                        <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" class="inputText">
                        <span>First Name</span>
                        <?php if (isset($errors['firstname'])): ?>
                            <p class="error"><?= $errors['firstname'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="nameTypeLast">
                        <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" class="inputText">
                        <span>Last Name</span>
                        <?php if (isset($errors['lastname'])): ?>
                            <p class="error"><?= $errors['lastname'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="nameBox2 nameBox">
                    <div class="nameTypefirst">
                        <span class="naming">Student Number</span><br><br>
                        <input type="text" name="studentNumber" id="studentNumber" placeholder="Enter your student number" class="inputText">
                        <span>e.g. 11183021</span>
                        <?php if (isset($errors['studentNumber'])): ?>
                            <p class="error"><?= $errors['studentNumber'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="nameTypeLast">
                        <span class="naming">Year Level</span><br><br>
                        <input type="text" name="yearLevel" id="yearLevel" placeholder="Enter your year level" class="inputText">
                        <span>for Incoming A.Y. '12-'13</span>
                        <?php if (isset($errors['yearLevel'])): ?>
                            <p class="error"><?= $errors['yearLevel'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="nameBox2 nameBox">
                    <div class="nameTypefirst">
                        <span class="naming">Degree Program</span><br><br>
                        <select name="degreeProgram" id="degreeProgram">
                            <option value="Option">Options please select</option>
                            <option value="Btech in Computer Science ">Btech in Computer Science</option>
                            <option value="Btech in Civil">Btech in Civil</option>
                            <option value="Btech in Electronics">Btech in Electronics</option>
                            <option value="Btech in Mechnical">Btech in Mechanical</option>
                            <option value="Btech in Electrical">Btech in Electrical</option>
                            <option value="BBA">BBA(Bechlor of Bussiness Administration)</option>
                            <option value="BCA">BCA(Bechlor of Computer Application)</option>
                            <option value="MBA">MBA(Master in Bussiness Administration)</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                        </select>
                        <?php if (isset($errors['degreeProgram'])): ?>
                            <p class="error"><?= $errors['degreeProgram'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="nameTypeLast">
                        <span class="naming">Email</span><br><br>
                        <input type="email" name="email" id="email" placeholder="Enter your email" class="inputText">
                        <?php if (isset($errors['email'])): ?>
                            <p class="error"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="nameBox2 nameBox">
                    <div class="nameTypefirst">
                        <span class="naming">Phone Number</span><br><br>
                        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" class="inputText">
                        <?php if (isset($errors['phone'])): ?>
                            <p class="error"><?= $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="nameTypeLast">
                        <span class="naming">Network Provider</span><br><br>
                        <select name="networkProvider" id="networkProvider">
                            <option value="Please Select">Please Select</option>
                            <option value="Globe">Globe</option>
                            <option value="Red Mobile">Red Mobile</option>
                            <option value="Smart">Smart</option>
                            <option value="Sun Cellular">Sun Cellular</option>
                            <option value="Talk N' Text">Talk N' Text</option>
                            <option value="Touch Mobile(TM)">Touch Mobile (TM)</option>
                        </select>
                    </div>
                </div>
                <div class="aboutBirthDay">
                    <div class="name">Birth Date</div>
                    <div class="nameBox">
                        <div class="nameTypefirst">
                            <select name="month" id="month">
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <?php if (isset($errors['month'])): ?>
                                <p class="error"><?= $errors['month'] ?></p>
                            <?php endif; ?>
                            <span>Month</span>
                        </div>
                        <div class="nameTypeLast">
                            <select name="day" id="day">
                                <option value="">Select Day</option>
                                <!-- Options for days 1 to 31 -->
                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <?php if (isset($errors['day'])): ?>
                                <p class="error"><?= $errors['day'] ?></p>
                            <?php endif; ?>
                            <span>Day</span>
                        </div>
                        <div class="nameTypeLast">
                            <select name="birthYear" id="birthYear">
                                <option value="">Select Year</option>
                                <!-- Options for years 2005 to 2015 -->
                                <?php for ($i = 2005; $i <= 2015; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <?php if (isset($errors['birthYear'])): ?>
                                <p class="error"><?= $errors['birthYear'] ?></p>
                            <?php endif; ?>
                            <span>Year</span>
                        </div>
                    </div>
                </div>
                <div class="address">
                    <div>Present Address</div>
                    <div class="streetAddress">
                        <div class="nameTypefirst">
                            <input type="text" name="streetAddress1" id="streetAddress1" placeholder="Enter your street address" class="inputText">
                            <span>Street Address1</span>
                            <?php if (isset($errors['streetAddress1'])): ?>
                                <p class="error"><?= $errors['streetAddress1'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="nameTypefirst">
                            <input type="text" name="streetAddress2" id="streetAddress2" placeholder="Enter your street address" class="inputText">
                            <span>Street Address2</span>
                        </div>
                    </div>
                    <div class="cityType">
                        <div class="cityname">
                            <input type="text" name="city" id="city" placeholder="Enter your city" class="inputText">
                            <span>City</span>
                            <?php if (isset($errors['city'])): ?>
                                <p class="error"><?= $errors['city'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="cityname">
                            <input type="text" name="state" id="state" placeholder="Enter your state" class="inputText">
                            <span>State/Province</span>
                            <?php if (isset($errors['state'])): ?>
                                <p class="error"><?= $errors['state'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="nameBox">
                        <div class="nameTypefirst">
                            <input type="text" name="postal" id="postal" placeholder="Enter your postal code" class="inputText">
                            <span>Postal/Zip</span>
                            <?php if (isset($errors['postal'])): ?>
                                <p class="error"><?= $errors['postal'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="nameTypeLast">
                            <input type="text" name="country" id="country" placeholder="Enter your country" class="inputText">
                            <span>Country</span>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>